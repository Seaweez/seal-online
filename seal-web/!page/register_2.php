<?php
$porserver = rand(0, 100000);
?>
<div id="layout-wrapper">
    <div class="main-content mb-4">
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h3 class="text-center mt-1 mb-1"><i class="fas fa-sign-in-alt"></i>&nbsp;สมัครสมาชิก</h3>
                            </div>
                            <div class="card-body pt-2">
                                <form id="register">
                                    <div class="p-2">
                                        <div class="form-group">
                                            <label for="username">ชื่อผู้ใช้งาน</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="กรอกชื่อผู้ใช้งาน" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="username">อีเมล</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="กรอกอีเมล" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">รหัสผ่าน</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่าน" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="repassword">รหัสผ่านอีกครั้ง</label>
                                            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="กรอกรหัสผ่าน" required="">
                                        </div>
                                        <input type="recapcha" name="recapcha" id="porrecapcha" hidden="" value="<?= $porserver ?>">
                                        <label for="basic-addon1">ยืนยันบอท</label>
                                        <div class="input-group mb-3 col-lg-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><?= $porserver ?></span>
                                            </div>
                                            <input type="number" class="form-control" id="recapcha" placeholder="ยืนยันบอท" aria-label="recapcha" aria-describedby="basic-addon1" required="">
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-success btn-block waves-effect waves-light ">สมัครสมาชิก</button>
                                            <a href="login" class="btn btn-danger btn-block waves-effect waves-light">ย้อนกลับ</a>
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
    $("#register").submit(function(e) {
        e.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();
        var repassword = $("#repassword").val();
        var email = $("#email").val();
        var recapcha = $("#recapcha").val();
        var porrecapcha = $("#porrecapcha").val();
        if (recapcha == "") {
            Swal.fire({
                text: 'กรุณาใส่แคปช่า',
                icon: 'error',
                confirmButtonColor: '#00C851',
                confirmButtonText: 'ตกลง',
                timer: 2500
            })
        } else {
            if (recapcha !== porrecapcha) {
                Swal.fire({
                    text: 'กรุณาใส่แคปช่าให้ตรง',
                    icon: 'error',
                    confirmButtonColor: '#00C851',
                    confirmButtonText: 'ตกลง',
                    timer: 2500
                })
            } else {
                if (repassword !== password) {
                    Swal.fire({
                        text: 'กรุณายืนยันรหัสผ่านให้ตรง',
                        icon: 'error',
                        confirmButtonColor: '#00C851',
                        confirmButtonText: 'ตกลง',
                        timer: 2500
                    })
                } else {
                    $.ajax({
                        type: "POST",
                        url: "system/api/register.php",
                        data: {
                            username: username,
                            password: password,
                            repassword: repassword,
                            email: email,
                            recapcha: recapcha,
                            porrecapcha: porrecapcha,
                        },
                        success: function(data) {
                            if (data == "success") {
                                Swal.fire({
                                    text: 'สมัครสมาชิกสำเร็จ',
                                    icon: 'success',
                                    confirmButtonColor: '#00C851',
                                    confirmButtonText: 'ตกลง',
                                    timer: 2500
                                }).then((result) => {
                                    window.location.href = "/home";
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
                }
            }
        }
    });
</script>