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
                                            <i class="fas fa-virus"></i>
                                            เตะตัวละครออกจากเกมส์
                                        </h3>
                                        <hr>
                                            <div class="form-group">
                                                <label>เลือกตัวละคร</label>
                                                <select id="charid" class="form-control form-control-lg">
                                                    <option value>เลือกตัวละคร</option>
                                                    <?php $class->getchar_list(); ?>
                                                </select>
                                            </div>
                                            <div class="mt-4">
                                                <button
                                                    class="btn btn-success btn-block waves-effect waves-light btn-kick">เตะตัวละคร</button>
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