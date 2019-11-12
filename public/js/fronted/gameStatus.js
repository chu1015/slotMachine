
// $(document).ready(function(){
//     $("#indexSlotBtn").click(function(){
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         $.ajax({
//             method: "POST",
//             url: "fix",
//             data: {
//                 "action" : "check",
//                 "game" : "slot"
//             },
//             success: function(e){
//                 if(e == 0){
//                     Swal.fire(
//                         "遊戲維修中",'','warning'
//                     )
//                 } else if (e == 1){
//                     window.location.href = 'slot';
//                 }
//             }
//         });
//     })
// })