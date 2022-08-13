@extends('web.tema.content')
@section('content')
 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{url('by/category/'.Crypt::encryptString($row['id_kategori_artikel']))}}">{{$row['kategori_artikel']}}</a>
                    <a href="{{url('blog/'.Crypt::encryptString($row['id']))}}">{{$row['judul']}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($row['url_video'])
                    <div class="mb-5">
                        <iframe width="100%" height="400px" 
                        src="{{'https://www.youtube.com/embed/'.$row['url_video']}}"
                        title="YouTube video player" frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; 
                        encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                    </div>
                @endif
                <div class="anime__details__episodes">
                    <div class="section-title">
                        <h5>Link Download</h5>
                    </div>
                    @foreach($list as $key)
                    <a target="_blank" href="{{'https://semawur.com/st/?api=62b0b50bdf3aa1cc54078c86d94c4f5811d1b1b1&url='.$key->link}}">{{$key->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection