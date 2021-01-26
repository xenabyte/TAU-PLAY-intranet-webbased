<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{asset('css/bootstrap-reboot.min.css') }}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-grid.min.css') }}">
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{asset('css/slider-radio.css') }}">
	<link rel="stylesheet" href="{{asset('css/select2.min.css') }}">
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{asset('css/plyr.css') }}">
	<link rel="stylesheet" href="{{asset('css/main.css') }}">
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{asset('favico.ico') }}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{asset('favico.ico') }}">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
    <title>TAU PLAY – Intranet Movies & TV Shows, Online Video Content </title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    @include('sweet::alert')
	<!-- header (hidden style) -->
	<header class="header header--hidden">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<button class="header__menu" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>

						<a href="{{ url('/') }}" class="header__logo">
							<img src="{{asset('tau-logo.png') }}" style="-webkit-filter: drop-shadow(5px 5px 5px #222); filter: drop-shadow(5px 5px 5px #222);" alt="Intranet Movies & TV Shows, Online Video Content">
						</a>

						<ul class="header__nav">
							<li class="header__nav-item">
								<a class="header__nav-link" href="#">Home</a>
							</li>
							<li class="header__nav-item">
								<a class="header__nav-link" href="#">School Website</a>
							</li>
							<li class="header__nav-item">
								<a class="header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.93893 14.3033C6.08141 14.3033 5.38477 13.6067 5.38477 12.7505C5.38477 11.8943 6.08141 11.1963 6.93893 11.1963C7.79644 11.1963 8.49309 11.8943 8.49309 12.7505C8.49309 13.6067 7.79644 14.3033 6.93893 14.3033Z"/><path d="M12.7501 14.3033C11.8926 14.3033 11.1959 13.6067 11.1959 12.7505C11.1959 11.8943 11.8926 11.1963 12.7501 11.1963C13.6076 11.1963 14.3042 11.8943 14.3042 12.7505C14.3042 13.6067 13.6076 14.3033 12.7501 14.3033Z"/><path d="M18.5608 14.3033C17.7032 14.3033 17.0066 13.6067 17.0066 12.7505C17.0066 11.8943 17.7032 11.1963 18.5608 11.1963C19.4183 11.1963 20.1149 11.8943 20.1149 12.7505C20.1149 13.6067 19.4183 14.3033 18.5608 14.3033Z"/></svg>
								</a>

								<ul class="dropdown-menu header__nav-menu header__nav-menu--scroll" aria-labelledby="dropdownMenu3">
									<li><a href="#">Staff Portal</a></li>
									<li><a href="#">Student Portal</a></li>
									<li><a href="#">E-Library</a></li>
									<li><a href="#">Interview</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->
