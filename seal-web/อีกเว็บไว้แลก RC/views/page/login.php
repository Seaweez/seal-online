<div id="layout-wrapper">
        <div class="main-content mb-4">
            <div class="page-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card overflow-hidden">
                                <div class="card-header">
                                    <h3 class="text-center mt-1 mb-1"><i class="fas fa-sign-in-alt"></i>&nbsp;เข้าสู่ระบบ</h3>
                                </div>
                                <div class="card-body pt-2"> 
                                    <div class="p-2">
                                            <div class="form-group">
                                                <label for="username">ชื่อผู้ใช้งาน</label>
                                                <input type="text" name="username" class="form-control" id="username" placeholder="กรอกชื่อผู้ใช้งาน">
                                            </div>
                                            <div class="form-group">
                                                <label for="userpassword">รหัสผ่าน</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="กรอกรหัสผ่าน">
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn btn-primary btn-block waves-effect waves-light submit-login">เข้าสู่ระบบ</button>
                                                <a href="/register" class="btn btn-success btn-block waves-effect waves-light" type="submit">สมัครสมาชิก</a>
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
	<script type="text/javascript">
		$(".submit-login").click(function(){
			var username = $("#username").val();
			var password = $("#password").val();
			$.ajax({
				url:"/api/v1/login",
				type:"POST",
				data:{
					username:username,
					password:password
				},success:function(data){
					var obj = JSON.parse(data);
					if (obj.status=="success"){
						Swal.fire({
							icon: 'success',
							title: 'เข้าสู่ระบบ',
							text: 'เข้าสู่ระบบสำเร็จแล้ว',
							timer: 2000,
							timerProgressBar: true,
							confirmButtonColor: '#00C851',
						}).then((result) => {
							window.location.href='/member';
						})
					}else{
						Swal.fire({
							icon: 'error',
							title: 'เข้าสู่ระบบ',
							text: obj.info,
							timer: 2000,
							timerProgressBar: true,
							confirmButtonColor: '#00C851',
						})
					}
				}
			});
		});
	</script>