$(document).ready(function () {
       //圖片選擇後加邊框
        $("#imgdiv >ul>li").click(function () {
            $("#imgdiv >ul>li").removeClass("imgborder")
            $(this).addClass('imgborder');
        })


        //勾選同意才可點確認
        $('#agree').click(function () {
            if ($('#agree').is(':checked')) {
                $("#confirm").attr('disabled', false);
            } else {
                $("#confirm").attr('disabled', true);
            }
        })
        //街口QRCode畫面
        $("#confirm").click(function () {
            $("#buycontent").hide();
            $("#QRdiv").show();
        })
        //更改購買內容資料
        var jkoarr = new Array();
        jkoarr[0] = 100;
        jkoarr[1] = 300;
        $('input[type=radio][name="jkoprice"]').change(function () {

            $("#QRdiv").hide();
            $("#buycontent").show();

            var jkopricecoin = this.value;
            jkoarr = jkopricecoin.split(',');

            document.getElementById("pricetable").innerHTML = 'NT$ ' + jkoarr[0];
            document.getElementById("cointable").innerHTML = '遊戲幣 × ' + jkoarr[1];

        })
        //完成街口支付送資料給後端
        $("#jkofinishstore").click(function () {
            var howmuch = jkoarr[0];
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "buy",
                datatype: "json",
                data: {
                    "MoneyOrigin": "JkoPay",
                    "StoreMoney": howmuch
                },
                success: function (response) {
                    var jkodata = JSON.parse(response);
                    //    console.log(data.StoredCoin);
                    $("#modaltext").text('遊戲幣 × ' + jkodata.StoredCoin + ' 已成功儲值進您的帳號');


                    $('#exampleModalCenter').modal('show');
                }
            })
        })

        //中華付款
        //電話號碼驗證
        let phoneFlag, verificationFlag;
        $('#celphonenumber').focus(function () {
            $(this).css("border-color", "#006cff")
        })

        $('#celphonenumber').blur(function () {
            $(this).css("border-color", "")
        })
        var phonerule = /^09[0-9]{8}$/;
        $("#celphonenumber").blur(function () {
            if (phonerule.test($(this).val())) {
                $('#phoneerror').text('');
                $('#celphonenumber').css("border-color", "green");
                phoneFlag = true;
            } else {
                $('#phoneerror').text('請輸入開頭為09的十位數字');
                $('#phoneerror').css({
                    "color": "red",
                    "font-size": "0.8rem"
                });
                $('#celphonenumber').css("border-color", "red");
                phoneFlag = false;
            }
        })
        var verificationrule = /^[0-9]{4}$/;
        $("#verification").blur(function () {
            if (verificationrule.test($(this).val())) {
                $('#verificationerror').text('');
                $('#verification').css("border-color", "green");
                verificationFlag = true;
            } else {
                $('#verificationerror').text('請輸入長度為四位的數字');
                $('#verificationerror').css({
                    "color": "red",
                    "font-size": "0.8rem"
                });
                $('#verification').css("border-color", "red");
                verificationFlag = false;
            }
        })
        //勾選同意才可點確認
        $('#chtagree').click(function () {
            if ($('#chtagree').is(':checked')) {
                $("#chtfinishstore").attr('disabled', false);
            } else {
                $("#chtfinishstore").attr('disabled', true);
            }
        })
        //   $("#chtfinishstore").click(function(){
        //       $("#chtbuycontent").hide();
        //       $("#chtVerification").show();
        //   })
        //更改購買內容資料
        var chtarr = new Array();
        chtarr[0] = 100;
        chtarr[1] = 300;
        $('input[type=radio][name="chtprice"]').change(function () {
            var arr = new Array();
            var chtpricecoin = this.value;
            chtarr = chtpricecoin.split(',');

            document.getElementById("chtpricetable").innerHTML = "NT$ " + chtarr[0];
            document.getElementById("chtcointable").innerHTML = "遊戲幣 × " + chtarr[1];

        })
        //完成中華電信送資料給後端
        $("#chtfinishstore").click(function () {
            if ((phoneFlag === true) && (verificationFlag === true)) {
                var howmuch = chtarr[0];
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "buy",
                    datatype: "json",
                    data: {
                        "MoneyOrigin": "CHT",
                        "StoreMoney": howmuch
                    },
                    success: function (response) {
                        var chtdata = JSON.parse(response);
                        $("#modaltext").text('遊戲幣 × ' + chtdata.StoredCoin + ' 已成功儲值進您的帳號');
                        $('#exampleModalCenter').modal('show');
                    }
                })
            } else {
                $('#nullerror').text('請輸入手機和驗證碼')
                $('#nullerror').css({
                    "color": "red",
                    "font-size": "0.8rem"
                })
            }
        })
        //遠傳電信
        //電話號碼驗證
        let farpassphoneFlag, farpassverificationFlag;
        $('#farpasscelphone').focus(function () {
            $(this).css("border-color", "#006cff")
        })

        $('#farpasscelphone').blur(function () {
            $(this).css("border-color", "")
        })
        var farpassphonerule = /^09[0-9]{8}$/;
        $("#farpasscelphone").blur(function () {
            if (farpassphonerule.test($(this).val())) {
                $('#farpassphoneerror').text('');
                $('#farpasscelphone').css("border-color", "green");
                farpassphoneFlag = true;
            } else {
                $('#farpassphoneerror').text('請輸入開頭為09的十位數字');
                $('#farpassphoneerror').css({
                    "color": "red",
                    "font-size": "0.8rem"
                });
                $('#farpasscelphone').css("border-color", "red");
                farpassphoneFlag = false;
            }
        })
        var farpassverificationrule = /^[0-9]{4}$/;
        $("#farpassverification").blur(function () {
            if (farpassverificationrule.test($(this).val())) {
                $('#farpassverificationerror').text('')
                $('#farpassverification').css("border-color", "green")
                farpassverificationFlag = true;
            } else {
                $('#farpassverificationerror').text('請輸入長度為四位的數字')
                $('#farpassverificationerror').css({
                    "color": "red",
                    "font-size": "0.8rem"
                })
                $('#farpassverification').css("border-color", "red")
                farpassverificationFlag = false;
            }
        })
        //勾選同意才可點確認
        $('#farpassagree').click(function () {
            if ($('#farpassagree').is(':checked')) {
                $("#farpassfinishstore").attr('disabled', false);
            } else {
                $("#farpassfinishstore").attr('disabled', true);
            }
        })
        //更改購買內容資料
        var farpassarr = new Array();
        farpassarr[0] = 100;
        farpassarr[1] = 300;
        $('input[type=radio][name="farprice"]').change(function () {
            var farpricecoin = this.value;
            farpassarr = farpricecoin.split(',');

            document.getElementById("farpasspricetable").innerHTML = "NT$ " + farpassarr[0];
            document.getElementById("farpasscointable").innerHTML = "遊戲幣 × " + farpassarr[1];

        })
        //完成遠傳電信送資料給後端
        $("#farpassfinishstore").click(function () {
            if ((farpassphoneFlag === true) && (farpassverificationFlag === true)) {
                var howmuch = farpassarr[0];
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "buy",
                    datatype: "json",
                    data: {
                        "MoneyOrigin": "FarPass",
                        "StoreMoney": howmuch
                    },
                    success: function (response) {
                        var farpassdata = JSON.parse(response);
                        $("#modaltext").text('遊戲幣 × ' + farpassdata.StoredCoin + ' 已成功儲值進您的帳號');
                        $('#exampleModalCenter').modal('show');
                    }
                })
            } else {
                $('#farpassnullerror').text('請輸入手機和驗證碼')
                $('#farpassnullerror').css({
                    "color": "red",
                    "font-size": "0.8rem"
                })
            }
        })
        //台灣大哥大
        //電話號碼驗證
        let taiwanmobilephoneFlag, taiwanmobileverificationFlag;
        $('#taiwanmobilecelphone').focus(function () {
            $(this).css("border-color", "#006cff")
        })

        $('#taiwanmobilecelphone').blur(function () {
            $(this).css("border-color", "")
        })
        var taiwanmobilephonerule = /^09[0-9]{8}$/;
        $("#taiwanmobilecelphone").blur(function () {
            if (taiwanmobilephonerule.test($(this).val())) {
                $('#taiwanmobilephoneerror').text('');
                $('#taiwanmobilecelphone').css("border-color", "green");
                taiwanmobilephoneFlag = true;
            } else {
                $('#taiwanmobilephoneerror').text('請輸入開頭為09的十位數字');
                $('#taiwanmobilephoneerror').css({
                    "color": "red",
                    "font-size": "0.8rem"
                });
                $('#taiwanmobilecelphone').css("border-color", "red");
                taiwanmobilephoneFlag = false;
            }
        })
        var taiwanmobileverificationrule = /^[0-9]{4}$/;
        $("#taiwanmobileverification").blur(function () {
            if (taiwanmobileverificationrule.test($(this).val())) {
                $('#taiwanmobileverificationerror').text('');
                $('#taiwanmobileverification').css("border-color", "green");
                taiwanmobileverificationFlag = true;
            } else {
                $('#taiwanmobileverificationerror').text('請輸入長度為四位的數字');
                $('#taiwanmobileverificationerror').css({
                    "color": "red",
                    "font-size": "0.8rem"
                });
                $('#taiwanmobileverification').css("border-color", "red");
                taiwanmobileverificationFlag = false;
            }
        })
        //勾選同意才可點確認
        $('#taiwanmobileagree').click(function () {
            if ($('#taiwanmobileagree').is(':checked')) {
                $("#taiwanmobilefinishstore").attr('disabled', false);
            } else {
                $("#taiwanmobilefinishstore").attr('disabled', true);
            }
        })
        //更改購買內容資料
        var taiwanmobilearr = new Array();
        taiwanmobilearr[0] = 100;
        taiwanmobilearr[1] = 300;
        $('input[type=radio][name="taiprice"]').change(function () {
            var taipricecoin = this.value;
            taiwanmobilearr = taipricecoin.split(',');

            document.getElementById("taiwanmobilepricetable").innerHTML = "NT$ " + taiwanmobilearr[0];
            document.getElementById("taiwanmobilecointable").innerHTML = "遊戲幣 × " + taiwanmobilearr[1];

        })
        //完成台哥大電信送資料給後端
        $("#taiwanmobilefinishstore").click(function () {
            if ((taiwanmobilephoneFlag === true) && (taiwanmobileverificationFlag === true)) {
                var howmuch = taiwanmobilearr[0];
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "buy",
                    datatype: "json",
                    data: {
                        "MoneyOrigin": "TaiwanMobile",
                        "StoreMoney": howmuch
                    },
                    success: function (response) {
                        var taiwanmobiledata = JSON.parse(response);
                        $("#modaltext").text('遊戲幣 × ' + taiwanmobiledata.StoredCoin + ' 已成功儲值進您的帳號');
                        $('#exampleModalCenter').modal('show');
                    }
                })
            } else {
                $('#taiwanmobilenullerror').text('請輸入手機和驗證碼')
                $('#taiwanmobilenullerror').css({
                    "color": "red",
                    "font-size": "0.8rem"
                })
            }
        })
        //彈跳視窗關閉後會重新整理
        $('#exampleModalCenter').on('hidden.bs.modal', function (e) {
            location.reload();
        })
    })
