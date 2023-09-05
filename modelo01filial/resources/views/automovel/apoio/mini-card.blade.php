<div class="media">
    <img style="max-width: 90px;max-height: 80px;" class="align-self-start mr-3" src="{{ $item->foto_capa }}" alt="fls1.jpg">
    <div class="media-body">
        <h5 class="mt-0 post_title">{{ $item->nome }}
        </h5>
        <a class="color-default" href="{{ route('detalhes', ['id_empresa' => $site->id, 'id' =>  $item->id ]) }}">R$ {{ App\Helpers\ApiHelper::format_val($item->valor) }}</a>
        <ul class="mb0">
            <li class="list-inline-item">Ano: {{ $item->ano }}</li>
            <li class="list-inline-item">Km: {{ App\Helpers\ApiHelper::format_int($item->quilometragem) }}</li>
        </ul>
    </div>
</div>