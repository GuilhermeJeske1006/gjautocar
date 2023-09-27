<div>
    <div class="item">
        <div class="properti_city home6">
            <div class="thumb">
                <img class="img-fluid w100" src="{{ $item->foto_capa }}" alt="fp10.jpg">
                <div class="thmb_cntnt">
                    @if ($item->automovel_destaque == true)
                        <ul class="tag mb0">
                            <li class="list-inline-item"><a href="#">Destaque</a></li>
                        </ul> 
                        @endif
                </div>
            </div>
            <div class="overlay">
                <div class="details">
                    <a class="fp_price" href="/automovel/{{ $item->id }}" wire:navigate >R$ {{ App\Helpers\ApiHelper::format_val($item->valor) }}</a>
                    <h4>{{ $item->nome }}</h4>
                    <ul class="prop_details mb0">
                        <li class="list-inline-item"><a href="#">Km: {{ App\Helpers\ApiHelper::format_int($item->quilometragem) }}</a></li>
                        <li class="list-inline-item"><a href="#">Cambio: {{ $item->cambio }}</a></li>
                        <li class="list-inline-item"><a href="#">Ano/modelo: {{ $item->ano }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
