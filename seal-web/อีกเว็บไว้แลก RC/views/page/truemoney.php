<div class="container mt-4">
	<div class="card col-md-7 mx-auto">
		<div class="card-body">
			<h5 class="card-title text-center"><strong>เติมเงินด้วยบัตรเงินสด Truemoney !</strong></h5>
			<p style="color: red;">#กรุณาใส่รหัสบัตร14หลัก</p>
			<div class="form-group mb-md-4 mt-2">
				<label for="numbercard" class="control-icon control-icon-left">
					<i class="far fa-envelope-square"></i>
				</label>
				<input type="text" name="number" placeholder="numbercard ( เลขบัตร )" class="form-control form-line-control" id="numbercard" maxlength="14">
			</div>
			<p >เติมได้เฉพาะ 50 90 150 300 500 1000</p>
			<button class="btn btn-block btn-outline-success submit-topup">ตกลง</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".submit-topup").click(function(){
		var ref = $("#numbercard").val();
		if (ref!==""){
			$.ajax({
				url:"/api/v1/topuptruemoney",
				type:"POST",
				data:{
					ref:ref,
				},success:function(data){
					var obj = JSON.parse(data);
					if (obj.status=="success"){
						Swal.fire({
							icon: 'success',
							title: 'เติมเงิน',
							text: obj.info,
							timer: 2000,
							timerProgressBar: true,
							confirmButtonColor: '#00C851',
						}).then((result) => {
							window.location.href='/member';
						})
					}else{
						Swal.fire({
							icon: 'error',
							title: 'เติมเงิน',
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
				title: 'เติมเงิน',
				text: 'กรุณากรอกเลขบัตรเติมเงิน',
				timer: 2000,
				timerProgressBar: true,
				confirmButtonColor: '#00C851',
			})
		}
	});
</script>