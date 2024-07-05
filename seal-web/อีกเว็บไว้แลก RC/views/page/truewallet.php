<div class="container mt-4">
	<div class="card col-md-7 mx-auto">
		<div class="card-body">
			<h5 class="card-title text-center"><strong>เติมเงินด้วย Truewallet !</strong></h5>
			<p>โอนเงินมาเบอร์ 093-1451803 : พิทวัส ปนคำ</p>
			<div class="form-group mb-md-4 mt-2">
				<label for="ref" class="control-icon control-icon-left">
					<i class="far fa-envelope-square"></i>
				</label>
				<input type="text" name="ref" placeholder="ref ( เลขอ้างอิง )" class="form-control form-line-control" id="ref">
			</div>
			<button class="btn btn-block btn-outline-success submit-topup">ตกลง</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".submit-topup").click(function(){
		var ref = $("#ref").val();
		if (ref!==""){
			$.ajax({
				url:"/api/v1/topuptruewallet",
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
				text: 'กรุณากรอกเลขอ้างอิง',
				timer: 2000,
				timerProgressBar: true,
				confirmButtonColor: '#00C851',
			})
		}
	});
</script>