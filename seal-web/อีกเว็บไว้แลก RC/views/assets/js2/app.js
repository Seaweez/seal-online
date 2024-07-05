$(document).ready(function() {
    Waves.init();

    $(".logout-click").click(function() {
        $.ajax({
            url: "/api/v1/logout",
            type: "POST",
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'ออกจากระบบ',
                    text: 'ออกจากระบบสำเร็จ',
                    timer: 2000,
                    timerProgressBar: true,
                    confirmButtonColor: '#00C851',
                }).then((result) => {
                    window.location.href = '/home';
                })
            }
        })
	});
	
	$(".btn-kick").click(function() {
		var id = $("#charid").val();
		if (id!=="") {
			$.ajax({
				url: "/api/v1/kickplayer",
				type: "POST",
				data: {
					id:id,
				},
				success: function(data) {
					Swal.fire({
						icon: 'success',
						title: 'ระบบเตะผู้เล่น',
						text: 'เตะผู้เล่นออกจากเกมส์แล้ว',
						timer: 2000,
						timerProgressBar: true,
						confirmButtonColor: '#00C851',
					}).then((result) => {
						window.location.href = '/member';
					})
				}
			})
		} else {
			Swal.fire({
				icon: 'error',
				title: 'ระบบเตะผู้เล่น',
				text: 'กรุณาเลือกตัวละคร',
				timer: 2000,
				timerProgressBar: true,
				confirmButtonColor: '#00C851',
			})
		}
	});
	
	$(".btn-promotion").click(function(){
		var reward = $("#reward_id").val();
		if (reward!==""){
			$.ajax({
				url:"/api/v1/getreward",
				type:"POST",
				data:{
					reward:reward,
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
							window.location.href='/promotion';
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
				title: 'เติมเงินสะสม',
				text: 'กรุณาเลือกโปรโมชั่น',
				timer: 2000,
				timerProgressBar: true,
				confirmButtonColor: '#00C851',
			})
		}
    });
    
    $(".btn-sellrc").click(function(){
		var count = $("#sellcount").val();
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
    
    $(".btn-buyrc").click(function(){
		var count = $("#buycount").val();
		$.ajax({
			url:"/api/v1/buyrc",
			type:"POST",
			data:{
				count:count,
			},success:function(data){
				var obj = JSON.parse(data);
				if (obj.status=="success"){
					Swal.fire({
						icon: 'success',
						title: 'ซื้อrc',
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
						title: 'ซื้อrc',
						text: obj.info,
						timer: 2000,
						timerProgressBar: true,
						confirmButtonColor: '#00C851',
					})
				}
			}
		});
    });
    
	$(".submit-password").click(function(){
		var passwordold = $("#password-old").val();
		var passwordnew = $("#password-new").val();
		var repasswordnew = $("#password-new-re").val();
		if (passwordnew !== repasswordnew){
			Swal.fire({
				icon: 'error',
				title: 'เปลื่ยนรหัสผ่าน',
				text: "ยืนยันรหัสผ่านไม่ถูกต้อง!!",
				timer: 2000,
				timerProgressBar: true,
				confirmButtonColor: '#00C851',
			})
		}else{
			$.ajax({
				url:"/api/v1/changepassword",
				type:"POST",
				data:{
					passwordold:passwordold,
					passwordnew:passwordnew
				},success:function(data){
					var obj = JSON.parse(data);
					if (obj.status=="success"){
						Swal.fire({
							icon: 'success',
							title: 'เปลื่ยนรหัสผ่าน',
							text: 'เปลื่ยนรหัสผ่านสำเร็จแล้ว',
							timer: 2000,
							timerProgressBar: true,
							confirmButtonColor: '#00C851',
						}).then((result) => {
							window.location.href='/member';
						})
					}else{
						Swal.fire({
							icon: 'error',
							title: 'เปลื่ยนรหัสผ่าน',
							text: obj.info,
							timer: 2000,
							timerProgressBar: true,
							confirmButtonColor: '#00C851',
						})
					}
				}
			});
		}
	});

	$('#reward_id').change(function() {
		var e = $('.promotion-detail');
		if(this.value === '') {
			e.html('คุณยังไม่ได้เลือกโปรโมชั่น');
			$('.show-promotion img').attr('src','/views/assets/images/promotion/reward.jpg');
			return false;
		}
		$.post("/api/v1/getreward", {reward_lv: this.value}, function(data) {
			e.html('');
			$('.show-promotion img').attr('src',data.bonus_img);
			var items = data.bonus_item;
			$.each( items, function( k, v ) {
				if(v.count !== 0)
					e.append('<div style="padding: 2px 0px;">x '+v.count+' '+v.name+'</div>');
			});
		}, "json");
	});

	$(".submit-topup").click(function() {
		var btn = $(this);
		var data = {};
		btn.attr('disabled','disabled').html('<i class="fas fa-spinner fa-spin"></i> รอสักครู่...กำลังตรวจสอบข้อมูล');
		if(this.value === 'wallet') {
			var ref = $("#ref").val();
    		var amount = $("#amount").val();
			data = {ref: ref+amount, type: 'wallet'};
		} else if(this.value === 'truecard') {
			var ref = $("#numbercard").val();
			data = {ref: '@'+ref, type: 'card'};
		} else if(this.value === 'bank') {
			var a = $("#bamount").val();
			var s = $("#bstang").val();
			var d = $("#day").val();
			var h = $("#hour").val();
			var m = $("#minute").val();
			data = {ref: d+h+m+a+s, type: 'bank'};
		} else {
			Swal.fire({
				icon: 'error',
				title: 'ข้อผิดพลาด',
				text: 'ไม่สามารถระบุชนิดการเติมเงินได้',
				timer: 2000,
				timerProgressBar: true,
				confirmButtonColor: '#00C851',
			})
		}

		$.post("/api/v1/topup", data, function(data) {
			if (data.status === 'success') {
				console.log(data.info);
				Swal.fire({
					icon: 'success',
					title: 'เติมเงิน',
					text: data.info,
					timer: 2000,
					timerProgressBar: true,
					confirmButtonColor: '#00C851',
				}).then((result) => {
					window.location.href='/member';
				})
			} else {
				Swal.fire({
					icon: 'error',
					title: 'เติมเงิน',
					text: data.info,
					timer: 2000,
					timerProgressBar: true,
					confirmButtonColor: '#00C851',
				})
				btn.removeAttr('disabled').html('<i class="fas fa-check"></i> ยืนยันทำรายการ');
			}
		}, "json");
	});
});