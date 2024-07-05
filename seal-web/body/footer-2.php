<script type="text/javascript">
    // $(".submit-login").click(function(e) {
    //     e.preventDefault();
    //     var username = $("#username").val();
    //     var password = $("#password").val();
    //     $.ajax({
    //         type: "POST",
    //         url: "system/api/login.php",
    //         data: {
    //             username: username,
    //             password: password,
    //         },
    //         success: function(data) {
    //             if (data == "success") {
    //                 Swal.fire({
    //                     text: 'ล็อกอินสำเร็จ',
    //                     icon: 'success',
    //                     confirmButtonColor: '#00C851',
    //                     confirmButtonText: 'ตกลง',
    //                     timer: 2500
    //                 }).then((result) => {
    //                     window.location.href = "/home";
    //                 });
    //             } else {
    //                 Swal.fire({
    //                     text: data,
    //                     icon: 'error',
    //                     confirmButtonColor: '#00C851',
    //                     confirmButtonText: 'ตกลง',
    //                     timer: 3500
    //                 })
    //             }
    //         }
    //     });
    // });


    // $(".submit-register").click(function() {
    //         var username = $("#username").val();
    //         var email = $("#email").val();
    //         var password = $("#password").val();
    //         var repassword = $("#repassword").val();
    //         if (password == repassword) {
    //             $.ajax({
    //                 url: "/api/v1/register",
    //                 type: "POST",
    //                 data: {
    //                     username: username,
    //                     email: email,
    //                     password: password
    //                 },
    //                 success: function(data) {
    //                     var obj = JSON.parse(data);
    //                     if (obj.status == "success") {
    //                         Swal.fire({
    //                             icon: 'success',
    //                             title: 'สมัครสมาชิก',
    //                             text: 'สมัครสมาชิกสำเร็จแล้ว',
    //                             timer: 2000,
    //                             timerProgressBar: true,
    //                             confirmButtonColor: '#00C851',
    //                         }).then((result) => {
    //                             window.location.href = 'member.html';
    //                         })
    //                     } else {
    //                         Swal.fire({
    //                             icon: 'error',
    //                             title: 'สมัครสมาชิก',
    //                             text: obj.info,
    //                             timer: 2000,
    //                             timerProgressBar: true,
    //                             confirmButtonColor: '#00C851',
    //                         })
    //                     }
    //                 }
    //             });
    //         } else {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'สมัครสมาชิก',
    //                 text: 'ยืนยันรหัสผ่านไม่ถูกต้อง',
    //                 timer: 2000,
    //                 timerProgressBar: true,
    //                 confirmButtonColor: '#00C851',
    //             })
    //         }
    //     });
</script>
<script src="views/assets/js2/bootstrap.bundle.min.js"></script>
<script src="views/assets/js2/waves.min.js"></script>
<script src="views/assets/js2/app.js"></script>