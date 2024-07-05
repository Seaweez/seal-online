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

                                    <h2>Login Event</h2>
                                    <hr>
                                    <div class="table-responsive pt-3 pb-3">
                                        <table id="datatable_user_random" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <!-- <th>#</th> -->
                                                    <th class="th-lg">Event Name</th>
                                                    <th class="th-sm">Require</th>
                                                    <th class="th-sm">Reward</th>
                                                    <th class="th-md"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once './system/config.php';

                                                $i = 1;
                                                $q = dd_q("SELECT * FROM login_event");
                                                while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                    $require = $row['require_item_name'].' ('.($row['require_item_io']+1).' x)';
                                                    $reward = $row['reward_item_name'].' ('.($row['reward_item_io']+1).' x)';
                                                ?>
                                                    <tr>
                                                        <!-- <td><?php //echo $i; ?></td> -->
                                                        <td><?php echo $row['event_name']; ?></td>
                                                        <td><?php echo $require; ?></td>
                                                        <td><?php echo $reward; ?></td>
                                                        <input type="hidden" value="<?php echo $row['id'] ?>" />
                                                        <td><button class="btn btn-sm btn-success" onclick="claim(<?php echo $row['id'] ?>)">Claim</button></td>
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

                                    <h2>Claim History</h2>
                                    <div class="table-responsive pt-3 pb-3">
                                        <table id="datatable_claim_history" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="th-sm">#</th>
                                                    <th class="th-md">Event Name</th>
                                                    <th class="th-md">Requirement</th>
                                                    <th class="th-md">Reward</th>
                                                    <th class="th-lg">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once './system/config.php';
                                                $i = 1;
                                                $q = dd_q("SELECT * FROM login_event_history WHERE user_id = ? ORDER BY date DESC", [$_SESSION['username']]);
                                                while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['event_name']; ?></td>
                                                        <td><?php echo $row['require_item_name'].' ('.($row['require_item_io']+1).' x)'; ?></td>
                                                        <td><?php echo $row['reward_item_name'].' ('.($row['reward_item_io']+1).' x)'; ?></td>
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
    function claim(eventid) {
        var eventid = eventid
        if (eventid == null) {
            Swal.fire({
                text: 'กรูณาเลือกไอเทม',
                icon: 'error',
                confirmButtonColor: '#00C851',
                confirmButtonText: 'ตกลง',
                timer: 3500
            })

        } else {
            // console.log(eventid)
            Swal.fire({
                title: 'คุณแน่ใจมั้ย?',
                text: "เพื่อแลกเปลี่ยนสิ่งนี้",
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
                            url: "system/api/login_event.php",
                            data: {
                                eventid: eventid,
                            },
                            success: function(por) {
                                if (por == "success") {
                                    Swal.fire({
                                        text: 'เคลมรายการสำเร็จ',
                                        icon: 'success',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 2500
                                    }).then((result) => {
                                        window.location.href = "/login_event";
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