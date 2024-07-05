<div id="layout-wrapper">
        <div class="main-content mb-4">
            <div class="page-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card overflow-hidden">
                                <div class="card-header">
                                    <h3 class="text-center mt-1 mb-1"><i class="fas fa-sign-in-alt"></i>&nbsp;สมัครสมาชิก</h3>
                                </div>
                                <div class="card-body pt-2"> 
                                    
                                    <div class="p-2">
                                            <div class="form-group">
                                                <label for="username">ชื่อผู้ใช้งาน</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="กรอกชื่อผู้ใช้งาน">
                                            </div>

                                            <div class="form-group">
                                                <label for="username">อีเมล</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="กรอกอีเมล">
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="password">รหัสผ่าน</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่าน">
                                            </div>

                                            <div class="form-group">
                                                <label for="repassword">รหัสผ่านอีกครั้ง</label>
                                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="กรอกรหัสผ่าน">
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-success btn-block waves-effect waves-light submit-login">สมัครสมาชิก</button>
                                                <a href="/login" class="btn btn-danger btn-block waves-effect waves-light">ย้อนกลับ</a>

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
		var email = $("#email").val();
		var password = $("#password").val();
		var repassword = $("#repassword").val();
		if (password == repassword){
			$.ajax({
				url:"/api/v1/register",
				type:"POST",
				data:{
					username:username,
					email:email,
					password:password
				},success:function(data){
					var obj = JSON.parse(data);
					if (obj.status=="success"){
						Swal.fire({
							icon: 'success',
							title: 'สมัครสมาชิก',
							text: 'สมัครสมาชิกสำเร็จแล้ว',
							timer: 2000,
							timerProgressBar: true,
							confirmButtonColor: '#00C851',
						}).then((result) => {
							window.location.href='/member';
						})
					}else{
						Swal.fire({
							icon: 'error',
							title: 'สมัครสมาชิก',
							text: obj.info,
							timer: 2000,
							timerProgressBar: true,
							confirmButtonColor: '#00C851',
						})
					}
				}
			});
		}else{
			Swal.fire({
				icon: 'error',
				title: 'สมัครสมาชิก',
				text: 'ยืนยันรหัสผ่านไม่ถูกต้อง',
				timer: 2000,
				timerProgressBar: true,
				confirmButtonColor: '#00C851',
			})
		}
	});
</script>