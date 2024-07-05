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
                                        <i class="fas fa-gift"></i>
                                        โอน item cash ข้าม ID  หัก 500 Point
                                    </h3>

                                    <hr>
                                    <div class="form-group">
                                        <label class="text-dark" for="id">ID ผู้รับไอเท็ม</label>
                                        <input type="text" class="form-control" id="user_id" placeholder="Username" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>เลือกตัวละคร</label>
                                        <select id="char_id" class="form-control form-control-lg rewardisus">
                                            <option value>เลือกตัวละคร</option>
                                            <?php
                                            // require_once './system/oop.php';
                                            // $por = new seal;
                                            // $pc = $por->pcinfo();
                                            // foreach ($pc as $p) {
                                            ?>
                                                <!-- <option value="<?php //echo $p['char_order'] ?>">
                                                    เลือกช่องตัวละครที่ <?php //echo $p['char_order'] ?>
                                                </option> -->
                                            <?php
                                            // }
                                            ?>
                                            <?php
                                            foreach($pcinfo as $key => $value) {
                                                echo '<option value="'.$value['char_order'].'">'.$value['char_name'].' (Lv: '.$value['level'].')</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>เลือกช่องที่ต้องการส่ง</label>
                                        <select id="slot_id" class="form-control form-control-lg rewardisus">
                                            <option value>เลือกช่องที่ต้องการส่ง</option>
                                            <?php
                                            for ($i = 1; $i <= 6; $i++) {
                                            ?>
                                                <option value="<?php echo $i ?>">
                                                    เลือกช่องที่ต้องการส่ง <?php echo $i ?>
                                                </option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-success btn-block waves-effect waves-light btn-changeitemcash">ส่งไอเท็ม</button>
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
                    </script> - <a href="https://www.sealmaple.com/">MapleSeal</a>.
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
    $(".btn-changeitemcash").click(function() {
        var char_id = $("#char_id").val();
        var user_id = $("#user_id").val();
        var slot_id = $("#slot_id").val();

        if (char_id == '' || user_id == '' || slot_id == '') {
            Swal.fire({
                text: 'กรูณากรอกข้อมูลให้ครบ',
                icon: 'error',
                confirmButtonColor: '#00C851',
                confirmButtonText: 'ตกลง',
                timer: 3500
            })
        } else {

            Swal.fire({
                title: 'คุณแน่ใจมั้ย?',
                text: "แน่ใจนะว่าจะซื้อ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00C851',
                cancelButtonColor: '#d33',
                cancelButtonText: 'ไม่',
                confirmButtonText: 'ใช่'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'Processing',
                        text: 'กำลังทำรายการโปรดรอสักครู่...',
                        icon: 'info',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        timer: 1000,
                    }).then((res) => {
                        $.ajax({
                            type: "POST",
                            url: "system/api/transferitemcash.php",
                            data: {
                                char_id: char_id,
                                user_id: user_id,
                                slot_id: slot_id
                            },
                            success: function(por) {
                                if (por == "success") {
                                    Swal.fire({
                                        text: 'โอม Item Cash สำเร็จ',
                                        icon: 'success',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 2500
                                    }).then((result) => {
                                        window.location.href = "./transferitemcash";
                                    });
                                } else {
                                    Swal.fire({
                                        text: por,
                                        icon: 'error',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 3500
                                    })
                                }
                            }
                        });
                    });
                }
            })
        }
    });
</script>