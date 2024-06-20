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
	
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:400,500" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
 
	<!--CSS============================================= -->
	<link rel="stylesheet" href="front_layout/css/linearicons.css">
	<link rel="stylesheet" href="front_layout/css/font-awesome.min.css">
	<link rel="stylesheet" href="front_layout/css/bootstrap.css">
	<link rel="stylesheet" href="front_layout/css/owl.carousel.css">
	<link rel="stylesheet" href="front_layout/css/magnific-popup.css">
	<link rel="stylesheet" href="front_layout/css/nice-select.css">
	<link rel="stylesheet" href="front_layout/css/main.css">
	<style>
		.accordion .card-header::after{
			font-family: 'FontAwesome';
			content: "\f068";
			float: right;
		}
		
		.accordion .card-header.collapsed::after{
			content: "\f067";
		}
		.highcharts-credits{
			display:none;
		}
		.highcharts-label H4{
			font-size: 17px;
		}
	</style>
</head>

<body>
	<!-- Start Header Area -->
	<header class="default-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand" href="{{url('/')}}">
					<img src="img/logos.png" alt="RTKU15">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<li><a class="active" href="#home">Home</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								Profil
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#about">Ketua RT</a>
								<a class="dropdown-item" href="#struktur">Struktur Organisasi</a>
							</div>
						</li>
						<li><a href="#fitur">Layanan</a></li>
						<li><a href="#project">Informasi</a></li>
						<li><a href="#testimonial">Testimonials</a></li>
						<li><a href="{{route('index.faq')}}">FAQ</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="home-banner-area relative" id="home" data-parallax="scroll" data-image-src="img/header-bg.jpg">
		<div class="overlay-bg overlay"></div>
		<h1 class="template-name"></h1>
		<div class="container">
			<div class="row fullscreen">
				<div class="banner-content col-lg-12">
					<p>SELAMAT DATANG DI</p>
					<h1>
						APLIKASI <br>
						RUKUN TETANGGA 15/10
					</h1>
					<a href="{{route('login')}}" class="primary-btn">Masuk</a>
				</div>
			</div>
		</div>
		<div class="head-bottom-meta" style="display:none;">
			<div class="d-flex meta-left no-padding">
				<a href="#"><span class="fa fa-facebook-f"></span></a>
				<a href="#"><span class="fa fa-twitter"></span></a>
				<a href="#"><span class="fa fa-instagram"></span></a>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start features Area -->
	<section class="features-area section-gap-top" id="fitur">
		<div class="container">
			<div class="row feature_inner">
				<div class="col-lg-12 col-md-6"><h1 style="text-align:center;padding-bottom:50px;">Fitur Dalam RTKU 15</h1></div>
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="fa fa-file-text-o"></i>
						<h4>Surat Menyurat</h4>
						<p>
							Warga dapat langsung mengajukan surat menyurat. Hanya diperlukan pengisian untuk keperluan surat.
							Dokumen otomatis akan dikirim ke Pak RT dan warga bisa mengunduh langsung.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="fa fa-calendar"></i>
						<h4>Jadwal Ronda</h4>
						<p>
							Warga dapat melihat jadwal ronda dan Pak RT akan mengirimkan jadwal ronda secara resmi melalui email yang terdaftar
							pada akun. Email akan dikirimkan H1 sebelum jadwal ronda yang ditentukan
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="fa fa-newspaper-o"></i>
						<h4>Berita Internal</h4>
						<p>
							Warga dapat melihat update berita terkait lingkungan RT 15 yang akan dishare oleh Pak RT kepada warga nya melalui website ini.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End features Area -->

	<!-- Start About Area -->
	<section class="about-area section-gap" id="about">
		<div class="container">
			<?php $ketua = DB::table('biografi_ketua')->first(); ?>
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-7 col-md-12 about-left">
					<img class="img-fluid" src="{{!empty($ketua->image)? url('/img/'.$ketua->image) : ""}}" alt="">
				</div>
				<div class="col-lg-5 col-md-12 about-right">
					<div class="section-title text-left">
						<h4>About</h4>
						<h2>{{!empty($ketua->nama)?$ketua->nama : ""}}</h2>
					</div>
					<div>
						<p>
							{{!empty($ketua->deskripsi)?$ketua->deskripsi : ""}}
						</p>
					</div>
					<button type="button" data-item="{{json_encode($ketua)}}" onclick="readMoreKetua(this)" class="primary-btn">Read More</button>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Area -->

	<!-- Start struktur Area -->
	<section class="features-area section-gap-top" id="struktur">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="struktur-organisasi"></div>
				</div>
				<div class="col-md-12"><br><br></div>
				<div class="col-md-12">
				  <div id="accordion" class="accordion">
					<div class="card">
						<div class="card-header collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							SEJARAH
						</div>
						<div class="card-block collapse" id="collapseOne">
							<div class="card-body" style="text-align: center;">
								Pada tahun 1990-an penduduk di luar ibukota berangsur-angsur mendatangi ibukota DKI Jakarta dalam rangka mencari pekerjaan ataupun melanjutkan pendidikan ke jenjang universitas. Masyarakat pendatang sedikit demi sedikit mulai memadati ibukota dan salah satunya adalah Kampung Ciracas. Pada saat itu para imigran datang ke Jakarta dan belum adanya rumah yang disewakan oleh para pribumi Kampung Ciracas. Sehingga para pendatang yang ingin tinggal di wilayah Ciracas mau tidak mau harus membeli tanah dan membangun rumahnya sendiri.
								<br><br>
								Selanjutnya melihat kondisi para pendatang yang semakin banyak, akhirnya para pribumi yang memiliki tanah mengubah mata pencahariannya, yang awalnya seorang petani, menjadi pebisnis kontrakan. Hal ini dikarenakan penghasilan dari kontrakan ini sangat menjanjikan. Maka akhirnya terjadilah kepadatan rumah dan penduduk sehingga RT 001 / RW 010 ini harus mengalami sebuah pemekaran.
								<br><br>
								Pada Tahun 2002 direncanakan sebuah program pemekaran RT di wilayah RW 010. Kondisi saat itu wilayah Ciracas mulai dipadati masyarakat pendatang. Hal ini menjadi latar belakang dibentuknya kepengurusan RT baru dikarenakan mulai memadatnya warga pada RT 001. Maka pada saat itu, ketua RT 001 / RW 010 melakukan pemekaran terhadap RT nya menjadi RT baru yaitu RT 015 / 010.
							</div>
						</div>
					</div>
					<div class="card">
					  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							VISI DAN MISI
					  </div>
					  <div class="card-block collapse" id="collapseTwo">
						<div class="card-body" style="text-align: center;">
							<h3><b>VISI</b></h3>
							<br>
							<p>Membentuk kerukunan warga dan memelihara lingkungan yang aman, nyaman, tentram, bersih, sehat, cerdas, dan kreatif serta membangun kerjasama lingkungan yang harmonis dengan pelaksanaanya yang bertanggung jawab</p>
							<h3><b>MISI</b></h3>
							<br>
							<ol>
								<li>1. Melayani dan memberikan pelayanan administrasi yang jujur dan transparan</li>
								<li>2. Menjaga kerukunan warga dengan kegiatan yang positif dan membangun</li>
								<li>3. Memberikan wadah fasilitas dalam berbagai kegiatan sosial.</li>
								<li>4. Menjalin kerjasama yang bermanfaat dengan berbagai lembaga internal maupun eksternal.</li>
								<li>5. Bersama-sama menjaga keamanan, ketertiban dan kebersihan lingkungan</li>
							</ol> 
						</div>
					  </div>
					</div>
					<div class="card">
						<?php $tugas = DB::table('master_tugas')->get(); ?>
					  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							TUGAS DAN FUNGSI
					  </div>
					  <div class="card-block collapse" id="collapseThree">
						<div class="card-body" style="text-align: center;">
							@foreach($tugas as $val)
								<h3><b>{{ $val->jabatan }}</b></h3>
								<br>
								<p>{{ $val->tugas }}</p>
							@endforeach
						</div>
					  </div>
					</div>
				  </div>
				   
				  </div>
				</div>
			  </div>
		</div>
	</section>
	<!-- End struktur Area -->
	
	<!-- Start berita Area -->
	<section class="project-area section-gap-top" id="project">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h4>Recent News</h4>
						<h2>View News</h2>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="filters mb-5">
						<ul>
							<li class="active" data-filter=".all">All</li>
							<li data-filter=".popular">Popular</li>
							<li data-filter=".latest">Latest</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="filters-content">
				<div class="row grid">
					<div class="col-lg-4 col-md-6 grid-sizer"></div>
					<?php $berita = DB::table('master_berita')->where('status', 1)->get() ?>

					@foreach($berita as $b)
					<div class="col-lg-4 col-md-6 grid-item all {{!empty($b->status_news)?$b->status_news : ""}}" data-wow-delay="0s">
						<div class="single-project">
							<div class="relative">
								<div class="thumb">
									<img class="image img-fluid" src="{{!empty($b->gambar)?url('/uploads/master_berita/'.$b->gambar) : ""}}" alt="">
								</div>
								<div class="middle">
									<span>{{!empty($b->tanggal) ? tgl_indo($b->tanggal) : ''}}</span>
									<h4>{{!empty($b->judul)?$b->judul : ""}}</h4>
									<div class="cat">{{!empty($b->deskripsi)?$b->deskripsi : ""}}</div>
								</div>
								<a class="overlay" data-item="{{json_encode($b)}}" onclick="viewBerita(this);" style="cursor:pointer;"></a>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</section>
	<!-- End berita Area -->

	<!-- Start video Area -->
	<section class="callto-area section-gap relative" id="video">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row">
				<?php $video = DB::table('master_video')->first(); ?>
				<div class="call-wrap mx-auto">
					<h1>View Last Video</h1>
					<a id="play-home-video" class="video-play-button" href="{{!empty($video->link)?$video->link : ""}}">
						<span></span>
					</a>
					<p>{{!empty($video->durasi)?$video->durasi : ""}}</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End video Area -->

	<!-- Start testimonial Area -->
	<section class="testimonial-area relative section-gap" id="testimonial">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-12">
					<div class="section-title text-center">
						<h4>Testimonials</h4>
						<h2>Apa Kata Warga?</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="active-testimonial">
					<?php $testi = DB::table('master_testimoni')->where('status', 1)->get(); ?>
					
					@if(count($testi) > 0)
						@foreach($testi as $t)
						<?php $users = DB::table('users')->where('id', $t->id_users)->first(); ?>
						<div class="single-testimonial item d-flex flex-row">
							<div class="thumb">
								@if($users->jenis_kelamin == 1)
									<img class="" src="img/testimonial/pria.png" alt="">
								@else
									<img class="" src="img/testimonial/wanita.png" alt="">
								@endif
							</div>
							<div class="desc">
								<p>
									{{$t->pesan}}
								</p>
								<h4>{{$users->name}}</h4>
								<div class="bottom">
									<p></p>
								</div>
							</div>
						</div>
						@endforeach
					@endif

				</div>
			</div>
		</div>
	</section>
	<!-- End testimonial Area -->

	<!-- Start brands Area -->
	<section class="brands-area">
		<div class="container no-padding">
			<div class="brand-wrap section-gap">
				<div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
					<div class="col single-brand">
						<a href="#"><img class="mx-auto" src="img/brands/b1.png" alt=""></a>
					</div>
					<div class="col single-brand">
						<a href="#"><img class="mx-auto" src="img/brands/b2.png" alt=""></a>
					</div>
					<div class="col single-brand">
						<a href="#"><img class="mx-auto" src="img/brands/b3.png" alt=""></a>
					</div>
					<div class="col single-brand">
						<a href="#"><img class="mx-auto" src="img/brands/b4.png" alt=""></a>
					</div>
					<div class="col single-brand">
						<a href="#"><img class="mx-auto" src="img/brands/b5.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End brands Area -->

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
	
	<!-- start modal ketua -->
	<div class="modal fade bd-example-modal-lg" id="modal-ketua-rt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg"" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Biografi Ketua RT 15</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
							<div class="col-md-3"><span> </span></div>
							<div class="col-md-6">
								<img class="img-fluid" src="{{!empty($ketua->image)? url('/img/'.$ketua->image) : ""}}" alt="">
							</div>
							<div class="col-md-3"><span> </span></div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<p>
								<span id="biografi"></span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
	</div>
	<!-- End modal ketua -->

	<!-- start modal berita -->
	<div class="modal fade bd-example-modal-lg" id="modal-berita" tabindex="-1" role="dialog" aria-labelledby="headerBerita" aria-hidden="true">
		<div class="modal-dialog modal-lg"" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="headerBerita"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
							<div class="col-md-3"><span> </span></div>
							<div class="col-md-6">
								<img class="img-fluid" id="gambarBerita" src="" alt="">
							</div>
							<div class="col-md-3"><span> </span></div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<p>
								<span id="deskripsiBerita"></span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
	</div>
	<!-- End modal ketua -->

	{{-- Script --}}
		{{-- Highchart --}}
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/sankey.js"></script>
		<script src="https://code.highcharts.com/modules/organization.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/accessibility.js"></script>


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
		<script src="fusioncharts/js/fusioncharts.js"></script>
		<script src="fusioncharts/js/themes/fusioncharts.theme.fusion.js"></script>
		<script src="fusioncharts/fusioncharts-jquery-plugin/develop/dist/fusioncharts.jqueryplugin.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
	{{-- Script --}}

	<script>
		$(document).ready(function(){
			$('#table-covid').DataTable();
			organisasiChart();
			defaultMaps();
			$('#jenis_kasus').change(function(){
				defaultMaps();
			});
		});

		function defaultMaps()
		{
			$.get("{{URL::to('/home-maps')}}", function(res){
				var data = JSON.parse(res);
				mapsCovid(data);
			});
		}

		function mapsCovid(data)
		{
			const dataSource = {
				chart: {
					caption: " ",
					subcaption: " ",
					numbersuffix: "%",
					includevalueinlabels: "1",
					labelsepchar: ": ",
					entityfillhovercolor: "#FFF9C4",
					theme: "fusion",
					bgColor: "#f7f7f7"
				},
				colorrange: {
					minvalue: "0",
					code: "#ffb2b2",
					gradient: "1",
					color: [
					{
						minvalue: "0",
						maxvalue: data.maxvalue,
						color: "#ff0000"
					}
					]
				},
				data: data.series
			};

			FusionCharts.ready(function() {
				var myChart = new FusionCharts({
					type: "maps/indonesia",
					renderAt: "chart-container",
					width: "100%",
					height: "100%",
					dataFormat: "json",
					dataSource
				}).render();
			});
		}

		function organisasiChart(){
			$.get("{{URL::to('/cuk/getStruktur/grafik')}}", function( res ) {
				let data = JSON.parse(res);
				Highcharts.chart('struktur-organisasi', {
					chart: {
						height: 600,
						inverted: true
					},
					title: {
						text: '<b>Struktur Organisasi</b>'
					},
					accessibility: {
						point: {
							descriptionFormatter: function (point) {
								var nodeName = point.toNode.name,
									nodeId = point.toNode.id,
									nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
									parentDesc = point.fromNode.id;
								return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
							}
						}
					},

					series: [{
						type: 'organization',
						name: 'Highsoft',
						keys: ['from', 'to'],
						data: [
							['Penasihat', 'Ketua'],
							['Ketua', 'Sekretaris'],
							['Ketua', 'Bendahara'],
							['Ketua', 'Humas'],
							['Ketua', 'Ketahanan'],
							['Ketua', 'Kesra'],
							['Ketua', 'Pembangunan'],
							['Ketua', 'Sosial'],
							['Ketua', 'PKK'],
							['Ketua', 'Kartar'],
							['Ketua', 'Olahraga'],
							['Ketua', 'Jumantik'],
							['Ketua', 'Posyandu'],
							['Ketua', 'Wisma'],
						],
						nodes: data.org,
						colorByPoint: false,
						color: '#007ad0',
						dataLabels: {
							color: 'white',
						},
						borderColor: 'white',
						nodeWidth: 65
					}],
					tooltip: {
						outside: true
					},
					exporting: {
						allowHTML: true,
						sourceWidth: 800,
						sourceHeight: 600
					}

				});
			});
		}
		
		function readMoreKetua(obj){
			var item = $(obj).data('item');
			$('#biografi').text(item.biografi);

			$('#modal-ketua-rt').modal('show');
		}

		function viewBerita(obj){
			var item = $(obj).data('item');

			$('#headerBerita').text(item.judul);
			$('#gambarBerita').attr("src","{{url('/uploads/master_berita')}}/"+item.gambar);
			$('#deskripsiBerita').text(item.isi);

			$('#modal-berita').modal('show');
		}
	</script>
</body>

</html>