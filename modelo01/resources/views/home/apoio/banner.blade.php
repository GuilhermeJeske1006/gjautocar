<section class="home-one home1-overlay home1_bgi1">
    <div class="container">
        <div class="row posr">
            <div class="col-lg-12">
                <div class="home_content">
                    <div class="home-text text-center">
                        <h2 class="fz55">{{ $item->nome }}</h2>
                        <p class="fz18 color-white">{{ $item->titulo }}</p>
                    </div>
                    <div class="home_adv_srch_opt">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pesquisar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Buscar</a>
                            </li>
                        </ul>
                        <div class="tab-content home1_adsrchfrm" id="pills-tabContent">
                            <form method="GET" action="{{ route('listar') }}" class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="home1-advnc-search">
                                    <ul class="h1ads_1st_list mb0">
                                        <li class="list-inline-item">
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select name="tipo" class="selectpicker w100 show-tick">
                                                        <option value="">Selecione o tipo</option>
                                                        <option value="1">Carro</option>
                                                        <option value="2">Moto</option>
                                                        <option value="3">Caminhão</option>
                                                        <option value="4">Outro</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select name="marca" id="marca" onchange="getModelo()" class="selectpicker w100 show-tick">
                                                        <option value="">Selecione a marca</option>
                                                        @foreach ($marcas as $marca)
                                                            <option value="{{ $marca->id }}">{{ $marca->nome_modelo }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select name="modelo" id="modelo" class="selectpicker w100 show-tick">
                                                        <option value="">Selecione o modelo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="small_dropdown2">
                                                <div id="prncgs" class="btn dd_btn">
                                                    <span>Preço</span>
                                                    <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
                                                </div>
                                                  <div class="dd_content2">
                                                    <div class="pricing_acontent">
                                                        <!-- <input type="text" class="amount" placeholder="$52,239"> 
                                                        <input type="text" class="amount2" placeholder="$985,14">
                                                        <div class="slider-range"></div> -->
                                                        <input  type="number" class="amount" name="valor_min" placeholder="R$ 1000" id="slider-range-value1"/>
                                                        <input type="number" class="amount2"  name="valor_max" placeholder="R$ 100.000" id="slider-range-value2"/>
                                                        <div class="slider-range" id="slider"></div>
                                                    </div>
                                                  </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="form-group">
                                                <input type="text" class="input-responsive2 form-control" name="ano" placeholder="Ano">
                                            </div>
                                        </li>
                                        
                                        <li class="list-inline-item">
                                            <div class="search_option_button">
                                                <button type="submit" class="btn btn-thm">Procurar</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                            <form method="GET" action="{{ route('listar') }}" class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="home1-advnc-search">
                                    <ul class="h1ads_1st_list mb0">
                                       
                                        <li class="list-inline-item">
                                            <div class="form-group">
                                                <input style="width: 950px;" type="text" class="input-responsive form-control" name="search" placeholder="Faça a sua busca pelo nome">
                                            </div>
                                        </li>
                                        
                                        <li class="list-inline-item">
                                            <div class="search_option_button">
                                                <button type="submit" class="btn btn-thm">Procurar</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>

</script>