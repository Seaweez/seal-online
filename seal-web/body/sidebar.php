<?php
$seal = new seal;
$pcinfo = $seal->pcinfo();
$showhis = $seal->showhis();
$pointhis = $showhis['Cash'];
$userinfo = $seal->userinfo();
$point = $userinfo['point'];
$status = ($userinfo['delete_flag'] == 2) ? "โดนแบน" : "ปกติ";
?>
<div class="col-sm-12 col-md-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">ข้อมูลผู้เล่น</div>
                <div class="card-body">
                    <p class="textz">ID&nbsp;<span class="badge badge-info ml-1 textz"><?= $_SESSION['username'] ?></span></p>
                    <p class="textz">สถานะ&nbsp;<span class="badge badge-success ml-1 textz"><?= $status ?></span></p>
                    <p class="textz">Point&nbsp;<span class="badge badge-warning ml-1 textz"><?= $point ?></span></p>
                    <p class="textz">เติมเงินสะสม&nbsp;<span class="badge badge-danger ml-1 textz"><?= $pointhis  .บาท ?> </span></p>
                    <hr>
                    <a href="#" onclick="    
                    Swal.fire({
                      text: 'โปรดติดต่อที่แฟนเพจ',
                        icon: 'error'
                    })" class="btn btn-primary btn-md btn-block waves-effect waves-light"><i class="fas fa-credit-card"></i>&nbsp;เติมเงิน</a>
                    <a href="/itemshop" class="btn btn-primary btn-md btn-block waves-effect waves-light"><i class="fas fa-store"></i>&nbsp;ร้านค้า</a>
                    <a href="/item_mall" class="btn btn-primary btn-md btn-block waves-effect waves-light"><i class="fas fa-store"></i>&nbsp;Item Mall</a>
                    <a href="/login_event" class="btn btn-primary btn-md btn-block waves-effect waves-light"><i class="fas fa-gift"></i>&nbsp;Login Event</a>
                    <a href="/transferitemcash" type="button" class="btn btn-primary btn-md btn-block waves-effect waves-light"><i class="fas fa-coins"></i>&nbsp;โอน Item Cash ข้ามไอดี</a>
                    <a href="/changepassword" class="btn btn-primary btn-md btn-block waves-effect waves-light"><i class="fas fa-key"></i>&nbsp;เปลี่ยนรหัสผ่าน</a>
                    <?php 
                    if($_SESSION['username'] == 'akisung'){
                    ?>
                    <a href="/ban" class="btn btn-primary btn-md btn-block waves-effect waves-light"><i class="fas fa-key"></i>&nbsp;แบนผู้เล่น</a>
                    <?php 
                    }
                    ?>
					<a id="kickgame" class="btn btn-info btn-md btn-block waves-effect waves-light"><i class="fas fa-virus"></i>&nbsp;เตะตัวละคร</a>
                    <a id="clearhead" class="btn btn-info btn-md btn-block waves-effect waves-light"><i class="fas fa-virus"></i>&nbsp;ล้างหัวสี</a>
                    <a id="backtown" class="btn btn-info btn-md btn-block waves-effect waves-light"><i class="fas fa-virus"></i>&nbsp;กลับเมืองหลัก Elim</a>
                    <?php 
                    if($_SESSION['username'] == 'akisung'){
                    ?>
                    <a href="/webpanel" class="btn btn-success btn-md btn-block waves-effect waves-light"><i class="fa fa-cog"></i>&nbsp;Web Panel</a>
                    <?php
                    }
                    ?>
                    <button id="logout" type="button" class="btn btn-danger btn-md btn-block waves-effect waves-light "><i class="fas fa-sign-out-alt"></i>&nbsp;ออกจากระบบ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#logout").click(function() {
        Swal.fire({
            title: 'คุณแน่ใจมั้ย?',
            text: "คุณต้องการที่จะออกจากระบบจริงๆหรอ!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00C851',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ไม่',
            confirmButtonText: 'ใช่'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "system/api/logout.php",
                    success: function(data) {
                        Swal.fire({
                            text: 'ออกจากระบบสำเร็จ',
                            icon: 'success',
                            timer: 2500,
                            confirmButtonColor: '#00C851',
                            confirmButtonText: 'ตกลง'
                        }).then((result) => {
                            window.location.href = "./home";
                        });
                    }
                });
            }
        })
    });
    // $("#logoutm").click(function() {
    //     Swal.fire({
    //         title: 'คุณแน่ใจมั้ย?',
    //         text: "คุณต้องการที่จะออกจากระบบจริงๆหรอ!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#00C851',
    //         cancelButtonColor: '#d33',
    //         cancelButtonText: 'ไม่',
    //         confirmButtonText: 'ใช่'
    //     }).then((result) => {
    //         if (result.value) {
    //             $.ajax({
    //                 url: "system/api/logout.php",
    //                 success: function(data) {
    //                     Swal.fire({
    //                         text: 'ออกจากระบบสำเร็จ',
    //                         icon: 'success',
    //                         timer: 2500,
    //                         confirmButtonColor: '#00C851',
    //                         confirmButtonText: 'ตกลง'
    //                     }).then((result) => {
    //                         window.location.href = "./home";
    //                     });
    //                 }
    //             });
    //         }
    //     })
    // });

    $("#clearhead").click(function() {
        Swal.fire({
            title: 'กรุณาเลือกช่องทางการตัดเงิน',
            text: 'ล้างหัวจะถูกหัก 100 พ้อย ออกตัวละครก่อนทำรายการ',
            icon: 'warning',
            input: 'select',
            inputOptions: {
                'Point': 'Point',
               
            },
            confirmButtonColor: '#00C851',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'ถัดไป',
            inputPlaceholder: 'เลือกช่องทางการตัดเงิน',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('กรุณาเลือกช่องทางการตัดเงิน');
                    }
                });
            }
        }).then(function(result) {
            if (result.value) {
                Swal.fire({
                    title: 'กรุณาเลือกสล็อตตัวละคร',
                    text: 'เลือกสล็อตตัวละครที่จะทำรายการ',
                    icon: 'warning',
                    input: 'select',
                    inputOptions: {
                        <?php
                        foreach ($pcinfo as $row) {
                        ?> '<?= $row['char_order'] ?>': 'ช่องตัวละคร ที่ <?= $row['char_order'] ?>',
                        <?php } ?>
                    },
                    confirmButtonColor: '#00C851',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'ยกเลิก',
                    confirmButtonText: 'ทำรายการ',
                    inputPlaceholder: 'เลือกสล็อตตัวละคร',
                    showCancelButton: true,
                    inputValidator: function(value) {
                        return new Promise(function(resolve, reject) {
                            if (value !== '') {
                                resolve();
                            } else {
                                resolve('กรุณาเลือกสล็อตตัวละครที่จะทำรายการ');
                            }
                        });
                    }
                }).then(function(resultpor) {
                    if (resultpor.value) {
                        Swal.fire({
                            title: 'คุณแน่ใจมั้ย?',
                            text: "คุณออกตัวละครในเกมรึยัง!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#00C851',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'ไม่ได้ออก',
                            confirmButtonText: 'ออกแล้ว'
                        }).then((result1) => {
                            if (result1.value) {
                                $.ajax({
                                    type: "POST",
                                    url: "system/api/clearhead.php",
                                    data: {
                                        method: result.value,
                                        slo: resultpor.value,
                                    },
                                    success: function(data) {
                                        if (data == "success") {
                                            Swal.fire({
                                                icon: 'success',
                                                confirmButtonColor: '#00C851',
                                                confirmButtonText: 'ตกลง',
                                                timer: 2500,
                                                html: 'ล้างหัวสีสำเร็จโดยใช้ ' + result.value + ' ในการล้าง สล็อตที่ ' + resultpor.value
                                            }).then((result) => {
                                                window.location.href = "./member";
                                            });
                                        } else {
                                            Swal.fire({
                                                text: data,
                                                icon: 'error',
                                                confirmButtonColor: '#00C851',
                                                confirmButtonText: 'ตกลง',
                                                timer: 2500
                                            })
                                        }
                                    }
                                })
                            }
                        });
                    }
                });
            }
        });
    });
    $("#backtown").click(function() {
        Swal.fire({
            title: 'กรุณาเลือกสล็อตตัวละคร',
            text: 'เลือกสล็อตตัวละครที่จะทำรายการ',
            icon: 'warning',
            input: 'select',
            inputOptions: {
                <?php
                foreach ($pcinfo as $row) {
                ?> '<?= $row['char_order'] ?>': 'ช่องตัวละคร ที่ <?= $row['char_name'] ?>',
                <?php } ?>
            },
            confirmButtonColor: '#00C851',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'ทำรายการ',
            inputPlaceholder: 'เลือกสล็อตตัวละคร',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('กรุณาเลือกสล็อตตัวละครที่จะทำรายการ');
                    }
                });
            }
        }).then(function(resultpor) {
            if (resultpor.value) {
                Swal.fire({
                    title: 'คุณแน่ใจมั้ย?',
                    text: "คุณออกตัวละครในเกมรึยัง!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00C851',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'ไม่ได้ออก',
                    confirmButtonText: 'ออกแล้ว'
                }).then((result1) => {
                    if (result1.value) {
                        $.ajax({
                            type: "POST",
                            url: "system/api/backtown.php",
                            data: {
                                slo: resultpor.value,
                            },
                            success: function(data) {
                                if (data == "success") {
                                    Swal.fire({
                                        icon: 'success',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 2500,
                                        html: 'กลับเมืองหลัก Elim สล็อตที่ ' + resultpor.value
                                    }).then((result) => {
                                        window.location.href = "./member";
                                    });
                                } else {
                                    Swal.fire({
                                        text: data,
                                        icon: 'error',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 2500
                                    })
                                }
                            }
                        })
                    }
                });
            }
        });
    });
    $("#kickgame").click(function() {
        Swal.fire({
            title: 'กรุณาเลือกสล็อตตัวละคร',
            text: 'เลือกสล็อตตัวละครที่จะทำรายการ',
            icon: 'warning',
            input: 'select',
            inputOptions: {
                <?php
                foreach ($pcinfo as $row) {
                ?> '<?= $row['char_order'] ?>': 'ช่องตัวละคร ที่ <?= $row['char_name'] ?>',
                <?php } ?>
            },
            confirmButtonColor: '#00C851',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'ทำรายการ',
            inputPlaceholder: 'เลือกสล็อตตัวละคร',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('กรุณาเลือกสล็อตตัวละครที่จะทำรายการ');
                    }
                });
            }
        }).then(function(resultpor) {
            if (resultpor.value) {
                Swal.fire({
                    title: 'คุณแน่ใจมั้ย?',
                    text: "เตะตัวละครที่ค้าง!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00C851',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'ยกเลิก',
                    confirmButtonText: 'เตะ'
                }).then((result1) => {
                    if (result1.value) {
                        $.ajax({
                            type: "POST",
                            url: "system/api/kickgame.php",
                            data: {
                                slo: resultpor.value,
                            },
                            success: function(data) {
                                if (data == "success") {
                                    Swal.fire({
                                        icon: 'success',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 2500,
                                        html: 'เตะตัวละครแล้ว ' + resultpor.value
                                    }).then((result) => {
                                        window.location.href = "./member";
                                    });
                                } else {
                                    Swal.fire({
                                        text: data,
                                        icon: 'error',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 2500
                                    })
                                }
                            }
                        })
                    }
                });
            }
        });
    });
</script>