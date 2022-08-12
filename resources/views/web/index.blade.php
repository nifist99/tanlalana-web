@extends('web.tema.content')
@section('content')

<section class="normal-breadcrumb set-bg" data-setbg="{{url('web/img/normal-breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Our Blog</h2>
                    <p>Welcome to the official Anime blog.</p>
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
                            <h4>Trending Now</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="blog__item small__item set-bg" data-setbg="{{url('web/img/blog/blog-4.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="#">Bok no Hero Academia Season 4 – 18</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="blog__item small__item set-bg" data-setbg="{{url('web/img/blog/blog-4.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="#">Bok no Hero Academia Season 4 – 18</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="blog__item small__item set-bg" data-setbg="{{url('web/img/blog/blog-5.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="#">Fate/Stay Night: Untimated Blade World</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="blog__item small__item set-bg" data-setbg="{{url('web/img/blog/blog-5.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="#">Fate/Stay Night: Untimated Blade World</a></h4>
                            </div>
                        </div>
                    </div>
                    
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
                    </div>
                </div>
                <div class="product__sidebar__comment">
                    <div class="section-title">
                        <h5>New Comment</h5>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__pic">
                            <img src="{{url('web/img/sidebar/comment-1.jpg')}}" alt="">
                        </div>
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
                        <div class="product__sidebar__comment__item__pic">
                            <img src="{{url('web/img/sidebar/comment-2.jpg')}}" alt="">
                        </div>
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
                        <div class="product__sidebar__comment__item__pic">
                            <img src="{{url('web/img/sidebar/comment-3.jpg')}}" alt="">
                        </div>
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
                        <div class="product__sidebar__comment__item__pic">
                            <img src="{{url('web/img/sidebar/comment-4.jpg')}}" alt="">
                        </div>
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