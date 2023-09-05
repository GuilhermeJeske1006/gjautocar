@php
use App\Helpers\ApiHelper;

    $data = ApiHelper::getDataFromApi();
    $dataObj = json_decode($data);

     $item = $dataObj->data;
@endphp

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="{{ $item->palavras_chaves }}">
<meta name="description" content="{{ $item->descricao }}">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.php') }}?theme_color={{ str_replace('#', '', $item->cor) }}">
<meta name="api-base" content="{{ env('API_BASE') }}">
<meta name="empresa-id" content="{{ env('EMPRESA_ID') }}">

<!-- Title -->
<title>{{ $titulo }}</title>
<!-- Favicon -->
<link href="{{ $item->logo }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{ $item->logo }}" sizes="128x128" rel="shortcut icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
{!! $item->scripts !!}
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
    
  @if (request()->routeIs('index'))
	  @component('components.menu', ['item' => $item, 'mobile' => $item])@endcomponent
    @else
    @component('components.menu-white', ['item' => $item, 'mobile' => $item])@endcomponent
  @endif


	@yield('corpo')


    @component('components.rodape', ['item' => $item])@endcomponent


    @component('components.modal-aceite')@endcomponent
    @component('components.social', ['item' => $item])@endcomponent

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "10000",
        "extendedTimeOut": "5000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@if ($message = Session::get('success'))
    <script type="text/javascript">
        toastr.success("{{ $message }}");
    </script>

@endif


@if ($message = Session::get('error'))
    <script type="text/javascript">
        toastr.error("{{ $message }}");
    </script>
@endif


@if ($message = Session::get('warning'))
    <script type="text/javascript">
        toastr.warning("{{ $message }}");
    </script>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
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