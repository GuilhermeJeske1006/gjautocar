
@extends('components.corpo')
@section('corpo')

	<!-- Listing Grid View -->
	<section class="our-listing bgc-f7 pb30-991">
		<div class="container">
			@component('automovel.apoio.filtro-mobile', ['marcas' => $marcas, 'categorias' => $categorias])
				
			@endcomponent
			<div class="row">
				<div class="col-lg-6">
					<div class="breadcrumb_content style2 mb0-991">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
						    <li class="breadcrumb-item active text-thm" aria-current="page">Listagem</li>
						</ol>
						<h2 class="breadcrumb_title">Listagem de automóveis</h2>
					</div>
				</div>
				<div class="col-lg-6">
					
					<div class="dn db-991 mt30 mb0">
						<div id="main2">
							<span id="open2" class="flaticon-filter-results-button filter_open_btn style2"> Mostrar filtro</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xl-4">
					<div class="sidebar_listing_grid1 dn-991">
						@component('automovel.apoio.filtro', ['marcas' => $marcas, 'categorias' => $categorias])@endcomponent
						
						<div class="terms_condition_widget">
							<h4 class="title">Categorias de automóveis</h4>
							<div class="widget_list">
								<ul class="list_details">
									@foreach($categorias as $cate)
									
									<li><a href="{{ route('listar', ['categoria' =>  $cate->id ]) }}"><i class="fa fa-caret-right mr10"></i>{{ $cate->nome_categoria }} <span class="float-right"></span></a></li>
									@endforeach
								</ul>
							</div>
						</div>
						<div class="sidebar_feature_listing">
							<h4 class="title">Automóveis recentes</h4>
							@foreach ($automoveisRecentes as $recen)
							@component('automovel.apoio.mini-card', ['item' => $recen])@endcomponent

							@endforeach
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-8">
					<div class="row">
						<div class="grid_list_search_result">
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-5">
								<div class="left_area tac-xsd">
									<p>{{ $automovel->total() }} resutados encontrados</p>
								</div>
							</div>
							<div class="col-sm-12 col-md-8 col-lg-8 col-xl-7">
								<div class="right_area text-right tac-xsd">
									<ul>
										
										<li class="list-inline-item">
											<form action="{{ route('listar') }}" method="GET" id="seuForm">
											<span class="shrtby">Ordenar por:</span>
											<select class="selectpicker show-tick" name="ordenacao" onchange="document.getElementById('seuForm').submit()">
												<option> Selecione</option>
												<option value="recente">Mais recente</option>
												<option value="antigo">Mais antigo</option>
												<option value="menor">Menor preço</option>
												<option value="maior">Maior preço</option>
											</select>
										</form>

										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						@foreach ($automovel as $item)					
						<div class="col-lg-6 col-md-6">					
							<div class="d-flex">
								@component('automovel.apoio.card', ['item' => $item])
								@endcomponent
							</div>
						</div>
						@endforeach
					

						<div class="col-lg-12 mt20">
								
							
							<div class="mbp_pagination">
								<ul class="page_navigation">
									@component('vendor.pagination.bootstrap-5', ['paginator' => $automovel])
									@endcomponent
								
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

