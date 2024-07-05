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

                                    <h2>Item Mall</h2>
                                    <div class="table-responsive pt-3 pb-3">
                                        <table id="datatable_user_random" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th class="th-md"></th>
                                                    <th class="th-sm">Name</th>
                                                    <th class="th-md">Price</th>
                                                    <th class="th-lg">Duration/Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once './system/config.php';
                                                $i = 1;
                                                $q = dd_q("SELECT * FROM itemmall_item");
                                                while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                    $unit = 'days';
                                                    if($row['type'] == 'Amount') {
                                                        $unit = 'pcs';
                                                    }
                                                ?>
                                                    <tr>
                                                        <td><img src="../assets/img/item_mall/<?php echo $row['images']; ?>" width="40" /></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php if($row['price'] == 0) echo "<div style='color:gold;'>Free</div>"; else echo $row['price']; ?></td>
                                                        <td><?php echo $row['item_io']." ".$unit; ?></td>
                                                        <input type="hidden" value="<?php echo $row['id'] ?>" />
                                                        <td>
                                                            <button class="btn btn-success" onclick="buy(<?php echo $row['id'] ?>)">Buy</button>
                                                        </td>
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

                                    <h2>Item Mall Purchase History</h2>
                                    <div class="table-responsive pt-3 pb-3">
                                        <table id="datatable_itemshop_history" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="th-sm">Name</th>
                                                    <th class="th-md">Duration/Amount</th>
                                                    <th class="th-lg">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once './system/config.php';
                                                $i = 1;
                                                $q = dd_q("SELECT * FROM itemmall_history WHERE user_id = ? ORDER BY date DESC", [$_SESSION['username']]);
                                                while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                    $unit = 'days';
                                                    if($row['type'] == 'Amount') {
                                                        $unit = 'pcs';
                                                    }
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['item_name']; ?></td>
                                                        <td><?php echo $row['item_io']." ".$unit; ?></td>
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
                            url: "system/api/item_mall.php",
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
                                        window.location.href = "/item_mall";
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
            });
        }
    };
</script>