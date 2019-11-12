$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
        method: "POST",
        url: "manager",
        success: function (e) {
            var data = JSON.parse(e);

            //遊玩比例
            var playTimes = [data.countMary, data.countSlot];
            var gameName = ["Mary", "Slot"];
            var ctx = document.getElementById("playTimesCanvas");
            var pieChart = new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: gameName,
                    datasets: [{
                        data: playTimes,
                        backgroundColor: ["#3cba9f", "#c45850"]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        fontSize: 20,
                        text: '遊玩比例(次)'
                    }
                }
            })

            var gameProfit = [data.maryProfit, data.slotProfit, 0];
            var gameName = ["Mary", "Slot"];
            var ctx = document.getElementById("profitCanvas");
            var barChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: gameName,
                    datasets: [{
                            label: "Game",
                            data: gameProfit,
                            backgroundColor: ["#3cba9f", "#c45850"],
                        },

                        // {
                        //     label:"slot",
                        //     data:gameProfit,
                        //     backgroundColor:"#c45850",
                        // }
                    ]
                }
            })

            //拉霸機勝率
            var winrateSlot = [data.winrateSlot, 100 - data.winrateSlot];
            var winOrLose = ["win", "lose"];
            var ctx = document.getElementById("winrateSlotCanvas");
            var pieChart = new Chart(ctx, {
                type: "pie",
                data: {
                    labels: winOrLose,
                    datasets: [{
                        data: winrateSlot,
                        backgroundColor: ["#3cba9f", "#c45850"]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        fontSize: 20,
                        text: '拉霸機勝率(%)'
                    }
                }
            })

            //小瑪莉勝率
            var winrateMary = [100 - data.winrateMary, data.winrateMary];
            var winOrLose = ["win", "lose"];
            var ctx = document.getElementById("winrateMaryCanvas");
            var pieChart = new Chart(ctx, {
                type: "pie",
                data: {
                    labels: winOrLose,
                    datasets: [{
                        data: winrateMary,
                        backgroundColor: ["#3cba9f", "#c45850"]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        fontSize: 20,
                        text: '小瑪莉勝率(%)'
                    }
                }
            })

            // 上下架頁面資訊
            // 拉霸機
            switch(data.slotStatus){
                case "1":
                    $("#slotStatus").text("拉霸機現況為 : 開啟");
                    $("#slotClose").show();
                    break;
                case "0":
                    $("#slotStatus").text("拉霸機現況為 : 關閉");
                    $("#slotOpen").show();
                    break;
            }
            // 小瑪莉
            switch(data.maryStatus){
                case "1":
                    $("#maryStatus").text("小瑪莉現況為 : 開啟");
                    $("#maryClose").show();
                    break;
                case "0":
                    $("#maryStatus").text("小瑪莉現況為 : 關閉");
                    $("#maryOpen").show();
                    break;
            }

        }
    })

    // 開啟/關閉拉霸機
    $("#slotOpen").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "gamestatus",
            data: {
                "action": "switch",
                "game": "slot",
                "status": "1"
            },
            success: function (e) {
                if (e == 1) {
                    Swal.fire(
                        "拉霸機現狀為:開啟",
                        '',
                        'warning'
                    ).then((result) => {
                        window.location.href = "manager";
                    })
                }
            }
        });
    })

    $("#slotClose").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "gamestatus",
            data: {
                "action": "switch",
                "game": "slot",
                "status": "0"
            },
            success: function (e) {
                if (e == 1) {
                    Swal.fire(
                        "拉霸機現狀為:關閉",
                        '',
                        'warning'
                    ).then((result) => {
                        window.location.href = "manager";
                    })
                }
            }
        });
    })

    // 開啟/關閉小瑪莉
    $("#maryOpen").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "gamestatus",
            data: {
                "action": "switch",
                "game": "mary",
                "status": "1"
            },
            success: function (e) {
                if (e == 1) {
                    Swal.fire(
                        "小瑪莉現狀為:開啟",
                        '',
                        'warning'
                    ).then((result) => {
                        window.location.href = "manager";
                    })
                }
            }
        });
    })

    $("#maryClose").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "gamestatus",
            data: {
                "action": "switch",
                "game": "mary",
                "status": "0"
            },
            success: function (e) {
                Swal.fire(
                    "小瑪莉現狀為:關閉",
                    '',
                    'warning'
                ).then((result) => {
                    window.location.href = "manager";
                })
            }
        });
    })
})
//管理分頁
function openManager(evt, managerName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(managerName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
window.onload = function () {
    startTab();
};

function startTab() {
    document.getElementById("defaultOpen").click();
}