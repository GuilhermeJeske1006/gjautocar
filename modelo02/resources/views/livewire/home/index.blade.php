<div>
<!-- 6th Home Design -->
@livewire('home.apoio.banner', ['marcas' => $marcas, 'categorias' => $categorias, 'site' => $site])


<!-- Feature Properties -->
<section id="feature-property" class="feature-property-home6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb40">
                    <h2>Nossos destaques</h2>
                    <p>As melhores oportunidades para investir <a class="float-right" href="{{ route('listar') }}">Ver todos <span class="flaticon-next"></span></a></p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="feature_property_home6_slider">
                    @foreach ($automovel as $item)
                    @livewire('automoveis.apoio.card', ['item' => $item])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@livewire('home.apoio.servicos')


@livewire('home.apoio.apoiadores')

</section></div>
