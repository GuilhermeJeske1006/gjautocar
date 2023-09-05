
@extends('components.corpo')
@section('corpo')

	<!-- Listing Grid View -->
	<section class="our-listing bgc-f7 pb30-991">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="breadcrumb_content style2 mb0-991">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active text-thm" aria-current="page">Favoritos</li>
						</ol>
						<h2 class="breadcrumb_title">Listagem dos favoritos</h2>
					</div>
				</div>
				<div class="col-lg-6">
					
					
				</div>
			</div>
			<div class="row">
		
				<div class="col-md-12 col-lg-12">
					<div class="row">
						<div class="grid_list_search_result">
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-5">
								<div class="left_area tac-xsd">
									@if($automoveis instanceof \Illuminate\Support\Collection)
									<p>{{ $automoveis->count() }} resultados encontrados</p>
									@endif
								</div>
							</div>
							<div class="col-sm-12 col-md-8 col-lg-8 col-xl-7">
								<div class="right_area text-right tac-xsd">
									
								</div>
							</div>
						</div>
					</div>
					<div class="row">

						@foreach($automoveis as $item)
						<div class="col-lg-4 col-md-6">
							<div class="d-flex">
								 @component('automovel.apoio.card', ['item' => $item])@endcomponent
							</div>
						
						</div>
						@endforeach
					
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection