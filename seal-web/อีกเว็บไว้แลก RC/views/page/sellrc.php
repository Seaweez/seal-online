<div class="container mt-4">
	<div class="col-lg-7 mx-auto">
		<div class="card">
			<div class="card-body">
				<h5 class="text-center">ขาย RC</h5>
				<div class="form-group mb-md-4 mt-2">
					<label for="count" class="control-icon control-icon-left">
						<i class="far fa-clock"></i>
					</label>
					<input type="text" name="count" placeholder="จำนวน" class="form-control form-line-control" id="count">
				</div>
				<p>** นำRCที่ต้องการขายมาไว้ที่ช่องแรก!!</p>
				<button class="btn btn-outline-success btn-block submit-login">ตกลง</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".submit-login").click(function(){
		var count = $("#count").val();
		$.ajax({
			url:"/api/v1/sellrc",
			type:"POST",
			data:{
				rc:count,
			},success:function(data){
				var obj = JSON.parse(data);
				if (obj.status=="success"){
					Swal.fire({
						icon: 'success',
						title: 'ขายRC',
						text: 'ขายRCสำเร็จแล้ว',
						timer: 2000,
						timerProgressBar: true,
						confirmButtonColor: '#00C851',
					}).then((result) => {
						window.location.href='/member';
					})
				}else{
					Swal.fire({
						icon: 'error',
						title: 'ขายRC',
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