<?php //print_r($class->userinfo()); ?>
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
                                            <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab" aria-selected="true">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">ซื้อ RC</span> 
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab" aria-selected="false">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">แลกเปลี่ยน RC</span> 
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="home-1" role="tabpanel">
                                            <h3>
                                                <i class="fas fa-coins"></i>
                                                ซื้อ RC
                                            </h3>
                                            <hr>
                                            <center>
                                                <h4><span class="badge badge-warning">100</span> Point = 1 RC</h4>
                                                <div class="form-group mb-md-4 mt-4">
                                                    <input type="text" name="buycount" placeholder="จำนวน" class="form-control form-line-control" id="buycount">
                                                </div>
                                                <button type="button" class="btn btn-success btn-lg btn-block waves-effect waves-light btn-buyrc"><i class="fas fa-check"></i>&nbsp;ยืนยันทำรายการ</button>
                                            </center>
                                        </div>
                                        <div class="tab-pane" id="profile-1" role="tabpanel">
                                            <h3>
                                                <i class="fas fa-exchange-alt"></i>
                                                แลกเปลี่ยน RC
                                            </h3>
                                            <hr>
                                            <center>
                                                <h4> 1 RC = <span class="badge badge-warning">100</span> Point</h4>
                                                <p class="text-danger">นำ RC ที่ต้องการจะแลกมาไว้ที่ช่องแรก</p>
                                                <div class="form-group mb-md-4 mt-2">
                                                    <input type="text" name="sellcount" placeholder="จำนวน" class="form-control form-line-control" id="sellcount">
                                                </div>
                                                <button type="button" class="btn btn-success btn-lg btn-block waves-effect waves-light btn-sellrc"><i class="fas fa-check"></i>&nbsp;ยืนยันทำรายการ</button>
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