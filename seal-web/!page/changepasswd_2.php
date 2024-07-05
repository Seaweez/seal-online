<div id="layout-wrapper">
    <div class="main-content mb-4">
        <div class="page-content">
            <div class="container">
                <div class="row">

                    <style>
                        .textz {
                            font-size: 14px;
                        }
                    </style>
                    <?php include './body/sidebar.php' ?>
                    <div class="col-sm-12 col-md-9">
                        <div class="card">
                            <div class="card-body pt-2">
                                <div class="p-2">
                                    <h3>
                                        <i class="fas fa-key"></i>
                                        เปลี่ยนรหัสผ่าน
                                    </h3>
                                    <hr>
                                    <form id="changpassword">
                                        <div class="form-group">
                                            <label for="password-old">รหัสผ่านเดิม</label>
                                            <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="กรอกรหัสผ่านเดิม">
                                        </div>
                                        <div class="form-group">
                                            <label for="password-new">รหัสผ่านใหม่</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่านใหม่">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">ยืนยันรหัสผ่านใหม่</label>
                                            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="กรอกยืนยันรหัสผ่านใหม่">
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-success btn-block waves-effect waves-light ">เปลี่ยนรหัสผ่าน</button>
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
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> - <a href="http://www.sealmaple.com/">MapleSeal</a>.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Edit by Maple
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script type="text/javascript">
    $("#changpassword").submit(function(e) {
        e.preventDefault();
        var oldpassword = $("#oldpassword").val();
        var password = $("#password").val();
        var repassword = $("#repassword").val();
        if (repassword !== password) {
            Swal.fire({
                text: 'กรุณายืนยันรหัสผ่านให้ตรง',
                icon: 'error',
                confirmButtonColor: '#00C851',
                confirmButtonText: 'ตกลง',
                timer: 2500
            })
        } else {
            Swal.fire({
                title: 'คุณแน่ใจมั้ย?',
                text: "คุณต้องการที่จะเปลียนรหัสผ่านจริงๆหรอ!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00C851',
                cancelButtonColor: '#d33',
                cancelButtonText: 'ไม่',
                confirmButtonText: 'ใช่'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "system/api/changpassword.php",
                        data: {
                            oldpassword: oldpassword,
                            password: password,
                        },
                        success: function(data) {
                            if (data == "success") {
                                Swal.fire({
                                    text: 'เปลียนรหัสผ่านสำเร็จ!',
                                    icon: 'success',
                                    timer: 2500,
                                    confirmButtonColor: '#00C851',
                                    confirmButtonText: 'ตกลง'
                                }).then((result) => {
                                    window.location.href = "./home";
                                });
                            } else {
                                Swal.fire({
                                    text: data,
                                    icon: 'error',
                                    timer: 3500,
                                    confirmButtonColor: '#00C851',
                                    confirmButtonText: 'ตกลง'
                                })
                            }
                        }
                    });
                }
            })
        }
    });
</script>