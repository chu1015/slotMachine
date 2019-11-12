$(document).ready(function () {
    $("#navLogout").click(function () {
        // let msg = confirm("確認登出?");
        // if(msg){
        //     // localStorage.setItem('account', '');
        //     // return true;
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         } 
        //     });
        //     $.ajax({
        //         type: "post",
        //         url: "logout",
        //         data: {
        //             logout: '1'
        //         },
        //         success: function (e) {
        //             if (e == 1) {
        //                 sessionStorage.removeItem('account');
        //                 sessionStorage.removeItem('permission');
        //                 window.location.href = "/";
        //             }
        //         }
        //     });
        // } else {
        //     return false;
        // }
        Swal.fire({
            title: '確定登出?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '確定',
            cancelButtonText: '取消'
        }).then((result) => {
            if (result) {
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                });
                $.ajax({
                    type: "post",
                    url: "logout",
                    data: {
                        logout: '1'
                    },
                    success: function (e) {
                        if (e == 1) {
                            sessionStorage.removeItem('account');
                            sessionStorage.removeItem('permission');
                            window.location.href = "/";
                        }
                    }
                });
            }
        })
    })
})
