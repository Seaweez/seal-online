<!-- header_menu -->
<div id="particles-js">
    <canvas class="particles-js-canvas-el" width="1024" height="650" style="width: 100%; height: 100%;"></canvas>
</div>
<div class="header-top" style="margin-top: 0px;">
    <div class="container" style="height: 650px;"></div>
</div>
<div class="slider" style="margin-top: -100px;">
    <div class="container">
        <div class="row">
            <div class="slidemain">
                <div class="col-slider-right menucontent-boxright">
                    <div class="object-menu-right-content btnmember visible-lg"></div>
                    <ul class="menu-right-content">
                        <li>
                            <a href="<?=(empty($_SESSION['user_name'])?'/login':'/member')?>">
                                <div class="boxbtn-rightcontent">
                                    <div class="clearfix btn-topcontent">
                                        <div class="pull-right">
                                            <div class="menu-right-content-text">ระบบจัดการตัวละคร</div>
                                            <div class="menu-right-content-subtext">MANAGE ACCOUNT</div>
                                        </div>
                                        <div class="pull-right">
                                            <i class="fa fa-cog icon-menu-right-content" alt="ระบบจัดการตัวละคร"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/register">
                                <div class="boxbtn-rightcontent aos-init aos-animate" data-aos="fade-right">
                                    <div class="clearfix btn-topcontent">
                                        <div class="pull-right">
                                            <div class="menu-right-content-text">สมัครสมาชิก</div>
                                            <div class="menu-right-content-subtext">REGISTER</div>
                                        </div>
                                        <div class="pull-right">
                                            <i class="fa fa-user-plus icon-menu-right-content" alt="สมัครสมาชิก"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?=(empty($_SESSION['user_name'])?'/login':'/topup')?>">
                                <div class="boxbtn-rightcontent aos-init aos-animate" data-aos="fade-left">
                                    <div class="clearfix btn-topcontent">
                                        <div class="pull-right">
                                            <div class="menu-right-content-text">บริจาคให้เซิฟเวอร์</div>
                                            <div class="menu-right-content-subtext">DONATE SERVER</div>
                                        </div>
                                        <div class="pull-right">
                                            <i class="fa fa-credit-card icon-menu-right-content" alt="บริจาคให้เซิฟเวอร์"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/download">
                                <div class="boxbtn-rightcontent aos-init aos-animate" data-aos="fade-right">
                                    <div class="clearfix btn-topcontent">
                                        <div class="pull-right">
                                            <div class="menu-right-content-text">ดาวน์โหลด</div>
                                            <div class="menu-right-content-subtext">DOWNLOAD</div>
                                        </div>
                                        <div class="pull-right">
                                            <i class="fas fa-download icon-menu-right-content" alt="ดาวน์โหลด"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-slider-left">
                    <div class="slider-bg">
                        <div class="wide-container">
                            <div id="slides">
                                <ul class="slides-container">
                                    <li>
                                        <img src="/views/assets/images/banner/BANNER-02.jpg" class="img-responsive" alt="OPEN BETA เร็วๆนี้..!!">
                                        <div class="carousel-caption">
                                            <h4>SLIDE 1</h4>
                                            <span>COMING SOON ...</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/views/assets/images/banner/BANNER-03.jpg" class="img-responsive" alt="OPEN BETA เร็วๆนี้..!!">
                                        <div class="carousel-caption">
                                            <h4>SLIDE 2</h4>
                                            <span>COMING SOON ...</span>
                                        </div>
                                    </li>
                                </ul>
                                <nav class="slides-navigation">
                                  <a href="#" class="next"></a>
                                  <a href="#" class="prev"></a>
                                </nav>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="status-section aos-init aos-animate" data-aos="fade-up">
                    <div class="col-md-4">
                        <div class="slider-slide tns-item tns-slide-active" id="stat-block-slider-item2">
                            <div class="stat-block">
                              <div class="stat-block-decoration">
                                <i class="fa fa-check" style="color: white;font-size: 24px;"></i>
                              </div>
                              <div class="stat-block-info">
                                <p class="stat-block-title">สถานะเซิฟเวอร์</p>
                                <p class="stat-block-text">ONLINE</p>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="slider-slide tns-item tns-slide-active" id="stat-block-slider-item2">
                            <div class="stat-block">
                              <div class="stat-block-decoration">
                                <i class="fa fa-signal" style="color: white;font-size: 24px;"></i>
                              </div>
                              <div class="stat-block-info">
                                <p class="stat-block-title">ออนไลน์ตอนนี้</p>
                    
                                <p class="stat-block-text"><?php echo $class->countusernow(); ?></p>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="slider-slide tns-item tns-slide-active" id="stat-block-slider-item2">
                            <div class="stat-block">
                              <div class="stat-block-decoration">
                                <i class="fa fa-user" style="color: white;font-size: 24px;"></i>
                              </div>
                              <div class="stat-block-info">
                                <p class="stat-block-title">จำนวนตัวละคร</p>
                                <p class="stat-block-text"><?php echo $class->countuserall(); ?></p>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="activitie_tab">
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="activitie_text aos-init aos-animate" data-aos="fade-down">
                    <h2 style="color: #fff;font-weight: 800;">LATEST NEWS UPDATE</h2>
                    <p>รายการอัพเดทกิจกรรมล่าสุดในเซิฟเวอร์</p>
                </div>
                <div class="row">
                    <?php for($i=0;$i<9;$i++) { ?>
                    <div class="col-xs-4 aos-init aos-animate" data-aos="fade-up">
                        <div class="box-allnews-left">
                            <div class="img-shine">
                                <figure><img src="/views/assets/images/Logo.png" class="img-rounded" width="100%"></figure>
                                <div>
                                    <p class="text-fullnews">SERVER INFORMATION</p>
                                    <p class="text-mininews">รายละเอียดเซิฟเวอร์ SEAL XG</p>
                                    <span class="text-postnews">
                                        <i class="far fa-clock"></i> โพสต์เมื่อ : <time class="timeago" datetime="2020-7-7 22:22:22" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="">7/7/2564</time>
                                    </span>
                                    <span class="label label-all-update">UPDATE</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="aos-init aos-animate" data-aos="fade-left">
                    <div class="menu-header">ข้อมูลภายในเกมส์ <small>INFOMATION</small></div>
                    <div class="menu-tab">
                        <ul class="nav backdrop-nav" role="tablist">
                            <li>
                                <a href="https://sealonline.fandom.com/wiki/Monster">
                                    <img src="/views/assets/images/icon/01.png"> 
                                    ข้อมูลการดรอป <small>DROP RATE</small>
                                </a>
                            </li>
                            <li>
                                <a href="https://sealonline.fandom.com/wiki/Pet#Pet_Eggs">
                                    <img src="/views/assets/images/icon/02.png"> 
                                    ข้อมูลอีโวสัตว์เลี้ยง <small>PET EVOLUTION</small>
                                </a>
                            </li>
                            <li>
                                <a href="/infoskill">
                                    <img src="/views/assets/images/icon/03.png"> 
                                    ข้อมูลการปรับสกิล <small>SKILL INFOMATION</small>
                                </a>
                            </li>
                            <li>
                                <a href="/guide">
                                    <img src="/views/assets/images/icon/04.png"> 
                                    ข้อมูลการเปลี่ยนอาชีพ <small>CLASS INFOMATION</small> 
                                </a>
                            </li>
                            <div style="clear:both;"></div>
                        </ul>
                    </div>
                </div>
                <div class="aos-init aos-animate" data-aos="fade-up">
                    <div class="menu-header">
                        <span>แฟนเพจ</span> 
                        <small>FANPAGE</small>
                    </div>
                    <div class="menu-tab backdrop-nav text-center">
                        <div data-href="https://www.facebook.com/sealbattleonlineplus" class="fb-page" data-tabs="timeline" data-height="330">
                            <blockquote cite="https://www.facebook.com/sealbattleonlineplus" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/sealbattleonlineplus">Seal-Battle</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>