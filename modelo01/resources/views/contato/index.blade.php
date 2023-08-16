@extends('components.corpo')
@section('corpo')
	@component('components.banner-interno', ['title' => 'Contato'])@endcomponent

	<!-- Our Contact -->
	<section class="our-contact pb0 bgc-f7">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-xl-8">
					<div class="form_grid">
						<h4 class="mb5">Entre em contato</h4>
			            <form class="contact_form" id="contact_form" name="contact_form" action="{{ route('enviar_contato') }}" method="post" novalidate="novalidate">
							@csrf
							<div class="row">
				                <div class="col-md-6">
				                    <div class="form-group">
										<input id="form_name" name="nome" class="form-control" required type="text" placeholder="Nome">
									</div>
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
				                    	<input id="form_email" name="email" class="form-control required email" required="required" type="email" placeholder="Email">
				                    </div>
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
				                    	<input id="form_phone" name="telefone" class="form-control required phone" required="required" type="phone" placeholder="Telefone">
				                    </div>
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
					                    <input id="form_subject" name="assunto" class="form-control required" required="required" type="text" placeholder="Assunto">
									</div>
				                </div>
				                <div class="col-sm-12">
		                            <div class="form-group">
		                                <textarea id="form_message" name="mensagem" class="form-control required" rows="8" required="required" placeholder="Mensagem"></textarea>
		                            </div>
				                    <div class="form-group mb0">
					                    <button type="submit" class="btn btn-lg btn-thm">Enviar mensagem</button>
				                    </div>
				                </div>
			                </div>
			            </form>
					</div>
				</div>
				<div class="col-lg-5 col-xl-4">
					<div class="contact_localtion">
					
						<div class="content_list">
							<h5>Endereço</h5>
							<p>{{ $item->endereco->rua }}, {{ $item->endereco->numero }} <br>
								{{ $item->endereco->complemento }}
								 <br>{{ $item->endereco->bairro }} - {{ $item->endereco->cidade }}/ {{ $item->endereco->estado }}</p>
						</div>
						@isset($item->telefone)
						<div class="content_list">
							<h5>Telefone</h5>
							<p>{{ $item->telefone }}</p>
						</div>
						@endisset
						
						@isset($item->whatsapp)
						<div class="content_list">
							<h5>Whatsapp</h5>
							<p>{{ $item->whatsapp }}</p>
						</div>
						@endisset
						
						@isset($item->email)
						<div class="content_list">
							<h5>Email</h5>
							<p>{{ $item->email }}</p>
						</div>
						@endisset
						

						<h5>Redes Sociais</h5>
						<ul class="contact_form_social_area">
							@isset($item->facebook)
							<li class="list-inline-item"><a href="{{ url($item->facebook) }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
							@endisset
							@isset($item->instagram)
							<li class="list-inline-item"><a href="{{ url($item->instagram) }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
							@endisset
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid p0 mt50">
			<div class="row">
				<div class="col-lg-12">
					<div class="h100" id="map-canvas"></div>
				</div>
			</div>
		</div>
	</section>

	@component('components.anuncie')@endcomponent

@endsection