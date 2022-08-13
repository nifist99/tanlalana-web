@extends('web.tema.content')
@section('content')

<section class="normal-breadcrumb set-bg" data-setbg="{{url('web/img/normal-breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>{{Setting::app()}}</h2>
                    <p>Hubungi Kami</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="blog__details__form">
                <h4>Saran Hosting Di Niaga Hoster Stabil Gan !!!</h4>
                <a href="https://panel.niagahoster.co.id/ref/386839" target="_blank">
                    <img src="https://niagaspace.sgp1.cdn.digitaloceanspaces.com/assets/images/affiliasi/banner/336x280-affiliate-starting-bisnis-online.png"
                     alt="Affiliate Banner Unlimited Hosting Indonesia" border="0" width="100%" height="350" />
                    </a>
                </div>

            </div>
            <div class="col-sm-8">
                <div class="blog__details__form">
                    <h4>Leave A Message</h4>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" placeholder="Name">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" placeholder="Email">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input type="number" placeholder="Phone">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Message"></textarea>
                                <button type="submit" class="site-btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection