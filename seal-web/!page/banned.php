<?php
if ($_SESSION['username'] != 'akisung') {
    echo "<meta http-equiv='refresh' content='0; URL=/member'>";
} else {
?>


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
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">แบน</span>
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">ปลดแบน</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content p-3 text-muted">

                                            <div class="tab-pane active" id="home-1" role="tabpanel">
                                                <h3>
                                                    เแบนไอดี
                                                </h3>
                                                <hr>
                                                <center>
                                                    <div class="form-group mb-md-4 mt-2">
                                                        <input type="text" name="user_id1" placeholder="กรอก Username" class="form-control form-control-lg form-line-control" id="user_id1">
                                                    </div>
                                                    <button type="button" class="btn btn-success btn-lg btn-block waves-effect waves-light submit-ban"><i class="fas fa-check"></i>&nbsp;ยืนยันการแบน</button>

                                                </center>
                                            </div>

                                            <div class="tab-pane" id="profile-1" role="tabpanel">
                                                <h3>
                                                    ปลดเแบนไอดี
                                                </h3>
                                                <hr>
                                                <center>
                                                    <div class="form-group mb-md-4 mt-2">

                                                        <input type="text" name="user_id2" placeholder="กรอก Username" class="form-control form-control-lg form-line-control" id="user_id2">
                                                    </div>
                                                    <button type="button" class="btn btn-success btn-lg btn-block waves-effect waves-light submit-unban"><i class="fas fa-check"></i>&nbsp;ยืนยันการปลดแบน</button>

                                                </center>
                                            </div>

                                        </div>
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
                        </script> - <a href="https://www.facebook.com/SealMaple">MapleSeal</a>.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Edit by Eryxiz
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script type="text/javascript">
        $(".submit-ban").click(function(e) {
            e.preventDefault();
            var user_id1 = $("#user_id1").val();
            var func = 2;
            if (user_id1 == '') {
                Swal.fire({
                    text: 'กรุณาใส่ไอดี',
                    icon: 'error',
                    confirmButtonColor: '#00C851',
                    confirmButtonText: 'ตกลง',
                    timer: 2500
                })
            } else {
                Swal.fire({
                    title: 'คุณแน่ใจมั้ย?',
                    text: "คุณต้องการที่จะแบนจริงๆหรอ!",
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
                            url: "system/api/banned.php",
                            data: {
                                user_id: user_id1,
                                func: func,
                            },
                            success: function(data) {
                                if (data == "success") {
                                    Swal.fire({
                                        text: 'แบนสำเร็จ!',
                                        icon: 'success',
                                        timer: 2500,
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง'
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


        $(".submit-unban").click(function(e) {
            e.preventDefault();
            var user_id2 = $("#user_id2").val();
            var func = 0;
            if (user_id2 == '') {
                Swal.fire({
                    text: 'กรุณาใส่ไอดี',
                    icon: 'error',
                    confirmButtonColor: '#00C851',
                    confirmButtonText: 'ตกลง',
                    timer: 2500
                })
            } else {
                Swal.fire({
                    title: 'คุณแน่ใจมั้ย?',
                    text: "คุณต้องการที่จะปลดแบนจริงๆหรอ!",
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
                            url: "system/api/banned.php",
                            data: {
                                user_id: user_id2,
                                func: func
                            },
                            success: function(data) {
                                if (data == "success") {
                                    Swal.fire({
                                        text: 'ปลดแบนสำเร็จ!',
                                        icon: 'success',
                                        timer: 2500,
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง'
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




<?php
}
?>