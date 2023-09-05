<div class="row">
    <div class="col-lg-12">
        <div class="listing_sidebar dn db-991">
            <div class="sidebar_content_details style3">
                <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
                <form method="GET" action="{{ route('listar', ['id' => $site->id]) }}" class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
                    <div class="sidebar_advanced_search_widget">
                        <h4 class="mb25">Busca avançada <a class="filter_closed_btn float-right" href="#"><small>Hide Filter</small> <span class="flaticon-close"></span></a></h4>
                        <ul class="sasw_list style2 mb0">
                            <li>
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
                            <li>
                                <div class="search_option_two">
                                    <div class="candidate_revew_select">
                                        <select name="categoria" class="selectpicker w100 show-tick">
                                            <option value="">Selecione a categoria</option>
                                            @foreach ($categorias as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome_categoria }}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                </div>
                            </li>
                            {{-- <li>
                                <div class="small_dropdown2">
                                    <div id="prncgs" class="btn dd_btn">
                                        <span>Price</span>
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
                            </li> --}}
                            <li>
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
                            <li>
                                <div class="search_option_two">
                                    <div class="candidate_revew_select">
                                        <select name="modelo" id="modelo" class="selectpicker w100 show-tick">
                                            <option value=""> Selecione o modelo</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="search_option_two">
                                    <div class="candidate_revew_select">
                                        <select name="cambio" class="selectpicker w100 show-tick">
                                            <option value="">Tipo de cambio</option>
                                            <option value="manual">Manual</option>
                                            <option value="automatico">Automatico</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            {{-- <li>
                                <div class="small_dropdown2">
                                    <div id="prncgs" class="btn dd_btn">
                                        <span>Preço</span>
                                        <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
                                    </div>
                                      <div class="dd_content2">
                                         <div class="pricing_acontent">
                                            <input  type="number" class="amount" name="valor_min" placeholder="R$ 1000" id="slider-range-value1"/>
                                            <input type="number" class="amount2"  name="valor_max" placeholder="R$ 100.000" id="slider-range-value2"/>
                                            <div id="slider"></div>
                                        </div>
                                      </div>
                                </div>
                            </li> --}}
                            <li>
                                <div class="search_option_two">
                                    <div class="candidate_revew_select">
                                        <select name="motor" class="selectpicker w100 show-tick">
                                            <option value="">Selecione o Motor</option>
                                            <option value="1.0" >1.0</option>
                                            <option value="1.4">1.4</option>
                                            <option value="1.6">1.6</option>
                                            <option value="2.0">2.0</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3.0">3.0</option>
                                            <option value="125cc">125cc</option>
                                            <option value="250cc">250cc</option>
                                            <option value="500cc">500cc</option>
                                            <option value="600cc">600cc</option>
                                            <option value="1000cc">1000cc</option>
                                            <option value="8.0">8.0</option>
                                            <option value="12.0">12.0</option>
                                            <option value="16.0">16.0</option>
                                            <option value="20.0">20.0</option>               
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="search_option_two">
                                    <div class="candidate_revew_select">
                                        <select name="combustivel" class="selectpicker w100 show-tick">
                                            <option value="">tipo de Combustível</option>
                                            <option value="gasolina">Gasolina</option>
                                            <option value="alcool">Álcool</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Bi-Combustível">Bi-Combustível</option>
                                            <option value="Outro">Outro</option>
                
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="search_option_two">
                                    <div class="candidate_revew_select">
                                        <select name="qtd_portas" class="selectpicker w100 show-tick">
                                            <option value="">Quantidade de portas</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li class="min_area style2 list-inline-item">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="valor_min" id="exampleInputName2" placeholder="Valor mínimo">
                                </div>
                            </li>
                           
                            <li class="min_area style2 list-inline-item">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="valor_max" id="exampleInputName1" placeholder="Valor máximo">
                                </div>
                            </li>
                           
                            <li class="min_area style2 list-inline-item">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cor" id="exampleInputName1" placeholder="cor">
                                </div>
                            </li>
                            <li class="min_area style2 list-inline-item">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="ano_min" id="exampleInputName2" placeholder="Ano de">
                                </div>
                            </li>
                            <li class="max_area list-inline-item">
                                <div class="form-group">
                                    <input type="number" class="form-control" ano="ano_max" id="exampleInputName3" placeholder="Ano até">
                                </div>
                            </li>
                            <li>
                                <div class="search_option_button">
                                    <button type="submit" class="btn btn-block btn-thm">Procurar</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>