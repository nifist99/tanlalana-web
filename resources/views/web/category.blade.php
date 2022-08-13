
@extends('web.tema.content')
@section('content')

<section class="normal-breadcrumb set-bg" data-setbg="{{url('web/img/normal-breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>{{Setting::app()}}</h2>
                    <p>Category</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>Category Content</h3>
                            </div>
                            <p>
                                Berikut adalah kategori bacaan yang tersedia, semoga bermanfaat.
                            </p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    @foreach($list as $key)
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <ul>
                                           <li><a href="{{url('by/category/'.Crypt::encryptString($key->id))}}">{{$key->name}}</a></li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</section>

@endsection
            