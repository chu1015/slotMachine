$(document).ready(function () {
    let acFlag, pwFlag;
    $('#loginAccount').focus(function () {
        $(this).css("border-color", "#006cff")
    })

    $('#loginAccount').blur(function () {
        $(this).css("border-color", "")
    })

    var rule2 = /^\w{6,12}$/;
    $("#loginAccount").blur(function () {
        if (rule2.test($(this).val())) {
            $('.error2').text('')
            $('#loginAccount').css("border-color", "green")
            acFlag = true;
        } else {
            $('.error2').text('請輸入6-12位英文或數字的帳號')
            $('.error2').css({
                "color": "red",
                "font-size": "0.8rem"
            })
            $('#loginAccount').css("border-color", "red")
        }
    })

    // var rule4 = /^\w{6,12}$/;
    // $("#loginPassword").blur(function () {
    //     if (rule4.test($(this).val())) {
    //         $('.error4').text('')
    //         $('#loginPassword').css("border-color", "green")
    //         pwFlag = true;
    //     } else {
    //         $('.error4').text('請輸入6-12位英文或數字的密碼')
    //         $('.error4').css({
    //             "color": "red",
    //             "font-size": "0.8rem"
    //         })
    //         $('#loginPassword').css("border-color", "red")
    //     }
    // })

//     $("#login").click(function () {
//         // alert("123");

//         if ((acFlag === true) && (pwFlag === true)) {
//             $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             });
//             $.ajax({
//                 type: "post",
//                 url: "login",
//                 data: {
//                     account: $('#loginAccount').val(),
//                     password: $('#loginPassword').val()
//                 },
//                 success: function (e) {
//                     // console.log(e);
//                     let msg = JSON.parse(e);
//                     if (msg.status === 1) {
//                         alert("登入成功！");
//                         localStorage.setItem('account', msg.account);
//                         window.location.href = "/";
//                     } else {
//                         alert("帳號或密碼錯誤");
//                         $("#loginPassword").val("");
//                     }
//                 }
//             });

//         }
//     });
});
