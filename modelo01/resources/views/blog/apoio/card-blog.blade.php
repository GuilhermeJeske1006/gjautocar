<div class="col-lg-6">
    <div class="for_blog feat_property">
        <div class="thumb">
            <img class="img-whp" src="{{ $item->foto }}" alt="1.jpg">
            {{-- <div class="blog_tag">Construction</div> --}}
        </div>
        <div class="details">
            <div class="tc_content">
                <a href="{{ route('detalhes-blog', ['id' =>  $item->id ]) }}"><h4>{{ $item->titulo }}</h4></a> 
                <ul class="bpg_meta">
                    <li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i></a></li>
                    <li class="list-inline-item"><a href="#">{{ App\Helpers\ApiHelper::converterData($item->created_at) }}</a></li>
                </ul>
                <p>{{ $item->subtitulo }}</p>
            </div>
            {{-- <div class="fp_footer">
                <ul class="fp_meta float-left mb0">
                    <li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
                    <li class="list-inline-item"><a href="#">Ali Tufan</a></li>
                </ul>
                <a class="fp_pdate float-right text-thm" href="{{ route('detalhes-blog', ['id' =>  $item->id ]) }}">Ver mais <span class="flaticon-next"></span></a>
            </div> --}}
        </div>
    </div>
</div>