<section id="property-city" class="property-city pb30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>Categorias de automoveis </h2>
                    <p>Encontre o Modelo Perfeito para Você.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="properti_city">
                    <div class="thumb">
                        <a href="{{ route('listar', ['categoria' =>  1 ]) }}">
                            <img class="img-fluid w100" src="assets/images/categorias/sedan.jpg" alt="pc1.jpg">
                        </a>
                    </div>
                    <a href="{{ route('listar', ['categoria' =>  1 ]) }}" class="overlay">
                        <div class="details">
                            <h4>Sedan</h4>
                            {{-- <p>24 Automóveis</p> --}}
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-xl-8">
                <div class="properti_city">
                    <div class="thumb">
                        <a href="{{ route('listar', ['categoria' =>  6 ]) }}">
                            <img class="img-fluid w100" src="assets/images/categorias/picape.jpg" alt="pc2.jpg">

                        </a>
                    </div>
                    <a href="{{ route('listar', ['categoria' =>  6 ]) }}" class="overlay">
                        <div class="details">
                            <h4>Picape</h4>
                            {{-- <p>18 Automóveis</p> --}}
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-xl-8">
                <div class="properti_city">
                    <div class="thumb">
                        <a href="{{ route('listar', ['categoria' =>  2 ]) }}">
                            <img class="img-fluid w100" src="assets/images/categorias/hatch.jpg" alt="pc3.jpg"></div>
                        </a>
                    <a href="{{ route('listar', ['categoria' =>  2 ]) }}" class="overlay">
                        <div class="details">
                            <h4>Hacth</h4>
                            {{-- <p>89 Automóveis</p> --}}
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="properti_city">
                    <div class="thumb"><a href="{{ route('listar', ['categoria' =>  3 ]) }}">
                        <img class="img-fluid w100" src="assets/images/categorias/suv.jpg" alt="pc4.jpg"></a></div>
                    <a href="{{ route('listar', ['categoria' =>  3 ]) }}" class="overlay">
                        <div class="details">
                            <h4>Suv</h4>
                            {{-- <p>47 Automóveis</p> --}}
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
