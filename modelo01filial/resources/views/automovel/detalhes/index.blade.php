

@extends('components.corpo')
@section('corpo')
<div class="wrapper">
	<div class="preloader"></div>

	<div class="single_page_listing_tab">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="slider-tab" data-toggle="tab" href="#slider_tabs" role="tab" aria-controls="slider_tabs" aria-selected="true"><span class="flaticon-photo-camera color-white"></span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="slider_tabs" role="tabpanel" aria-labelledby="slider-tab">
			  	<!-- 10th Home Slider -->
				<div class="home10-mainslider">
					<div class="container-fluid p0">
						<div class="row">
							<div class="col-lg-12">
								<div class="main-banner-wrapper home10">
								    <div class="banner-style-one owl-theme owl-carousel">
								        <div class="slide slide-one" style="background-image: url({{ $item->foto_capa }});height: 600px;"></div>
										@foreach ($item->fotos as $f)
										<div class="slide slide-one" style="background-image: url({{ $f->foto }});height: 600px;"></div>
										@endforeach

								        <div class="slide slide-one" style="background-image: url(images/home/2.jpg);height: 600px;"></div>
								    </div>
								    <div class="carousel-btn-block banner-carousel-btn">
								        <span class="carousel-btn left-btn"><i class="flaticon-left-arrow-1 left"></i></span>
								        <span class="carousel-btn right-btn"><i class="flaticon-right-arrow right"></i></span>
								    </div><!-- /.carousel-btn-block banner-carousel-btn -->
								</div><!-- /.main-banner-wrapper -->
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</div>

	<!-- Agent Single Grid View -->
	<section class="our-agent-single bgc-f7 pb30-991">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-xl-8">
					<div class="single_property_title mt30-767 mb30-767">
						<h2>{{ $item->nome }}</h2>
						<p> {{ $item->especificacao_modelo }}
						</p>
					</div>
				</div>
				<div class="col-lg-5 col-xl-4">
					<div class="single_property_social_share">
						<div class="price float-left fn-400">
							<h2>R${{ App\Helpers\ApiHelper::format_val($item->valor) }}</h2>
						</div>
						<div class="spss mt20 text-right tal-400">
							<ul class="mb0">
								<li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank"><span class="fa fa-facebook"></span></a></li>
								<li class="list-inline-item"><a href="https://api.whatsapp.com/send?text={{ Request::url() }}" target="_blank"><span class="fa fa-whatsapp"></span></a></li>
								<li class="list-inline-item"><a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" target="_blank"><span class="fa fa-twitter"></span></a></li>

							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-8 mt50">
					<div class="row">
						<div class="col-lg-12">
							<div class="listing_single_description">
								<div class="lsd_list">
									<ul class="mb0">
										<li class="list-inline-item"><a href="#">Carro</a></li>
										<li class="list-inline-item"><a href="#">Ano/Modelo: {{ $item->ano }}</a></li>
										<li class="list-inline-item"><a href="#">Quilometragem: {{ App\Helpers\ApiHelper::format_int($item->quilometragem) }}</a></li>
										<li class="list-inline-item"><a href="#">Câmbio: {{ $item->cambio }}</a></li>
									</ul>
								</div>
								<h4 class="mb30">Descricão</h4>
						    	<p class="mb25">{{ $item->observacao }}</p>
						    	
							
							</div>
						</div>
						<div class="col-lg-12">
							<div class="additional_details">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb15">Dealhes de automóvel</h4>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Combustível :</p></li>
											<li><p>Cor :</p></li>
											
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ $item->tipo_combustivel }}</span></p></li>
											<li><p><span>{{ $item->cor }}</span></p></li>
											
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Tipo :</p></li>
											<li><p>Portas :</p></li>
											
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ $item->tipo_automovel[0]->tipo_automovel }}</span></p></li>
											<li><p><span>{{ $item->qtd_portas }}</span></p></li>
											
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Fianl da placa :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ $item->final_placa }}</span></p></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="application_statics mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb10">Itens do automóvel</h4>
									</div>
									@foreach ($item->itens as $i)

									<div class="col-sm-6 col-md-6 col-lg-4">
										<ul class="order_list list-inline-item">
											<li><a href="#"><span class="flaticon-tick"></span>{{ $i->nome_item}}</a></li>

											
										</ul>
									</div>
									@endforeach

									
								</div>
							</div>
						</div>

						{{-- <div class="col-lg-12">
							<div class="shop_single_tab_content style2 mt30">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
									    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Video do automóvel</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent2">
									<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
										<div class="property_video">
											<div class="thumb">
												<img class="pro_img img-fluid w100" src="{{ asset('assets/images/background/7.jpg') }}" alt="7.jpg">
												<div class="overlay_icon">
													<a class="video_popup_btn popup-img red popup-youtube" href="https://www.youtube.com/watch?v=oqNZOOWF8qM"><span class="flaticon-play"></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
						
						<div class="col-lg-12">
							<h4 class="mt30 mb30">Automoveis similiares</h4>
						</div>
						@foreach ($automoveisRecentes as $item)
						<div class="col-lg-6">
							
							<div class="d-flex">
								@component('automovel.apoio.card', ['site' => $site, 'item' => $item])
								
								@endcomponent
							</div>
						
						</div>
						@endforeach
						
					</div>
				</div>
				<div class="col-lg-4 col-xl-4 mt50">
					<form method="POST" action="{{ route('enviar_interesse', ['id' => $site->id]) }}" class="sidebar_listing_list">
						@csrf
						<div class="sidebar_advanced_search_widget">
							<div class="sl_creator">
								<h4 class="mb25">Falar com</h4>
								<div class="media">
									<img class="mr-3" src="{{ asset('assets/images/header-logo2.png') }}" alt="lc1.png">
									<div class="media-body">
								    	<h5 class="mt-0 mb0">{{ $site->nome }}</h5>
								    	<p class="mb0">{{ $site->whatsapp }}</p>
								    	<p class="mb0">{{ $site->email }}</p>
								  	</div>
								</div>
							</div>
							<ul class="sasw_list mb0">
								<li class="search_area">
								    <div class="form-group">
								    	<input type="text" name="nome" class="form-control" id="exampleInputName1" placeholder="Seu nome">
								    </div>
								</li>
								<li class="search_area">
								    <div class="form-group">
								    	<input type="text" name="telefone" class="form-control" id="exampleInputName2" placeholder="Telefone">
								    </div>
								</li>
								<li class="search_area">
								    <div class="form-group">
								    	<input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Email">
								    </div>
								</li>
								<li class="search_area">
		                            <div class="form-group">
		                                <textarea id="form_message" name="mensagem"  class="form-control required" rows="5" required="required" placeholder="Olá, estou interessado nesse automóvel">Gostei deste Automóvel que vi em seu site, pode me ajudar? Link do Automóvel 👉 {{ request()->url() }} </textarea>
		                            </div>
								</li>
								<li>
									<div class="search_option_button">
									    <button type="submit" class="btn btn-block btn-thm">Enviar</button>
									</div>
								</li>
							</ul>
						</div>
					</form>
					<div class="terms_condition_widget">
						<h4 class="title">Categorias de automoveis</h4>
						<div class="widget_list">
							<ul class="list_details">
								@foreach ($categorias as $cate)
								<li><a href="{{ route('listar', ['id' => $site->id, 'categoria' =>  $cate->id ]) }}"><i class="fa fa-caret-right mr10"></i>{{ $cate->nome_categoria }} <span class="float-right"></span></a></li>
								@endforeach
							
							</ul>
						</div>
					</div>
					<div class="sidebar_feature_listing">
						<h4 class="title">Automóveis em destaque</h4>
						@foreach($automoveisDestaque as $item)
						@component('automovel.apoio.mini-card', ['site' => $site, 'item' => $item])
							
						@endcomponent
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection