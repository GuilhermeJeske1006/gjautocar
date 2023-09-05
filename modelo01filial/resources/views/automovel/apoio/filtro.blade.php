<form method="GET" action="{{ route('listar', ['id' => $site->id]) }}" class="sidebar_listing_list">
    <div class="sidebar_advanced_search_widget">
        <ul class="sasw_list mb0">
            <li>
                <div class="search_option_two">
                    <div class="candidate_revew_select">
                        <select name="tipo" class="selectpicker w100 show-tick">
                            <option value="">Selecione o tipo</option>
                            <option value="1">Carro</option>
                            <option value="2">Moto</option>
                            <option value="3">Caminhão</option>
                            <option value="4" >Outro</option>
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
                            <option value="{{ $item->id }}" @if(old('categoria') == $item->id) selected @endif>{{ $item->nome_categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </li>
            
            <li>
                <div class="search_option_two">
                    <div class="candidate_revew_select">
                        <select name="marca" id="marc" onchange="getModel()" class="selectpicker w100 show-tick">
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
                        <select name="modelo" id="model" class="selectpicker w100 show-tick">
                            <option value="">Selecione o modelo</option>
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
            <li class="search_area">
                <div class="form-group">
                    <input type="text" class="form-control" name="cor" id="exampleInputName1" placeholder="cor">
                </div>
            </li>
            <li class="min_area list-inline-item">
                <div class="form-group">
                    <input type="text" class="form-control" name="valor_min" id="exampleInputName2" placeholder="Valor Minimo">
                </div>
            </li>
            <li class="max_area list-inline-item">
                <div class="form-group">
                    <input type="text" class="form-control" name="valor_max" id="exampleInputName1" placeholder="Valor máximo">
                </div>
            </li>
            <li class="min_area list-inline-item">
                <div class="form-group">
                    <input type="text" class="form-control" name="ano_min" id="exampleInputName2" placeholder="Ano de">
                </div>
            </li>
            <li class="max_area list-inline-item">
                <div class="form-group">
                    <input type="text" class="form-control" name="ano_max" id="exampleInputName3" placeholder="Ano até">
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

<script>
      function getModel() {
    var marcaId = document.getElementById('marc').value;
    var modeloSelect = document.getElementById('model');
    var apiBase = document.querySelector('meta[name="api-base"]').getAttribute('content');

    // Limpar as opções anteriores
    while (modeloSelect.options.length > 1) {
        modeloSelect.remove(1);
    } 

    if (marcaId) {
        axios.get(`${apiBase}modelos/` + marcaId)
            .then(function (response) {
                const modelos = response.data.data;

                modelos.forEach(function (modelo) {
                    const option = document.createElement('option');
                    option.value = modelo.id;
                    option.text = modelo.nome_modelo;
                    modeloSelect.add(option);
                });

                $(modeloSelect).selectpicker('refresh');
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}
</script>
