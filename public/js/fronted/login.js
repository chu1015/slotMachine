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

    var rule4 = /^\w{6,12}$/;
    $("#loginPassword").blur(function () {
        if (rule4.test($(this).val())) {
            $('.error4').text('')
            $('#loginPassword').css("border-color", "green")
            pwFlag = true;
        } else {
            $('.error4').text('請輸入6-12位英文或數字的密碼')
            $('.error4').css({
                "color": "red",
                "font-size": "0.8rem"
            })
            $('#loginPassword').css("border-color", "red")
        }
    })
    // $("#loginPassword").keyup(function(event) {
    //     if (event.keyCode == 13) {
    //         $("#login").click();
    //     }
    // });
    
    
    $("#login").click(function () {
        // alert("123");

        if ((acFlag === true) && (pwFlag === true)) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "login",
                data: {
                    account: $('#loginAccount').val(),
                    password: $('#loginPassword').val()
                },
                success: function (e) {
                    // console.log(e);
                    let msg = JSON.parse(e);
                    if (msg.status === 1) {
                        swal.fire({
                            type: 'success',
                            title: '登入成功！',
                            text: '2秒後自動跳轉',
                            timer: 2000
                        }).then(
                            function () {
                                sessionStorage.setItem('account', msg.account);
                                sessionStorage.setItem('permission', msg.permission);
                                window.location.href = "/";
                            }
                        )
                    } else {
                        // alert("帳號或密碼錯誤");
                        // $("#loginPassword").val("");
                        Swal.fire({
                            type: 'error',
                            title: '帳號或密碼錯誤!',
                        }).then(
                            function () {
                                $("#loginPassword").val("");
                            }
                        )
                    }
                }
            });

        }
    });






});




// // Disable form submissions if there are invalid fields
// (function() {
//     'use strict';
//     window.addEventListener('load', function() {
//       // Get the forms we want to add validation styles to
//       var forms = document.getElementsByClassName('needs-validation');
//       // Loop over them and prevent submission
//       var validation = Array.prototype.filter.call(forms, function(form) {
//         form.addEventListener('submit', function(event) {
//           if (form.checkValidity() === false) {
//             event.preventDefault();
//             event.stopPropagation();
//           }
//           form.classList.add('was-validated');
//         }, false);
//       });
//     }, false);
//   })();
