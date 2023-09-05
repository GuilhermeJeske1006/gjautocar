
	<section class="footer_one">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pr0 pl0">
					<div class="footer_about_widget">
						<h4>Sobre nós</h4>
						<p>{{ $item->descricao }}</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_qlink_widget">
						<h4>Links Rápidos</h4>
						<ul class="list-unstyled">
							<li><a href="{{ route('index', ['id' => $item->id]) }}">Home</a></li>
							<li><a href="{{ route('sobre') }}">Sobre nós</a></li>
							<li><a href="{{ route('listar', ['id' => $item->id]) }}">Automoveis</a></li>
							<li><a href="{{ route('contato', ['id' => $item->id]) }}">Contato</a></li>
							<li><a href="{{ route('favoritos', ['id' => $item->id]) }}">Favoritos</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_contact_widget">
						<h4>Endereco</h4>
						<ul class="list-unstyled">
							<li><a href="#">{{ $item->endereco->rua }}, {{ $item->endereco->numero }} </a></li>
							<li><a href="#">
								{{ $item->endereco->complemento }}
								</a></li>
							<li><a href="#"> {{ $item->endereco->bairro }} - {{ $item->endereco->cidade }}/ {{ $item->endereco->estado }}</a></li>
							
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_social_widget">
						<h4>Redes sociais</h4>
						<ul class="mb30">
							@isset($item->facebook)
							<li class="list-inline-item"><a href="{{ url($item->facebook) }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
							@endisset
							@isset($item->instagram)
							<li class="list-inline-item"><a href="{{ url($item->instagram) }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
							@endisset
						</ul>
						
					</div>

					<div class="footer_social_widget">
						<h4>Contato</h4>
						<ul class="mb30">
							<li><a href="#">{{ $item->telefone }}</a></li>
							<li><a href="#">{{ $item->whatsapp }}</a></li>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer Bottom Area -->
	<section class="footer_middle_area pt40 pb40">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xl-6">
					<div class="footer_menu_widget">
						<ul>
							<li class="list-inline-item"><a href="{{ route('index', ['id' => $item->id]) }}">Home</a></li>
							<li class="list-inline-item"><a href="{{ route('sobre', ['id' => $item->id]) }}">Sobre nós</a></li>
							<li class="list-inline-item"><a href="{{ route('listar', ['id' => $item->id]) }}">Automoveis</a></li>
							<li class="list-inline-item"><a href="{{ route('contato', ['id' => $item->id]) }}">Contato</a></li>
							<li class="list-inline-item"><a href="{{ route('favoritos', ['id' => $item->id]) }}">Favoritos</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-xl-6">
					<div class="copyright-widget text-right">
						<p>© 2023 Gj desenvolvimento.</p>
					</div>
				</div>
			</div>
		</div>
	</section>