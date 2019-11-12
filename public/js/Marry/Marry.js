var list = new Array(28); // 1~28
var oddsList = new Array(9); // 1~9
var odds = new Array(9); // 9種賠率
var typeOf = new Array(28); // 28格種類
var coinAdjustList = new Array(9); //9種下注金額
var totallInsert = 0; // 下注金額
var totallCoin = 0; // 盤面上未使用總金額
var runEndNum = 0; // 停止位置 0~27
var result = 0; // 獎金
var randNum = 0; // 中獎號碼
var GameCoin = 0;
var insertMoney = 1000;
var increseMoney = 100;
var decreseMoney = 100;

// 改變下注金額
function changeMode(setCoin) {
    increseMoney = parseInt(setCoin);
    decreseMoney = parseInt(setCoin);
    switch (setCoin) {
        case 100:
            document.getElementById("100").style.opacity = 0.5;
            document.getElementById("200").style.opacity = 1;
            document.getElementById("500").style.opacity = 1;
            break;
        case 200:
            document.getElementById("100").style.opacity = 1;
            document.getElementById("200").style.opacity = 0.5;
            document.getElementById("500").style.opacity = 1;
            break;
        case 500:
            document.getElementById("100").style.opacity = 1;
            document.getElementById("200").style.opacity = 1;
            document.getElementById("500").style.opacity = 0.5;
            break;
    }
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//產生序號[1,2,3,....,28],[1,2,3,....,9]
function addNumber() {
    for (i = 0; i <= 27; i++) {
        list[i] = i + 1;
    }
    for (i = 0; i <= 8; i++) {
        oddsList[i] = i + 1;
    }
}
addNumber();

// 接收賠率及輪盤種類配置
$(document).ready(function () {
    $.ajax({
        async: true,
        type: "POST",
        url: "/LittleMary",
        dataType: "json",
        data: {
            'documentready': 'ready'
        },
        success: function (response) {
            typeOf = response["fruitarray"];
            odds = response["fruitodds"];
            fruitName = response["fruitType"];
            for (i = 1; i <= 28; i++) {
                document.getElementById(i).style.backgroundImage = `url("img/Marry/${typeOf[i]}.png")`;
            }
            document.getElementById("100").style.opacity = 0.5;
            for (i = 1; i <= 9; i++) {
                new Vue({
                    el: `#odds${i}`,
                    data: {
                        messege: `X${odds[i-1]}`,
                        pic: `img/Marry/${fruitName[i-1]}.png`
                    }
                })
            }
        },
        error: function () {
            // alert("遊戲目前維修中");
            window.location = "/";
        }
    })
});

// 增加下注金額
function increse(i) {
    var Id = ("coinAdjust" + i);
    if (coin.value >= increseMoney) {
        document.getElementById(Id).value = parseInt(document.getElementById(Id).value) + increseMoney;
        coin.value = coin.value - increseMoney;
    } else {
        // alert("請投幣");
        swal.fire({
            type: 'warning',
            title: '請投幣',
        })
    }
}

// 減少下注金額
function decrese(i) {
    var Id = ("coinAdjust" + i);
    if (document.getElementById(Id).value >= decreseMoney) {
        document.getElementById(Id).value = parseInt(document.getElementById(Id).value) - decreseMoney;
        coin.value = parseInt(coin.value) + decreseMoney;
    }
}

// 產生當次投注金額陣列 coinAdjustList = [0,0,0,0,0,0,0,0,0]
function coinAdjust() {
    for (i = 0; i <= 8; i++) {
        coinAdjustList[i] = document.getElementById("coinAdjust" + parseInt(i + 1)).value;
    }
}

// 合計當次下注金額 totallInsert
function totall() {
    for (i = 0; i <= 8; i++) {
        totallInsert = parseInt(totallInsert) + parseInt(coinAdjustList[i]);
    }
}

// 清空投注金額
function clearAdjust() {
    coinAdjustList = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    totallInsert = 0;
}

// 跟伺服端確認玩家餘額,再提供盤面遊戲幣
function btnInsert() {
    lockInsert();
    coinAdjust();
    totall();
    totallCoin = parseInt(totallInsert) + parseInt(coin.value);
    $.ajax({
        async: true,
        type: "POST",
        url: "/LittleMary",
        dataType: "json",
        data: {
            'total': totallCoin,
            'need': insertMoney
        },
        success: function (response) {
            insertMoney = parseInt(response["need"]);
            if (insertMoney == 0) {
                // alert("帳戶餘額不足請儲值");
                swal.fire({
                    type: 'warning',
                    title: '帳戶餘額不足請儲值',
                })
            }
            coin.value = parseInt(coin.value) + insertMoney;
            lockInsert();
            totallCoin = 0;
            clearAdjust();
            insertMoney = 1000;
        },
        error:function(){
            // alert("遊戲目前維修中");
            swal.fire({
                type: 'warning',
                title: '遊戲目前維修中',
            })
            history.go(-1);
        }
    })
}

// 鎖定/解鎖 開始&結束
var isClick = false;
function lockClick() {
    isClick = !isClick;
    document.getElementById("startButton").disabled = isClick ? true : false;
}
// 鎖定/解鎖 
var isInsert = false;
function lockInsert() {
    isInsert = !isInsert;
    document.getElementById("insertButton").disabled = isInsert ? true : false;
}

// 遊戲開始
var lightClean = 0;
function btnStart() {
    lockClick();
    coinAdjust();
    totall();
    document.getElementById("Gold").innerHTML = "";
    document.getElementById("Gold").classList.remove("font");
    document.getElementById("navCoin").classList.remove("navFont");
    document.getElementById("Flycoin").classList.remove("Coin");
    if (totallInsert != 0) {
        $.ajax({
            async: true,
            type: "POST",
            url: "/LittleMary",
            dataType: "json",
            data: {
                'bet': coinAdjustList,
                'MaryCoin': coin.value
            },
            success: function (response) {
                randNum = response["number"];
                result = response["coin"];
                GameCoin = response["GameCoin"];
                // 遊戲效果跑圈
                document.getElementById("odds" + oddsList[lightClean]).className = "normal";
                var t = 40;
                var times = 1;
                let startGame = setTimeout(function go() {
                    for (j = 1; j <= 28; j++) { //把所有格子改成白底
                        document.getElementById(j).className = "normal";
                    }
                    if (runEndNum >= 28) {
                        runEndNum = 0;
                    }
                    document.getElementById(list[runEndNum]).className = "yellowLight"; // 把該格子改成黃底
                    times++;
                    runEndNum++;
                    if (times > 28) { //減速
                        if (randNum - 14 > 0 && randNum - 14 == runEndNum) {
                            t = 500;
                        } else if (randNum - 14 <= 0 && randNum + 14 == runEndNum) {
                            t = 500;
                        }
                    }
                    startGame = setTimeout(go, t);
                    if (t == 500 && randNum == runEndNum) {
                        clearTimeout(startGame);
                        for (i = 0; i <= 8; i++) { // 中獎項目亮燈
                            if (fruitName[i] == typeOf[randNum]) {
                                lightClean = i;
                            }
                        }
                        document.getElementById("odds" + oddsList[lightClean]).className = "yellowLight";
                        if (result != 0 && totallInsert < result) {
                            document.getElementById("Gold").innerHTML = "喜從天降~獎金~ " + result + " 元";
                        } else if (result != 0 && totallInsert >= result) {
                            document.getElementById("Gold").innerHTML = "恭喜中獎~獎金~ " + result + " 元 , 但還是虧錢哦";
                        } else {
                            document.getElementById("Gold").innerHTML = "謝謝課長讓我們有遊戲玩~";
                        }
                        document.getElementById("Gold").className = "font";
                        // 刷新 navbar 玩家餘額
                        $.ajax({
                            type: "post",
                            url: "navbar",
                            success: function (e) {
                                if (result != 0) {
                                    $("#Flycoin").addClass("Coin");
                                }
                                setTimeout(function () {
                                    $("#navCoin").text("現有: " + e + "代幣");
                                    $("#navCoin").show();
                                    $("#navCoin").addClass("navFont")
                                }, 1000)
                            }
                        });

                        // 判斷下注餘額,決定是否清空下注金
                        if (coin.value < totallInsert) {
                            for (i = 0; i <= 8; i++) {
                                document.getElementById("coinAdjust" + parseInt(i + 1)).value = 0;
                            }
                            clearAdjust();
                        } else {
                            coin.value = coin.value - totallInsert;
                            clearAdjust();
                        }
                        lockClick();
                    }
                }, 20);
            },
            error:function(){
                // alert("遊戲目前維修中");
                swal.fire({
                    type: 'warning',
                    title: '遊戲目前維修中',
                })
                history.go(-1);
            }
        })
    } else {
        lockClick();
        // alert("請下注");
        swal.fire({
            type: 'warning',
            title: '請下注',
        })
    }
}
