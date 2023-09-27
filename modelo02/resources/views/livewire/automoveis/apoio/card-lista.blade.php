    <div class="col-lg-12">
        <div class="feat_property list">
            <div class="thumb">
                <img class="img-whp" src="{{ $item->foto_capa }}" alt="fp1.jpg">
                <div class="thmb_cntnt">
                    <ul class="icon mb0">
                        <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="details">
                <div class="tc_content">
                    <div class="dtls_headr">
                        @if ($item->automovel_destaque == true)
                        <ul class="tag">
                            <li class="list-inline-item"><a href="#">Destaque</a></li>
                        </ul> 
                        @endif
                       
                        <a class="fp_price" href="#">R$ {{ App\Helpers\ApiHelper::format_val($item->valor) }}</a>
                    </div>
                    @isset($item->tipo_automovel[0]->tipo_automovel)
                    <p class="text-thm">{{ $item->tipo_automovel[0]->tipo_automovel }}</p>

                    @endisset
                    <h4>{{ $item->nome }}</h4>
                    <p> {{ $item->especificacao_modelo }}</p>
                    <ul class="prop_details mb0">
                        <li class="list-inline-item"><a href="#">Km: {{ App\Helpers\ApiHelper::format_int($item->quilometragem) }}</a></li>
                        <li class="list-inline-item"><a href="#">Cambio: {{ $item->cambio }}</a></li>
                        <li class="list-inline-item"><a href="#">Ano/modelo: {{ $item->ano }}</a></li>
                    </ul>
                </div>
                <div class="fp_footer">
                    <ul class="fp_meta float-left mb0">
                        <li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
                        <li class="list-inline-item"><a href="#">Ali Tufan</a></li>
                    </ul>
                    <div class="fp_pdate float-right">4 years ago</div>
                </div>
            </div>
        </div>
    </div>
