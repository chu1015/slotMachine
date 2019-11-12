// Get the button
// var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
// window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
//     mybutton.style.display = "block";
//   } else {
//     mybutton.style.display = "none";
//   }
// }

// When the user clicks on the button, scroll to the top of the document
// function topFunction() {
//   document.body.scrollTop = 0;
//   document.documentElement.scrollTop = 0;
// }

function indexslot(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "GET",
        url: "gamestatus?action=check&game=slot",
        success: function(e){
            if (e == "1"){
                if(sessionStorage.getItem('account') == ''){
                    window.location.href = "login";
                } else {
                    window.location.href = "slot";
                }
            } else if (e == "0"){
                Swal.fire(
                    "遊戲維修中",
                    '',
                    'warning'
                )
            }
        }
    })
}

$(document).ready(function () {
    if (sessionStorage.getItem('account') == null || sessionStorage.getItem('account') == '') {
        // alert('第一次訪問頁面沒session');
        sessionStorage.setItem('account', '');
        $("#navLogin").show();
        $("#navRegister").show();
    } else {
        account = sessionStorage.getItem('account');
        $("#navbardrop").text(account + " ");
        $("#navBuy").show();
        $("#navAccount").show();
        if (sessionStorage.getItem('permission') == 2) {
            $("#manager").show();
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "navbar",
            success: function (e) {
                // console.log(e);
                $("#navCoin").text("現有: " + e + "代幣");
                $("#navCoin").show();
            }
        });
    }
    // console.log(sessionStorage.getItem('userName'));
})
