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
                    <div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <form action="{{url('store/contact')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" placeholder="Name" name="name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input type="number" placeholder="Phone" name="phone" required>
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Message" name="content"></textarea>
                                <button type="submit" class="site-btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@if(session()->has('message'))
    @push('js')
        <script>
            Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: "{{session('message')}}",
                        showConfirmButton: false,
                        timer: 5000
                        })
        </script>
    @endpush
@endif

@endsection