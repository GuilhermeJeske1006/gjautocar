
@extends('components.corpo')
@section('corpo')

<section class="blog_post_container bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="breadcrumb_content style2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active text-thm" aria-current="page">Listagem dos blogs</li>
                    </ol>
                    <h2 class="breadcrumb_title">Listagem dos blogs</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($blog as $item)
                    @component('blog.apoio.card-blog', ['item' => $item])@endcomponent
                    @endforeach
                   
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mbp_pagination mt20">
                            <ul class="page_navigation">
                                @component('vendor.pagination.bootstrap-5', ['paginator' => $blog])
									@endcomponent
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @component('blog.apoio.filtro-blog')@endcomponent

                {{-- <div class="terms_condition_widget">
                    <h4 class="title">Categories Property</h4>
                    <div class="widget_list">
                        <ul class="list_details">
                            <li><a href="#"><i class="fa fa-caret-right mr10"></i>Apartment <span class="float-right">6 properties</span></a></li>
                            <li><a href="#"><i class="fa fa-caret-right mr10"></i>Condo <span class="float-right">12 properties</span></a></li>
                            <li><a href="#"><i class="fa fa-caret-right mr10"></i>Family House <span class="float-right">8 properties</span></a></li>
                            <li><a href="#"><i class="fa fa-caret-right mr10"></i>Modern Villa <span class="float-right">26 properties</span></a></li>
                            <li><a href="#"><i class="fa fa-caret-right mr10"></i>Town House <span class="float-right">89 properties</span></a></li>
                        </ul>
                    </div>
                </div> --}}
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

