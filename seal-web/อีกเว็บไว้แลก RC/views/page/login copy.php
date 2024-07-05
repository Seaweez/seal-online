<div class="container mt-4">
	<div class="col-lg-7 mx-auto">
		<div class="card">
			<div class="card-body">
				<h5 class="text-center">เข้าสู่ระบบ</h5>
				<div class="form-group mb-md-4 mt-2">
					<label for="username" class="control-icon control-icon-left">
						<i class="far fa-user"></i>
					</label>
					<input type="text" name="username" placeholder="username ( ชื่อผู้ใช้งาน )" class="form-control form-line-control" id="username">
				</div>
				<div class="form-group mb-md-4 mt-2">
					<label for="password" class="control-icon control-icon-left">
						<i class="far fa-key"></i>
					</label>
					<input type="password" name="password" placeholder="password ( รหัสผ่าน )" class="form-control form-line-control" id="password">
				</div>
				<button class="btn btn-success btn-block submit-login">ตกลง</button>
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