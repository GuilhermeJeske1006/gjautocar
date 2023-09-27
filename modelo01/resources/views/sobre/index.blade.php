
@extends('components.corpo')
@section('corpo')

@component('components.banner-interno', ['title' => 'Sobre nós'])@endcomponent

	<!-- About Text Content -->
	<section class="about-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2 class="mt0">{{ $sobre->titulo }}</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-xl-7">
					<div class="about_content">
						<p>{!! $sobre->texto !!}</p>
						
					</div>
				</div>
				@isset($sobre->foto)
				<div class="col-lg-4 col-xl-5">
					<div class="about_thumb">
						<img class="img-fluid w100" src="{{ $sobre->foto }}" alt="1.jpg">
					</div>
				</div>
				@endisset
				
			</div>

		</div>
	</section>

@endsection