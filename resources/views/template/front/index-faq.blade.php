<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{url('/assets/logo.png')}}">
	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>RT 15</title>

	<!--CSS============================================= -->
	<link rel="stylesheet" href="front_layout/css/linearicons.css">
	<link rel="stylesheet" href="front_layout/css/font-awesome.min.css">
	<link rel="stylesheet" href="front_layout/css/bootstrap.css">
	<link rel="stylesheet" href="front_layout/css/owl.carousel.css">
	<link rel="stylesheet" href="front_layout/css/magnific-popup.css">
	<link rel="stylesheet" href="front_layout/css/nice-select.css">
	<link rel="stylesheet" href="front_layout/css/main.css">
	<style>
        @media (max-width: 991px){
            .features-area {
                padding-bottom: 56px;
            }
            .section-gap-top {
                padding-top: 130px;
            }
        }
	</style>
</head>

<body>

	<!-- Start Header Area -->
	<header class="default-header" style="background-color:#263a4e; position: fixed; top: 0px;">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand" href="{{url('/')}}">
					<img src="img/logos.png" alt="RTKU15">
				</a>
				<div class="row">
					<div class="col-sm-12">
						<div class="pull-right">
							<a href="{{url('/')}}" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<!-- End Header Area -->

	<!-- Start FAQ Area -->
	<section class="features-area section-gap-top"">
		<div class="container">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <div class="accordion" id="faqExample">
                            <?php $faq = DB::table('FAQ')->get(); ?>
                            @foreach($faq as $q)
                            <div class="card">
                                <div class="card-header p-2" id="heading_{{$q->id}}" aria-expanded="false" aria-controls="collapse_{{$q->id}}">
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#collapse_{{$q->id}}" style="padding:10px;">
                                        {{-- <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_{{$q->id}}" aria-expanded="false" aria-controls="collapse_{{$q->id}}"> --}}
                                            <b><i class="fa fa-question-circle"></i></b>
                                            {{$q->question}}
                                        {{-- </button> --}}
                                    </h4>
                                </div>
                                <div id="collapse_{{$q->id}}" class="collapse" aria-labelledby="heading_{{$q->id}}" data-parent="#faqExample">
                                    <div class="card-body">
                                        <b><i class="fa fa-reply"></i></b>
                                        {{$q->answer}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--/row-->
            <!--container-->
        </div>
	</section>
	<!-- End FAQ Area -->

	<!-- start footer Area -->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-6 single-footer-widget">
					<center>
					<div class="col-lg-12 col-md-6 single-footer-widget">
						<img src="img/logo_footer.png" class="img-fluid">
						<ul>
							<li></li>
							<li>Jalan Raya Centex Gg. Epatik RT.15/RW.10<br>Ciracas, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13740<br>Support : <i class="fa fa-envelope"></i> aboutteddybear@gmail.com</li>
						</ul>
					</div>
					</center>
				</div>
			</div>
			<div class="row footer-bottom d-flex justify-content-between">
				<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
					Copyright &copy; <script>document.write(new Date().getFullYear());</script>
					<a href="https://www.instagram.com/brayenprayoga/" target="_blank">RTKU15</a>
				</p>
				<div class="col-lg-4 col-sm-12 footer-social">
					<a href="https://www.instagram.com/brayenprayoga/" target="_blank"><i class="fa fa-instagram"></i></a>
					<a href="https://api.whatsapp.com/send?phone=+6289630022265" target="_blank"><i class="fa fa-whatsapp"></i></a>
					<a href="https://id.linkedin.com/in/brayen-prayoga-6a6269170" target="_blank"><i class="fa fa-linkedin"></i></a>
					<a href="https://goo.gl/maps/hCaAPWttQtZyXn8XA" target="_blank"><i class="fa fa-map-marker"></i></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->
	

	{{-- Script --}}
		<script src="front_layout/js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
		integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
		crossorigin="anonymous"></script>
		<script src="front_layout/js/vendor/bootstrap.min.js"></script>
		<script src="front_layout/js/jquery.ajaxchimp.min.js"></script>
		<script src="front_layout/js/parallax.min.js"></script>
		<script src="front_layout/js/owl.carousel.min.js"></script>
		<script src="front_layout/js/isotope.pkgd.min.js"></script>
		<script src="front_layout/js/jquery.nice-select.min.js"></script>
		<script src="front_layout/js/jquery.magnific-popup.min.js"></script>
		<script src="front_layout/js/jquery.sticky.js"></script>
		<script src="front_layout/js/main.js"></script>
	{{-- Script --}}

    <script>
    </script>
</body>

</html>