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

                                    <h2>ไอเทมที่ขาย</h2>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2" style="padding-top:10px;">Filter Category</div>
                                        <div class="col-md-4">
                                            <select class="form-control" id="idcategory" name="idcategory">
                                                <option value="">All Category</option>
                                                <?php
                                                require_once './system/config.php';
                                                $q = dd_q("SELECT * FROM itemshop_category");
                                                while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                    $sel = "";
                                                    if($row['idcategory'] == $_GET['id']) {
                                                        $sel = "selected";
                                                    }
                                                ?>
                                                    <option value="<?php echo $row['idcategory']; ?>" <?php echo $sel; ?>><?php echo $row['category_name']; ?></option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="table-responsive pt-3 pb-3">
                                        <table id="datatable_user_random" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <!-- <th>#</th> -->
                                                    <th class="th-lg">รูป</th>
                                                    <th class="th-sm">ชื่อ</th>
                                                    <th class="th-sm">หมวดหมู่</th>
                                                    <th class="th-md">ราคา</th>
                                                    <th class="th-md"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once './system/config.php';

                                                $w = "";
                                                if(isset($_GET['id'])) {
                                                    if(strlen($_GET['id']) > 0) {
                                                        $w = "WHERE itemshop_item.idcategory = ".$_GET['id'];
                                                    }
                                                }

                                                $i = 1;
                                                $q = dd_q("SELECT * FROM itemshop_item JOIN itemshop_category ON itemshop_item.idcategory = itemshop_category.idcategory ".$w);
                                                while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                    <tr>
                                                        <!-- <td><?php //echo $i; ?></td> -->
                                                        <td><img src="img/itemshop/<?php echo $row['images']; ?>" /></td>
                                                        <td>
                                                            <?php 
                                                            echo $row['name'];
                                                            if($row['quantity'] > 1) {
                                                                echo ' ('.$row['quantity'].'x)';
                                                            } 
                                                            ?>
                                                        </td>
                                                        <td><?php echo $row['category_name']; ?></td>
                                                        <td><?php echo $row['price']; ?></td>
                                                        <input type="hidden" value="<?php echo $row['id'] ?>" />
                                                        <td><button class="btn btn-success" onclick="buy(<?php echo $row['id'] ?>)">ซื้อ</button></td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body pt-2">
                                <div class="p-2">

                                    <h2>ประวัติการซื้อไอเทม</h2>
                                    <div class="table-responsive pt-3 pb-3">
                                        <table id="datatable_itemshop_history" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="th-sm">ชื่อ</th>
                                                    <th class="th-md">จำนวน</th>
                                                    <th class="th-lg">เวลา</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once './system/config.php';
                                                $i = 1;
                                                $q = dd_q("SELECT * FROM itemshop_history WHERE user_id = ? ORDER BY date DESC", [$_SESSION['username']]);
                                                while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['item_name']; ?></td>
                                                        <td><?php echo $row['item_io']; ?></td>
                                                        <td><?php echo $row['date']; ?></td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>
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
    jQuery('#idcategory').on('change', function() {
        var val = jQuery(this).val();

        if(val == "") {
            window.location.href = "?";
        } else {
            window.location.href = "?id=" + val;
        }
    });

    function buy(itemid) {
        var itemid = itemid
        if (itemid == null) {
            Swal.fire({
                text: 'กรูณาเลือกไอเทม',
                icon: 'error',
                confirmButtonColor: '#00C851',
                confirmButtonText: 'ตกลง',
                timer: 3500
            })

        } else {
            // console.log(itemid)
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
                            url: "system/api/itemshop.php",
                            data: {
                                itemid: itemid,
                            },
                            success: function(por) {
                                if (por == "success") {
                                    Swal.fire({
                                        text: 'ซื้อไอเทมสำเร็จ',
                                        icon: 'success',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 2500
                                    }).then((result) => {
                                        window.location.href = "/itemshop";
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
    };
</script>