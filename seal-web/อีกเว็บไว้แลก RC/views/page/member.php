<div id="layout-wrapper">
    <div class="main-content mb-4">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <?php require_once 'member_info.php' ?>
                    <div class="col-sm-12 col-md-9">
                        <div class="card">
                            <div class="card-body text-center" style="padding: .25rem;">
                                    <h3 class="mt-4">ยินดีต้อนรับคุณ <span style="color: red;">[ <?=$class->userinfo()['id'];?> ]</span></h3>
                                    <img src="/views/assets/images/Logo.png" width="43%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>