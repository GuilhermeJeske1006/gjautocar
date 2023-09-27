<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced search custom, agency, agent, business, clean, corporate, directory, google maps, homes, listing, membership packages, property, real estate, real estate agent, realestate agency, realtor">
<meta name="description" content="FindHouse - Real Estate HTML Template">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<!-- Title -->
<title>FindHouse - Real Estate HTML Template</title>
<!-- Favicon -->
<link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />
<meta name="api-base" content="{{ env('API_BASE') }}">
<meta name="empresa-id" content="{{ env('EMPRESA_ID') }}">
</head>
<body>
<div class="wrapper">
	{{-- <div class="preloader"></div> --}}

	@livewire('componentes.menu')

	{{ $slot }}

	<!-- Our Footer -->
	@livewire('componentes.rodape')

{{-- <a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a> --}}
</div>
<!-- Wrapper End -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.mmenu.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/ace-responsive-menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/isotop.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/snackbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/simplebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/scrollto.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-scrolltofixed-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.counterup.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/slider.js') }}"></script>
{{-- <script type="text/javascript" src="{{ asset('assets/js/pricing-slider.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('assets/js/timepicker.js') }}"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>