$(document).ready(function () {
    $("#send").click(function () {
        // alert("12300");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "update",
            data: {
                phone: $("#phone").val(),
                address: $("#address").val()
            },
            success: function (e) {
                // console.log(e);
                // let msg = JSON.parse(e);
                if (e == 1) {
                    swal.fire({
                        type: 'success',
                        title: '修改成功！',
                    }).then(
                        function () {
                            window.location.href = "/";
                        }
                    )
                } else {
                    alert("哪裡錯了?");
                }
            }
        });
    })
})