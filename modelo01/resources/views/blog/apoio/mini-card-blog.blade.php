<div class="media">
    <img style="max-width: 90px;max-height: 80px;" class="align-self-start mr-3" src="{{ $item->foto }}" alt="fls1.jpg">
    <div class="media-body">
        <a href="{{ route('detalhes-blog', ['id' =>  $item->id ]) }}">
        <h5 class="mt-0 post_title">{{ $item->titulo }}</h5></a>
        <li class="list-inline-item">{{ count($item->comentarios) }} comentários</li>
        <ul class="mb0">
                <li class="list-inline-item"><i class="flaticon-calendar"></i></li>
                <li class="list-inline-item">{{ App\Helpers\ApiHelper::converterData($item->created_at) }}</li>
        </ul>
    
    </div>
</div>