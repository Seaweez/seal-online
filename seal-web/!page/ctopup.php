		<div class="container col-lg-9">
			<div class="card elegant-color-dark" style="border-radius: 10px;">
				<div class="card-body">
					<div class="avatar">
						<img class="sdsdsd" src="https://www.telecomlover.com/wp-content/uploads/2017/08/logo-TMN.png" width="790">
					</div>
					<hr>
					<div class="alert alert-danger" role="alert">
						<center>กรุณากรอกเลขบัตรเติมเงินทรูมันนี่ 14 หลัก</center>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">เลขบัตรเติมเงินทรูมันนี่</span>
							</div>
							<input type="text" id="porsd" [(ngModel)]="data" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14" class="form-control" placeholder="เลขบัตรเติมเงินทรูมันนี่">
						</div>
						<button class="btn btn-success btn-block waves-effect waves-light" id="sub"><i class="fas fa-money-check"></i> เติมเงิน</button>
					</div>
					<script type="text/javascript">
						$("#sub").click(function() {
							var porsd = $("#porsd").val();
							if (porsd == "") {
								Swal.fire({
									text: 'กรุณากรอกเลขบัตร',
									icon: 'error',
									confirmButtonColor: '#00C851',
									confirmButtonText: 'ตกลง',
									timer: 3500
								})
							}else{
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
											type:"POST",
											url:"system/api/ctopup.php",
											data:{
												porsd:porsd,
											},success:function(por){
												if (por=="success") {
													Swal.fire({
														text: 'เติมเงินสำเร็จ',
														icon: 'success',
														confirmButtonColor: '#00C851',
														confirmButtonText: 'ตกลง',
														timer: 2500
													}).then((result)=>{
														window.location.href="./ctopup";
													});
												}else{
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