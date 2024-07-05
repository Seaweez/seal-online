<div id="layout-wrapper">
    <div class="main-content mb-4">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <?php require_once 'member_info.php' ?>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h3><i class="fas fa-gift"></i>เติมเงินสะสม</h3>
                                <hr>
                                <div class="row pl-4 pr-4">
                                    <div class="col-lg-8 form-group" style="border-right: 1px solid grey;">
                                        <label>เลือกโปรโมชั่น</label>
                                        <select id="reward_id" class="form-control form-control-lg rewardisus">
                                            <option value=''>เลือกโปรโมชั่น</option>
                                            <?=$class->getcanreward();?>
                                        </select>
                                        <hr>
                                        <h5 class="text-warning">รายละเอียดโปรโมชั่น</h5>
                                        <div class="text-muted promotion-detail">คุณยังไม่ได้เลือกโปรโมชั่น</div>
                                    </div>
                                    <div class="col-lg-4 form-group text-center">
                                        <label>รูปโปรโมชั่น</label>
                                        <div class="show-promotion">
                                            <img class="img-rounded" src="/views/assets/images/promotion/reward.jpg" width="100%" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <hr>
                                        <button class="btn btn-success btn-block waves-effect waves-light btn-promotion">รับไอเท็ม</button>
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