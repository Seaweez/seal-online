$(document).ready(function () {
	Waves.init();

	// $(".btn-activity").click(function () {
	// 	var reward = $("#reward_id").val();
	// 	console.log(reward);
	// 	if (reward !== "") {
	// 		$.ajax({
	// 			url: "/api/v1/getreward",
	// 			type: "POST",
	// 			data: {
	// 				reward: reward,
	// 			},
	// 			success: function (data) {
	// 				console.log(data);
	// 				var obj = JSON.parse(data);
	// 				if (obj.status == "success") {
	// 					Swal.fire({
	// 						icon: 'success',
	// 						title: 'เติมเงิน',
	// 						text: obj.info,
	// 						timer: 2000,
	// 						timerProgressBar: true,
	// 						confirmButtonColor: '#00C851',
	// 					}).then((result) => {
	// 						window.location.href = '/promotion';
	// 					})
	// 				} else {
	// 					Swal.fire({
	// 						icon: 'error',
	// 						title: 'เติมเงิน',
	// 						text: obj.info,
	// 						timer: 2000,
	// 						timerProgressBar: true,
	// 						confirmButtonColor: '#00C851',
	// 					})
	// 				}
	// 			}
	// 		});
	// 	} else {
	// 		Swal.fire({
	// 			icon: 'error',
	// 			title: 'เติมเงินสะสม',
	// 			text: 'กรุณาเลือกโปรโมชั่น',
	// 			timer: 2000,
	// 			timerProgressBar: true,
	// 			confirmButtonColor: '#00C851',
	// 		})
	// 	}
	// });

	// $(".btn-changeitemcash").click(function () {
	// 	var reward = $("#reward_id").val();
	// 	console.log(reward);
	// 	if (reward !== "") {
	// 		$.ajax({
	// 			url: "/api/v1/getreward",
	// 			type: "POST",
	// 			data: {
	// 				reward: reward,
	// 			},
	// 			success: function (data) {
	// 				console.log(data);
	// 				var obj = JSON.parse(data);
	// 				if (obj.status == "success") {
	// 					Swal.fire({
	// 						icon: 'success',
	// 						title: 'เติมเงิน',
	// 						text: obj.info,
	// 						timer: 2000,
	// 						timerProgressBar: true,
	// 						confirmButtonColor: '#00C851',
	// 					}).then((result) => {
	// 						window.location.href = '/promotion';
	// 					})
	// 				} else {
	// 					Swal.fire({
	// 						icon: 'error',
	// 						title: 'เติมเงิน',
	// 						text: obj.info,
	// 						timer: 2000,
	// 						timerProgressBar: true,
	// 						confirmButtonColor: '#00C851',
	// 					})
	// 				}
	// 			}
	// 		});
	// 	} else {
	// 		Swal.fire({
	// 			icon: 'error',
	// 			title: 'เติมเงินสะสม',
	// 			text: 'กรุณาเลือกโปรโมชั่น',
	// 			timer: 2000,
	// 			timerProgressBar: true,
	// 			confirmButtonColor: '#00C851',
	// 		})
	// 	}
	// });

	// $(".submit-topup-card").click(function () {
	// 	var ref = $("#numbercard").val();
	// 	if (ref !== "") {
	// 		$.ajax({
	// 			url: "/api/v1/topuptruemoney",
	// 			type: "POST",
	// 			data: {
	// 				ref: ref,
	// 			},
	// 			success: function (data) {
	// 				var obj = JSON.parse(data);
	// 				if (obj.status == "success") {
	// 					Swal.fire({
	// 						icon: 'success',
	// 						title: 'เติมเงิน',
	// 						text: obj.info,
	// 						timer: 2000,
	// 						timerProgressBar: true,
	// 						confirmButtonColor: '#00C851',
	// 					}).then((result) => {
	// 						window.location.href = '/member';
	// 					})
	// 				} else {
	// 					Swal.fire({
	// 						icon: 'error',
	// 						title: 'เติมเงิน',
	// 						text: obj.info,
	// 						timer: 2000,
	// 						timerProgressBar: true,
	// 						confirmButtonColor: '#00C851',
	// 					})
	// 				}
	// 			}
	// 		});
	// 	} else {
	// 		Swal.fire({
	// 			icon: 'error',
	// 			title: 'เติมเงิน',
	// 			text: 'กรุณากรอกเลขบัตรเติมเงิน',
	// 			timer: 2000,
	// 			timerProgressBar: true,
	// 			confirmButtonColor: '#00C851',
	// 		})
	// 	}
	// });

	// $(".submit-topup").click(function () {
	// 	var ref = $("#ref").val();
	// 	if (ref !== "") {
	// 		$.ajax({
	// 			url: "/api/v1/topuptruewallet",
	// 			type: "POST",
	// 			data: {
	// 				ref: ref,
	// 			},
	// 			success: function (data) {
	// 				var obj = JSON.parse(data);
	// 				if (obj.status == "success") {
	// 					Swal.fire({
	// 						icon: 'success',
	// 						title: 'เติมเงิน',
	// 						text: obj.info,
	// 						timer: 2000,
	// 						timerProgressBar: true,
	// 						confirmButtonColor: '#00C851',
	// 					}).then((result) => {
	// 						window.location.href = '/member';
	// 					})
	// 				} else {
	// 					Swal.fire({
	// 						icon: 'error',
	// 						title: 'เติมเงิน',
	// 						text: obj.info,
	// 						timer: 2000,
	// 						timerProgressBar: true,
	// 						confirmButtonColor: '#00C851',
	// 					})
	// 				}
	// 			}
	// 		});
	// 	} else {
	// 		Swal.fire({
	// 			icon: 'error',
	// 			title: 'เติมเงิน',
	// 			text: 'กรุณากรอกเลขอ้างอิง',
	// 			timer: 2000,
	// 			timerProgressBar: true,
	// 			confirmButtonColor: '#00C851',
	// 		})
	// 	}
	// });

	// $(".btn-sellrc").click(function () {
	// 	var count = $("#sellcount").val();
	// 	$.ajax({
	// 		url: "/api/v1/sellrc",
	// 		type: "POST",
	// 		data: {
	// 			rc: count,
	// 		},
	// 		success: function (data) {
	// 			var obj = JSON.parse(data);
	// 			if (obj.status == "success") {
	// 				Swal.fire({
	// 					icon: 'success',
	// 					title: 'ขายRC',
	// 					text: 'ขายRCสำเร็จแล้ว',
	// 					timer: 2000,
	// 					timerProgressBar: true,
	// 					confirmButtonColor: '#00C851',
	// 				}).then((result) => {
	// 					window.location.href = '/member';
	// 				})
	// 			} else {
	// 				Swal.fire({
	// 					icon: 'error',
	// 					title: 'ขายRC',
	// 					text: obj.info,
	// 					timer: 2000,
	// 					timerProgressBar: true,
	// 					confirmButtonColor: '#00C851',
	// 				})
	// 			}
	// 		}
	// 	});
	// });

	// $(".btn-buyrc").click(function () {
	// 	var count = $("#buycount").val();
	// 	$.ajax({
	// 		url: "/api/v1/buyrc",
	// 		type: "POST",
	// 		data: {
	// 			count: count,
	// 		},
	// 		success: function (data) {
	// 			var obj = JSON.parse(data);
	// 			if (obj.status == "success") {
	// 				Swal.fire({
	// 					icon: 'success',
	// 					title: 'ซื้อrc',
	// 					text: 'ซื้อrcสำเร็จแล้ว',
	// 					timer: 2000,
	// 					timerProgressBar: true,
	// 					confirmButtonColor: '#00C851',
	// 				}).then((result) => {
	// 					window.location.href = '/member';
	// 				})
	// 			} else {
	// 				Swal.fire({
	// 					icon: 'error',
	// 					title: 'ซื้อrc',
	// 					text: obj.info,
	// 					timer: 2000,
	// 					timerProgressBar: true,
	// 					confirmButtonColor: '#00C851',
	// 				})
	// 			}
	// 		}
	// 	});
	// });

	// $(".submit-password").click(function () {
	// 	var passwordold = $("#password-old").val();
	// 	var passwordnew = $("#password-new").val();
	// 	var repasswordnew = $("#password-new-re").val();
	// 	if (passwordnew !== repasswordnew) {
	// 		Swal.fire({
	// 			icon: 'error',
	// 			title: 'เปลื่ยนรหัสผ่าน',
	// 			text: "ยืนยันรหัสผ่านไม่ถูกต้อง!!",
	// 			timer: 2000,
	// 			timerProgressBar: true,
	// 			confirmButtonColor: '#00C851',
	// 		})
	// 	} else {
	// 		$.ajax({
	// 			url: "/api/v1/changepassword",
	// 			type: "POST",
	// 			data: {
	// 				passwordold: passwordold,
	// 				passwordnew: passwordnew
	// 			},
	// 			success: function (data) {
	// 				var obj = JSON.parse(data);
	// 				if (obj.status == "success") {
	// 					Swal.fire({
	// 						icon: 'success',
	// 						title: 'เปลื่ยนรหัสผ่าน',
	// 						text: 'เปลื่ยนรหัสผ่านสำเร็จแล้ว',
	// 						timer: 2000,
	// 						timerProgressBar: true,
	// 						confirmButtonColor: '#00C851',
	// 					}).then((result) => {
	// 						window.location.href = '/member';
	// 					})
	// 				} else {
	// 					Swal.fire({
	// 						icon: 'error',
	// 						title: 'เปลื่ยนรหัสผ่าน',
	// 						text: obj.info,
	// 						timer: 2000,
	// 						timerProgressBar: true,
	// 						confirmButtonColor: '#00C851',
	// 					})
	// 				}
	// 			}
	// 		});
	// 	}
	// });

	// $('#reward_id').change(function () {

	// 	if (this.value == 1) {
	// 		$('.show-promotion').html('<center><img class="mr-1" src="/views/assets/images/promotion/pro2000_1.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro2000_2.png" width="30%" /></center>');
	// 	} else if (this.value == 2) {
	// 		$('.show-promotion').html('<center><img class="mr-1" src="/views/assets/images/promotion/pro3000_1.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro3000_2.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro3000_3.png" width="30%" /></center>');
	// 	} else if (this.value == 3) {
	// 		$('.show-promotion').html('<center><img class="mr-1" src="/views/assets/images/promotion/pro4000_1.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro4000_2.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro4000_3.png" width="30%" /></center>');
	// 	} else if (this.value == 4) {
	// 		$('.show-promotion').html('<center><img class="mr-1" src="/views/assets/images/promotion/pro5000_1.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro5000_2.png" width="30%" /></center>');
	// 	} else if (this.value == 5) {
	// 		$('.show-promotion').html('<center><img class="mr-1" src="/views/assets/images/promotion/pro6000_1.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro6000_2.png" width="30%" /></center>');
	// 	} else if (this.value == 6) {
	// 		$('.show-promotion').html('<center><img class="mr-1" src="/views/assets/images/promotion/pro7000_1.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro7000_2.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro7000_3.png" width="30%" /></center>');
	// 	} else if (this.value == 7) {
	// 		$('.show-promotion').html('<center><img class="mr-1" src="/views/assets/images/promotion/pro8000_1.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro8000_2.png" width="30%" /><img class="mr-1" src="/views/assets/images/promotion/pro8000_3.png" width="30%" /></center>');
	// 	} else if (this.value == 8 || this.value == 9) {
	// 		$('.show-promotion').html("");
	// 	}
	// 	/*$('.show-promotion').attr('src', this.value);
	// 	 alert(this.value);*/
	// });
});