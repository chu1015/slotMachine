$(document).ready(function(){
    // Swal.fire('Hello world!')
    // // 按按鈕改變圖片
    // for(i=1;i<7;i++){
    //     var id = "#btn" + i;
    //     $(id).click(function(){
    //         var suffix = this.id.match(/\d+/);
    //         var newClass = "slot slot" + suffix
    //         $("#img1").removeClass();
    //         $("#img1").addClass(newClass);
    //     });
    // }

    // 為intervel的名稱，以便關閉時可以呼叫
    var timerFlag;
    // 確認拉霸機畫面是否在轉動
    var rollFlag = 0;
    var endImg;
    // 設定起始圖案組合
    var setFlag;
    // 籌碼id對應籌碼的值
    var chipArr = [5, 10, 50, 100];
    // 紀錄玩家輸贏、決定toastr內容的flag
    // var resultFlag = "";

    for(let i=0;i<4;i++){
        // 游標 移動/離開 籌碼圖案的變化
        $("#chip"+i).mouseover(function(){
            if(rollFlag === 0){
                $("#chip"+i).css("opacity","1.0");
            }
        });

        $("#chip"+i).mouseout(function(){
            if(rollFlag === 0){
                $("#chip"+i).css("opacity","0.7");
            }
        });

        // 點選籌碼增加總值
        $("#chip"+i).click(function(){
            if(rollFlag === 0){
                chip = $("#totalChip").text();
                chip = parseInt(chip) + chipArr[i];
                coin = $("#navCoin").text().match(/\d+/);
                if(chip > parseInt(coin)){
                    // alert("You don't have enough coin!");
                    Swal.fire(
                        "餘額不足!",
                        '',
                        'warning'
                    )
                } else {
                    $("#totalChip").text(chip);
                }
            }
        });
    }

    // 籌碼歸零
    $("#resetChip").click(function(){
        if(rollFlag === 0){
            $("#totalChip").text(0);
        }
    })

    // 切換拉霸機圖片
    function rollImg(){
        if(setFlag == 0){
            $("#img1").removeClass();
            $("#img1").addClass("slot slot1");
            $("#img2").removeClass();
            $("#img2").addClass("slot slot2");
            $("#img3").removeClass();
            $("#img3").addClass("slot slot3");
            setFlag = 1;
        } else {
            for(var i=1;i<4;i++){
                var divId = String("#img" + i);
                var oldClass = $(divId).attr('class');
                var suffix = oldClass.match(/\d+/);
                suffix >= 6 ? suffix = 1 : suffix++;
                suffix = suffix.toString();
                var newClass = String("slot slot" + suffix)
                $(divId).removeClass();
                $(divId).addClass(newClass);
                
            }
        }
    };
    
    $("#casinoShuffle").click(function(){
        // 注意函數名稱不用括弧!
        chip = $("#totalChip").text();
        if(chip != 0){
            if(rollFlag === 0){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "slot",
                    data: {
                        "slot" : "1",
                        "cost" : $("#totalChip").text()
                    },
                    success: function(e){
                        var data = JSON.parse(e);
                        if(data["msg"] == -1){
                            // alert("over bet!");
                            Swal.fire(
                                "餘額不足!",
                                '',
                                'warning'
                            ).then((result) => {
                                location.reload();
                            })
                        } else if (data["msg"] == 0){
                            Swal.fire(
                                "遊戲維修中",
                                '稍後將回到主頁',
                                'warning'
                            ).then((result) => {
                                window.location.href = "/";
                            })
                        } else if (data["msg"] == 1){
                            setFlag = 0;
                            timerFlag = setInterval(rollImg,50);
                            rollFlag = 1;
                            endImg = data;
                        }
                    }
                })
            }
        } else {
            // alert("Please set your chip");
            Swal.fire(
                "請點選想要的籌碼!",
                '',
                'warning'
            )
        }
    });

    $("#casinoStop").click(function(){
        if(rollFlag === 1){
            clearInterval(timerFlag);
            setFlag = 0;
            rollFlag = 0;

            // 圖案定點
            for(var j=1;j<4;j++){
                var divId = "#img" + j;
                var newClass = "slot slot" + endImg[j];
                $(divId).removeClass();
                $(divId).addClass(newClass);
            }

            // console.log(endImg);

            toastr.options = {
                // 參數設定[註1]
                "closeButton": false, // 顯示關閉按鈕
                "debug": false, // 除錯
                "newestOnTop": false,  // 最新一筆顯示在最上面
                "progressBar": true, // 顯示隱藏時間進度條
                "positionClass": "toast-bottom-right", // 位置的類別
                "preventDuplicates": false, // 隱藏重覆訊息
                "onclick": null, // 當點選提示訊息時，則執行此函式
                "showDuration": "300", // 顯示時間(單位: 毫秒)
                "hideDuration": "1000", // 隱藏時間(單位: 毫秒)
                "timeOut": "3000", // 當超過此設定時間時，則隱藏提示訊息(單位: 毫秒)
                "extendedTimeOut": "1000", // 當使用者觸碰到提示訊息時，離開後超過此設定時間則隱藏提示訊息(單位: 毫秒)
                "showEasing": "swing", // 顯示動畫時間曲線
                "hideEasing": "linear", // 隱藏動畫時間曲線
                "showMethod": "fadeIn", // 顯示動畫效果
                "hideMethod": "fadeOut" // 隱藏動畫效果
            }
            if(endImg["game"] == "W"){
                // alert("win");
                toastr.success( "恭喜,你贏了!" );
            }else if (endImg["game"] == "L"){
                // alert("lose");
                toastr.success( "再接再厲!" );
            }

            // // sweet alert 2 的 toast
            // const Toast = Swal.mixin({
            //     toast: true,
            //     position: 'top-end',
            //     showConfirmButton: false,
            //     timer: 3000
            // })
            
            // if(endImg["game"] == "W"){
            //     Toast.fire({
            //         // type: 'success',
            //         title: '恭喜,你贏了!'
            //     })
            // }else if (endImg["game"] == "L"){
            //     Toast.fire({
            //         // type: 'success',
            //         title: '再接再厲!'
            //     })
            // }
            
            $("#navCoin").text("現有: " + endImg["coin"] + "代幣")
            // coin = endImg["coin"];
            // $("#totalChip").text(coin);
        }
    });
    
})