<div id="layout-wrapper">
    <div class="main-content mb-4">
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h3 class="text-center mt-1 mb-1"><i class="fas fa-sign-in-alt"></i>&nbsp;เข้าสู่ระบบ</h3>
                            </div>
                            <div class="card-body pt-2">
                                <form id="login">
                                    <div class="p-2">
                                        <div class="form-group">
                                            <label for="username">ชื่อผู้ใช้งาน</label>
                                            <input type="text" name="username" class="form-control" id="username" placeholder="กรอกชื่อผู้ใช้งาน">
                                        </div>
                                        <div class="form-group">
                                            <label for="userpassword">รหัสผ่าน</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="กรอกรหัสผ่าน">
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-primary btn-block waves-effect waves-light">เข้าสู่ระบบ</button>
                                            <a href="register" class="btn btn-success btn-block waves-effect waves-light" type="submit">สมัครสมาชิก</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#login").submit(function(e) {
        e.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            type: "POST",
            url: "system/api/login.php",
            data: {
                username: username,
                password: password,
            },
            success: function(data) {
                if (data == "success") {
                    Swal.fire({
                        text: 'ล็อกอินสำเร็จ',
                        icon: 'success',
                        confirmButtonColor: '#00C851',
                        confirmButtonText: 'ตกลง',
                        timer: 2500
                    }).then((result) => {
                        window.location.href = "/member";
                    });
                } else {
                    Swal.fire({
                        text: data,
                        icon: 'error',
                        confirmButtonColor: '#00C851',
                        confirmButtonText: 'ตกลง',
                        timer: 3500
                    })
                }
            }
        });
    });
</script>