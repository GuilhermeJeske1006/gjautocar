@extends('components.corpo')
@section('corpo')

<section class="blog_post_container bgc-f7 pb30">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="breadcrumb_content style2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active text-thm" aria-current="page">{{ $item->titulo  }}</li>
                    </ol>
                    <h2 class="breadcrumb_title">{{ $item->titulo  }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="main_blog_post_content">
                    <div class="mbp_thumb_post">
                        <h3 class="blog_sp_title">{{ $item->titulo }}</h3>
                        <ul class="blog_sp_post_meta">
                            
                            <li class="list-inline-item"><span class="flaticon-calendar"></span></li>
                            <li class="list-inline-item"><a href="#">{{ App\Helpers\ApiHelper::converterData($item->created_at) }}</a></li>
                            
                            <li class="list-inline-item"><span class="flaticon-chat"></span></li>
                            <li class="list-inline-item"><a href="#">{{ count($item->comentarios) }}</a></li>
                        </ul>
                        @isset($item->foto)
                        <div class="thumb">
                            <img class="img-fluid" src="{{ $item->foto }}" alt="bs1.jpg">
                        </div>
                        @endisset
                        
                        <div class="details">
                            <p class="mb30">{!! $item->texto !!}</p>                            
                        </div>
                        <ul class="blog_post_share">
                            <li><p>Compartilhe</p></li>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{ $item->titulo }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?text={{ Request::url() }}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                    <div class="mbp_pagination_tab">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                @if ($postAnt != null)
                                <div class="pag_prev">
                                    <a href="{{ route('detalhes-blog', ['id' =>  $postAnt->id ]) }}"><span class="flaticon-back"></span></a>
                                    <div class="detls"><h5>Postagem anterior</h5> <p> {{ $postAnt->titulo }}</p></div>
                                </div>
                                @endif
                               
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                @if ($postPoste != null)
                                <div class="pag_next text-right">
                                    <a href="{{ route('detalhes-blog', ['id' =>  $postPoste->id ]) }}"><span class="flaticon-next"></span></a>
                                    <div class="detls"><h5>Proxima postagem</h5> <p> {{ $postPoste->titulo }}</p></div>
                                </div>
                                @endif
                               
                            </div>
                        </div>
                    </div>
                    <div class="product_single_content mb30">
                        <div class="mbp_pagination_comments">
                            <div class="total_review">
                                <h4>{{ count($item->comentarios) }} Comentarios</h4>
                               
                                <a class="tr_outoff pl10" href="#"></a>
                                <a class="write_review float-right fn-xsd" href="#">Escreva o seu comentário</a>
                            </div>
                            @foreach ($item->comentarios as $comentario)
                            <div class="mbp_first media">
                                {{-- <img src="images/testimonial/1.png" class="mr-3" alt="1.png"> --}}
                                <div class="media-body">
                                    <h4 class="sub_title mt-0">{{ $comentario->nome_usuario }}
                                        
                                    </h4>
                                    <a class="sspd_postdate fz14" href="#">{{ App\Helpers\ApiHelper::converterData($comentario->created_at) }}</a>
                                    <p class="fz14 mt10">{{ $comentario->comentario }}</p>
                                </div>
                            </div>
                            <div class="custom_hr"></div>
                            @endforeach
                            
                           
                        </div>
                    </div>
                    <div class="bsp_reveiw_wrt">
                        <h4>Escreva o seu comentário</h4>
                        <ul class="review_star">
                          
                        </ul>
                        <form method="POST" action="{{ route('enviar_comentario') }}" class="comments_form">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $item->id }}">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputName1" name="nome_usuario" aria-describedby="textHelp" placeholder="Nome do usuario">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" rows="6" placeholder="Seu comentário"></textarea>
                            </div>
                            <button type="submit" class="btn btn-thm">Enviar</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb20">
                        <h4>Ultimos posts</h4>
                    </div>
                    @foreach ($blogsRecentes as $item)
                    @component('blog.apoio.card-blog', ['item' => $item])@endcomponent
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                @component('blog.apoio.filtro-blog')@endcomponent


                <div class="sidebar_feature_listing">
                    <h4 class="title">Últimas postagens</h4>
                    @foreach ($blogsRecentes as $item)
                    @component('blog.apoio.mini-card-blog', ['item' => $item])
                        
                    @endcomponent
                    @endforeach
                    
                    
                </div>
                
            </div>
        </div>
    </div>
</section>

@endsection