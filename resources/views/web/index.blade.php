@extends('web.tema.content')
@section('content')

<section class="normal-breadcrumb set-bg" data-setbg="{{url('web/img/normal-breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>{{Setting::app()}}</h2>
                    <p>Welcome to {{Setting::app()}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>List Artikel</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($list as $row)
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="blog__item small__item set-bg" data-setbg="{{url('storage/'.$row->foto)}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> {{Setting::blogDate($row->tanggal)}}</p>
                                <h4><a href="{{url('blog/'.Crypt::encryptString($row->id))}}">{{$row->judul}}</a></h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>

            <div class="col-lg-3">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>Advertise</h5>
                        </div>
                        <ul class="filter__controls">
                            <li class="active" data-filter=".week">Week</li>
                            <li data-filter=".month">Month</li>
                            <li data-filter=".years">Years</li>
                        </ul>
                        <div>
                            <a href="https://panel.niagahoster.co.id/ref/386839" target="_blank">
                                <img src="https://niagaspace.sgp1.cdn.digitaloceanspaces.com/assets/images/affiliasi/banner/300x250-affiliate-starting-bisnis-online.png"
                                 alt="Affiliate Banner Unlimited Hosting Indonesia" border="0" width="300" height="250" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="product__sidebar__comment">
                    <div class="section-title">
                        <h5>Artikel Populer</h5>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">Shirogane Tamashii hen Kouhan sen</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">Kizumonogatari III: Reiket su-hen</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">Monogatari Series: Second Season</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection