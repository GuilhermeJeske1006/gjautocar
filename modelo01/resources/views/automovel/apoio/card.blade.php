<div class="item">
        <div class="feat_property">
            <div class="thumb">
                <a href="{{ route('detalhes', ['id' =>  $item->id ]) }}">
                    <img class="img-whp" src="{{ $item->foto_capa }}" alt="fp1.jpg">
                </a>
                <div class="thmb_cntnt">
                    @if ($item->automovel_destaque == true)
                        
                    <ul class="tag mb0" >
                        <li class="list-inline-item"><span>Destaque</span></li>
                    </ul>
                    @endif

                    <ul class="icon mb0">
                        @if (request()->routeIs('favoritos'))
                        <a href="{{ route('remove-Favoritos', ['item' => $item->id]) }}">
                            <li class="list-inline-item"><span data-toggle="tooltip" data-placement="top" title="Remover dos favoritos" class="flaticon-heart text-white"></span></li>
                        </a>
                        @else
                        <a href="{{ route('add-favoritos', ['item' => $item->id]) }}">
                            <li class="list-inline-item"><span data-toggle="tooltip" data-placement="top" title="Adicionar aos favoritos" class="flaticon-heart text-white"></span></li>
                        </a>
                        @endif
                    </ul>
                    <span class="fp_price">R$ {{ App\Helpers\ApiHelper::format_val($item->valor) }}</span>
                </div>
            </div>
            <div class="details">
                <div class="tc_content">
                    @isset($item->tipo_automovel[0]->tipo_automovel)
                    <p class="text-thm">{{ $item->tipo_automovel[0]->tipo_automovel }}</p>

                    @endisset
                    
                        <a href="{{ route('detalhes', ['id' =>  $item->id ]) }}"><h4>{{ $item->nome }}</h4></a> 
                        @isset($item->especificacao_modelo)
                        <p>{{ $item->especificacao_modelo }}</p>
                        @endisset
                    <ul class="prop_details mb0">
                        <li class="list-inline-item"><span>Ano/modelo: {{ $item->ano }}</span></li>
                        <li class="list-inline-item"><span>Km: {{ App\Helpers\ApiHelper::format_int($item->quilometragem) }}</span></li>
                        <li class="list-inline-item"><span>Cambio: {{ $item->cambio }}</span></li>
                    </ul>
                </div>
                {{-- <div class="fp_footer">
                    <ul class="fp_meta float-left mb0">
                        <li class="list-inline-item"><span href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></span></li>
                        <li class="list-inline-item"><span href="#">Ali Tufan</span></li>
                    </ul>
                    <div class="fp_pdate float-right">4 years ago</div>
                </div> --}}
            </div>
        </div>
</div>