<?php //print_r($class->test()); ?>
<div id="layout-wrapper">
    <div class="main-content mb-4">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <?php require_once 'member_info.php' ?>
                    <div class="col-sm-12 col-md-9">
                        <div class="card">
                            <div class="card-body" style="padding: .25rem;">
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-toggle="tab" href="#wallet" role="tab" aria-selected="true">
                                            <span class="d-none d-sm-block"><i class="fas fa-wallet"></i> เติมเงินผ่าน Truewallet</span> 
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#truecard" role="tab" aria-selected="false">
                                            <span class="d-none d-sm-block"><i class="fas fa-money-check-alt"></i> เติมเงินผ่านบัตร Truemoney</span> 
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#bank" role="tab" aria-selected="false">
                                            <span class="d-none d-sm-block"><i class="fas fa-university"></i> เติมเงินผ่าน ธนาคาร</span> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="wallet" role="tabpanel">
                                        <h3 class="text-center">
                                            <img src="https://lh6.ggpht.com/ZWmHnGHxc4QKr5fndcjjhU553SC7arPMuIOvp81Hb6oNLRjml5sGQjJAiIv-yvT-lQ=w300-rw" width="30px"> 
                                            เติมเงินผ่าน Truewallet
                                        </h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6 mb-5" style="border-right: 1px solid grey;">
                                                <h5 class="text-success">รายละเอียดการโอนเงิน</h5>
                                                <span class="text-danger" style="font-size: 10px;">กรุณาตรวจสอบเบอร์โทรศัพท์ให้ตรงกับชื่อก่อนทำการโอนทุกครั้ง</span>
                                                <div class="textz mt-4">โอนเงินมาที่เบอร์ : <span class="text-warning float-sm-right"><?=$class->cfg['wallet']['phone'];?></span></div>
                                                <div class="textz">ชื่อบัญชี : <span class="text-info float-sm-right"><?=$class->cfg['wallet']['name'];?></span></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="text-success">แจ้งการโอนเงิน</h5>
                                                <div class="form-group mt-4">
                                                    <label for="ref"><i class="fas fa-mobile-alt"> เบอร์โทรศัพท์</i></label>
                                                    <input type="text" name="ref" placeholder="กรอกเบอร์โทรศัพท์ที่โอนเงิน" class="form-control" id="ref">
                                                </div>
                                                <div class="form-group">
                                                    <label for="amount"><i class="fas fa-donate"></i> จำนวนเงิน</i></label>
                                                    <input type="number" name="amount" placeholder="กรอกจำนวนเงินที่โอนเข้ามา" class="form-control" id="amount">
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-success btn-lg btn-block submit-topup" value="wallet"><i class="fas fa-check"></i> ยืนยันทำรายการ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="truecard" role="tabpanel">
                                        <h3 class="text-center">
                                            <img src="https://cdn6.aptoide.com/imgs/d/0/e/d0e80a13c96b7e15adeb390417875da5_icon.png" width="30px"> 
                                            เติมเงินผ่าน บัตรทรูมันนี่
                                        </h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6 mb-5" style="border-right: 1px solid grey;">
                                                <h5 class="text-success">รายละเอียดการโอนเงิน</h5>
                                                <div class="textz mt-4 text-danger" style="font-size: 10px;">- รับเฉพาะบัตรทรูมันนี่ 50, 90, 150, 300, 500 และ 1,000 เท่านั้น!</div>
                                                <div class="textz text-danger" style="font-size: 10px;">- ไม่สามารถใช้บัตรเติมเงินทรูมูฟได้</div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="text-success">แจ้งการโอนเงิน</h5>
                                                <div class="form-group mt-4">
                                                    <label for="numbercard"><i class="fas fa-money-check-alt"></i> เลขบัตรเติมเงิน</i></label>
                                                    <input type="text" name="numbercard" placeholder="กรอกเลขบัตรเติมเงิน (14 หลัก)" class="form-control" id="numbercard" maxlength="14">
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                <button type="button" class="btn btn-success btn-lg btn-block submit-topup" value="truecard"><i class="fas fa-check"></i> ยืนยันทำรายการ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="bank" role="tabpanel">
                                        <h3 class="text-center">
                                            <img src="https://www.tmweasy.com/images/scb.png" width="30px"> 
                                            เติมเงินผ่าน บัญชีธนาคาร & พร้อมเพย์
                                        </h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6 mb-5" style="border-right: 1px solid grey;">
                                                <h5 class="text-success">รายละเอียดการโอนเงิน</h5>
                                                <span class="text-danger" style="font-size: 10px;">กรุณาตรวจสอบชื่อบัญชีให้ตรงก่อนทำการโอนทุกครั้ง</span>
                                                <div class="text-center mt-3">
                                                    <h4>แสกน QR CODE</h4>
                                                    <img src="https://promptpay.io/<?=$class->cfg['bank']['ppay_no'];?>.png" height="150">
                                                </div>
                                                <hr>
                                                <div class="textz">โอนเงินมาที่ธนาคาร : <span class="text-primary float-sm-right"><?=$class->cfg['bank']['bk_name'];?></span></div>
                                                <div class="textz">เลขที่บัญชี : <span class="text-success float-sm-right"><?=$class->cfg['bank']['ac_no'];?></span></div>
                                                <div class="textz">พร้อมเพย์ : <span class="text-danger float-sm-right"><?=$class->cfg['bank']['ppay_no'];?></span></div>
                                                <div class="textz">ชื่อบัญชี : <span class="text-info float-sm-right"><?=$class->cfg['bank']['ac_name'];?></span></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="text-success">แจ้งการโอนเงิน</h5>
                                                <span class="text-danger" style="font-size: 10px;">กรุณาแจ้งเวลาที่ตรงตามสลิปการโอนเงิน</span>
                                                <div class="row mt-4">
                                                    <div class="col-lg-6 form-group">
                                                        <label for="bamount">จำนวนเงิน (บาท)</label>
                                                        <input type="number" class="form-control text-center" name="bamount" id="bamount" placeholder="ตัวอย่าง: 10" required>
                                                    </div>
                                                    <div class="col-lg-6 form-group">
                                                        <label for="bstang">จำนวนเงิน (สตางค์)</label>
                                                        <input type="number" class="form-control text-center" name="bstang" id="bstang" placeholder="ตัวอย่าง: 01" required>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="day">วันที่โอนเงิน</label>
                                                        <select name="day" id="day" class="form-control text-center">
                                                        <?php
                                                            $today=date("d");
                                                            $yesday=date("d", strtotime("-1 day"));
                                                            $todaycode=date("Ymd");
                                                            $yesdaycode=date("Ymd", strtotime("-1 day"));
                                                            echo "<option value='$todaycode' selected>$today</option>";
                                                            echo "<option value='$yesdaycode'>$yesday</option>";
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="hour">เวลาโอน (ชั่วโมง)</label>
                                                        <select name="hour" id="hour" class="form-control text-center">
                                                        <?php
                                                            $hh=0;
                                                            $select="";
                                                            while($hh<24){
                                                                if(date("H")==$hh) { $select='selected'; }
                                                                $hhdispay=sprintf("%02d", $hh);
                                                                echo "<option value='$hhdispay' $select>$hhdispay</option>";
                                                                $select="";
                                                                $hh++;
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <label for="minute">เวลาโอน (นาที)</label>
                                                        <select name="minute" id="minute" class="form-control text-center">
                                                        <?php
                                                            $mm=0;
                                                            $select="";
                                                            while($mm<60){
                                                                if(date("i")==$mm) { $select='selected'; }
                                                                $mmdispay=sprintf("%02d", $mm);
                                                                echo "<option value='$mmdispay' $select>$mmdispay</option>";
                                                                $select="";
                                                                $mm++;
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <hr>
                                                        <button type="button" class="btn btn-success btn-lg btn-block submit-topup" value="bank"><i class="fas fa-check"></i> ยืนยันทำรายการ</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center mb-3">ประวัติการเติมเงิน</h3>
                                <table class="table text-center">
                                    <thead class="text-warning">
                                        <tr>
                                            <th>#</th>
                                            <th>ราคา</th>
                                            <th>Point</th>
                                            <th>รูปแบบ</th>
                                            <th>เวลา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i=1;
                                        foreach($class->gettopup_log() as $row) {
                                    ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$row['amount'];?></td>
                                            <td><?=$row['point'];?></td>
                                            <td><?=$row['type'];?></td>
                                            <td><?=$row['success_time'];?></td>
                                        </tr>
                                    <?php $i++;} ?>
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