	<!-- Home Design -->
	@extends('components.corpo')
	@section('corpo')
	@component('home.apoio.banner', ['item' => $site, 'marcas' => $marcas])@endcomponent

	<!-- Feature Properties -->
	<section id="feature-property" class="feature-property bgc-f7">
		<div class="container ovh">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center mb40">
						<h2>Nossos destaques </h2>
						<p>As melhores oportunidades para investir.
						</p>
					</div>
				</div>
				<div class="col-lg-12 desktop-content">
					{{-- versão computador --}}
					<div  class="feature_property_slider ">
						@foreach ($automovel as $item)
						@component('automovel.apoio.card', ['site' => $site, 'item' => $item])@endcomponent
						@endforeach
					</div>

				</div>

				<div class="col-lg-12 mobile-content">
					<div  class="">
						@foreach ($automovel as $item)
						@component('automovel.apoio.card', ['site' => $site, 'item' => $item])@endcomponent
						@endforeach
					</div>

				</div>
				
			</div>
		</div>
	</section>

	@component('home.apoio.categorias', ['site' => $site])
		
	@endcomponent
	@component('home.apoio.testemunhos')
		
	@endcomponent

	@component('home.apoio.parceiros')@endcomponent

	@component('components.anuncie', ['site' => $site])@endcomponent

	@endsection
