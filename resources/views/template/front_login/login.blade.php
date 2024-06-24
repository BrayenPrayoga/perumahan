<!DOCTYPE html>
<html lang="en">
<head>
	<title>RT 15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/img/icon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fronts_login/js/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fronts_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fronts_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fronts_login/js/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="fronts_login/js/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fronts_login/js/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fronts_login/js/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="fronts_login/js/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fronts_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="fronts_login/css/main.css">
<!--===============================================================================================-->
	<style>
		.limiter{
			background-image:url('assets/bglogin.png');
			background-size: cover;
		}
		#cover-spin {
			position:fixed;
			width:100%;
			left:0;right:0;top:0;bottom:0;
			background-color: rgba(255, 255, 255, 0.7);
			z-index:9999;
			display:none;
		}

		@-webkit-keyframes spin {
			from {-webkit-transform:rotate(0deg);}
			to {-webkit-transform:rotate(360deg);}
		}

		@keyframes spin {
			from {transform:rotate(0deg);}
			to {transform:rotate(360deg);}
		}

		#cover-spin::after {
			content:'';
			display:block;
			position:absolute;
			left:48%;top:40%;
			width:40px;height:40px;
			border-style:solid;
			border-color:black;
			border-top-color:transparent;
			border-width: 4px;
			border-radius:50%;
			-webkit-animation: spin .8s linear infinite;
			animation: spin .8s linear infinite;
		}
	</style>
</head>
<body>
	<div id="cover-spin"></div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
                @csrf
					<span class="login100-form-title p-b-51">
						Login{{--  <br> Aplikasi Management RT 15/10 --}}
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100" type="email" name="email" id="email" placeholder="Masukan Email" autocomplete="off">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required" id="password">
						<input class="input100" type="password" name="password" placeholder="Password" autocomplete="off">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn m-t-17">
						{{-- <button type="button" id="btnAktivasi" class="login100-form-btn" onclick="sendEmailAktivasi()">AKTIVASI</button> --}}
						<button class="login100-form-btn" id="btnLogin">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="fronts_login/js/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="fronts_login/js/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="fronts_login/js/bootstrap/js/popper.js"></script>
	<script src="fronts_login/js/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="fronts_login/js/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="fronts_login/js/daterangepicker/moment.min.js"></script>
	<script src="fronts_login/js/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="fronts_login/js/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="fronts_login/js/main.js"></script>
<!--===============================================================================================-->
	<script src="{{url('assets/js/plugins/sweetalert2.js')}}"></script>

</body>
<script>
		function sendEmailAktivasi()
		{
			var mail = $('#email').val();
			
			if(mail != ''){
				$.ajax({
					type: "GET",
					url: "{{URL::to('/login/cek-email/')}}",
					data: {mail:mail},
					cache: false,
					beforeSend: function(){
						$('#cover-spin').show(0);
					},
					success: function(data){
						$('#cover-spin').hide(0)
						if(data != 'tidak'){
							$('#inputAktivasi').show();
							$('#btnAktivasi').hide();
							$('#btnLogin').show();
							Swal.fire({
								type: 'success',
								text: data,
								showConfirmButton: true
							});
						}else{
							Swal.fire({
								type: 'error',
								text: 'Email Tidak Terdaftar',
								showConfirmButton: true
							});
						}
					}
				});
			}else{
				Swal.fire({
					type: 'error',
					text: 'Email Belum Ada',
					showConfirmButton: true
				});
			}
		}
</script>
@if ($errors->any())
	@foreach ($errors->all() as $error)
	<script type="text/javascript">
		Swal.fire({
			type: 'error',
			text: '{{$error}}',
			showConfirmButton: true
		});
	</script>
	@endforeach
@endif
</html>