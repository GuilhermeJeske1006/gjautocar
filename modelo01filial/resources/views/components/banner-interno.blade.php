<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="breadcrumb_content">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index', ['id' => $item->id]) }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                    <h4 class="breadcrumb_title">{{ $title }}</h4>
                </div>
            </div>
        </div>
    </div>
</section>