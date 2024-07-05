<?php $user = $class->userinfo(); ?>

<style>
    .textz {
        font-size: 14px;
    }
</style>
<div class="col-sm-12 col-md-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">ข้อมูลผู้เล่น</div>
                <div class="card-body">
                    <div class="textz" style="padding: 5px 0px;">ID: <span class="float-sm-right text-danger"><?=$user['id'];?></span></div>
                    <div class="textz" style="padding: 5px 0px;">Status: <span class="float-sm-right text-success">ปกติ</span></div>
                    <div class="textz" style="padding: 5px 0px;">Point: <span class="float-sm-right text-warning"><?=$user['point'];?></span></div>
                    <!--div class="textz" style="padding: 5px 0px;">Bonus Point: <span class="float-sm-right text-primary"--><!--?=($user['bonus_point'])?$user['bonus_point']:0;?></span></div-->
                    <!--div class="textz" style="padding: 5px 0px;">Last Bonus Level: <span class="float-sm-right text-info">Lv.--><!--?=($user['bonus_level'])?$user['bonus_level']:0;?></span></div-->
                    <hr>
                    <!--a href="/topup" class="btn btn-primary btn-md btn-block waves-effect waves-light">
                        <i class="fas fa-credit-card"></i> เติมเงิน
                    </a>
                    <a href="/promotion" class="btn btn-primary btn-md btn-block waves-effect waves-light">
                        <i class="fas fa-gift"></i> เติมเงินสะสม
                    </a-->
                    <a href="/rc" type="button" class="btn btn-primary btn-md btn-block waves-effect waves-light">
                        <i class="fas fa-coins"></i> ซื้อ - แลก RC
                    </a>
                    <a type="button" class="btn btn-danger btn-md btn-block waves-effect waves-light logout-click">
                        <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>