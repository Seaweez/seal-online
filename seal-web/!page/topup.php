<div class="container col-lg-9">
	<div class="card elegant-color-dark" style="border-radius: 10px;">
		<div class="card-body">
			<div class="avatar">
				<img class="sdsdsd" src="https://i.pinimg.com/originals/64/91/ed/6491eda5328899a0e2cc1c59498ff624.png" width="790">
			</div>
			<hr>
			<div class="alert alert-danger" role="alert">
				<center><i class="fas fa-phone"></i> กรุณาโอนมาที่เบอร์ :099xxxxxxx
					<br><i class="fas fa-user"></i> ชื่อ :xxx xxxx
				</center>
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">เลขอ้างอิง</span>
				</div>
				<input type="text" id="porsd" [(ngModel)]="data" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14" class="form-control" placeholder="เลขอ้างอิงที่ท่านโอนมา">
			</div>
			<button class="btn btn-success btn-block waves-effect waves-light" id="sub"><i class="fas fa-money-check"></i> เติมเงิน</button>
		</div>
		<script type="text/javascript">
			$("#sub").click(function() {
				var porsd = $("#porsd").val();
				if (porsd == "") {
					Swal.fire({
						text: 'กรุณากรอกเลขอ้างอิง',
						icon: 'error',
						confirmButtonColor: '#00C851',
						confirmButtonText: 'ตกลง',
						timer: 3500
					})
				} else {
					Swal.fire({
						title: 'Processing',
						text: 'กำลังทำรายการโปรดรอสักครู่...',
						icon: 'info',
						showCancelButton: false,
						showConfirmButton: false,
						allowOutsideClick: false,
						allowEscapeKey: false,
						onOpen: () => {
							$.ajax({
								type: "POST",
								url: "system/api/topup.php",
								data: {
									porsd: porsd,
								},
								success: function(por) {
									if (por == "success") {
										Swal.fire({
											text: 'เติมเงินสำเร็จ',
											icon: 'success',
											confirmButtonColor: '#00C851',
											confirmButtonText: 'ตกลง',
											timer: 2500
										}).then((result) => {
											window.location.href = "./topup";
										});
									} else {
										Swal.fire({
											text: por,
											icon: 'error',
											confirmButtonColor: '#00C851',
											confirmButtonText: 'ตกลง',
											timer: 3500
										})
									}
								}
							});
						}
					})
				}
			});
		</script>
	</div>
</div>