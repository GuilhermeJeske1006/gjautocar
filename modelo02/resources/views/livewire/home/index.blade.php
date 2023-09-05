<div>
<!-- 6th Home Design -->
@livewire('home.apoio.banner')

<!-- Feature Properties -->
<section id="feature-property" class="feature-property-home6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb40">
                    <h2>Featured Properties</h2>
                    <p>Handpicked properties by our team. <a class="float-right" href="#">View All <span class="flaticon-next"></span></a></p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="feature_property_home6_slider">
                    @for($i = 0; $i < 10; $i++)
                    @livewire('automoveis.apoio.card')
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>

@livewire('home.apoio.servicos')


@livewire('home.apoio.apoiadores')

</section></div>
