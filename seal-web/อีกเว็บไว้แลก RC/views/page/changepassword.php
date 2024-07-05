<?php //print_r($class->userinfo()); ?>
<div id="layout-wrapper">
    <div class="main-content mb-4">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <?php require_once 'member_info.php' ?>
                    <div class="col-sm-12 col-md-9">
                            <div class="card">
                                <div class="card-body pt-2"> 
                                    <div class="p-2">
                                        <h3>
                                            <i class="fas fa-key"></i>
                                            เปลี่ยนรหัสผ่าน
                                        </h3>
                                        <hr>
                                            <div class="form-group">
                                                <label for="password-old">รหัสผ่านเดิม</label>
                                                <input type="password" class="form-control" id="password-old" name="password-old"
                                                    placeholder="กรอกรหัสผ่านเดิม">
                                            </div>
                                            <div class="form-group">
                                                <label for="password-new">รหัสผ่านใหม่</label>
                                                <input type="password" class="form-control" id="password-new" name="password-new"
                                                    placeholder="กรอกรหัสผ่านใหม่">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">ยืนยันรหัสผ่านใหม่</label>
                                                <input type="password" class="form-control" id="password-new-re" name="password-new-re"
                                                    placeholder="กรอกยืนยันรหัสผ่านใหม่">
                                            </div>
                                            <div class="mt-4">
                                                <button
                                                    class="btn btn-success btn-block waves-effect waves-light submit-password">เปลี่ยนรหัสผ่าน</button>
                                            </div>
                
                                        </form>
                                    </div>
                
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>