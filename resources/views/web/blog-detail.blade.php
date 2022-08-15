@extends('web.tema.content')
@section('content')

@push('css')
    <style>
        h1{
            color: rgb(255, 0, 0)
        }
        h2{
            color: rgb(255, 0, 0)
        }
        h3{
            color: rgb(255, 0, 0)
        }
        h4{
            color: rgb(255, 0, 0)
        }
        h5{
            color: rgb(255, 0, 0)
        }
        h6{
            color: rgb(255, 0, 0)
        }
        ul li{
            color: white
        }
        ol li{
            color: white
        }
    </style>
@endpush

  <!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog__details__title">
                    <h6>{{$row['kategori_artikel']}}<span>- {{Setting::blogDate($row['tanggal'])}}</span></h6>
                    <h2>{{$row['judul']}}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="blog__details__pic">
                    <img src="{{url('assets/img/test.jpg')}}" style="border-radius: 16px" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog__details__content">
                    <div class="blog__details__text">
                        @php
                            echo $row['content'];
                        @endphp
                    </div>
                    <div class="blog__details__tags">
                        <a href="{{url('by/category/'.Crypt::encryptString($row['id_kategori_artikel']))}}">{{$row['kategori_artikel']}}</a>
                    </div>

                    @if($row['download']!=0)
                        <p style="color: white">Silahkan Download File Di Sini</p>
                        <div class="blog__details__btns">
                            <div class="anime__details__btn">
                                <a href="{{url('blog/download/'.Crypt::encryptString($row['id']))}}" class="watch-btn"><span>Download Di Sini</span> <i
                                    class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    @else
                    <div class="blog__details__btns">
                    </div>
                    @endif

                </div>

                        <div class="blog__details__comment">
                            <h4>{{$row['total']}} Comments</h4>

                            @foreach($row['komentar'] as $key)

                            <div class="blog__details__comment__item">
                                <div class="blog__details__comment__item__pic">
                                    <img src="{{url('web/img/profile/'.rand(1,15).'.jpg')}}" style="width: 50px;height:50px;border-radius:50px" alt="">
                                </div>
                                <div class="blog__details__comment__item__text">
                                    <span>{{Setting::blogDate($key->created_at)}}</span>
                                    <h5>{{$key->name}}</h5>
                                    <p>{{$key->content}}</p>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#subkomentar{{$key->id}}">Reply</a>
                                </div>
                            </div>

                                @foreach(Setting::SubKomentar($row['id'],$key->id) as $val)
                                    <div class="blog__details__comment__item blog__details__comment__item--reply">
                                        <div class="blog__details__comment__item__pic">
                                            <img src="{{url('web/img/profile/'.rand(1,15).'.jpg')}}" style="width: 50px;height:50px;border-radius:50px" alt="">
                                        </div>
                                        <div class="blog__details__comment__item__text">
                                            <span>{{Setting::blogDate($val->created_at)}}</span>
                                            <h5>{{$val->name}}</h5>
                                            <p>{{$val->content}}</p>
    
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#subkomentar{{$key->id}}">Reply</a>
                                        </div>
                                    </div>

                                @endforeach

                                <div class="modal fade" id="subkomentar{{$key->id}}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <form action="{{url('subkomentar')}}" method="post">
                                        @csrf
                                    <div class="modal-content bg-secondary">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">komentar</h5>
                                        </div>
                                        <div class="modal-body">
                                        
                                        <input type="hidden" name="id_komentar" value="{{$key->id}}">
                                        <input type="hidden" name="id_artikel" value="{{$row['id']}}">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Name</label>
                                                <input type="text" id="nameBasic" name="name" class="form-control" required required placeholder="Enter name" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Comment</label>
                                                <textarea class="form-control" placeholder="Leave a comment here" id="content" required name="content" style="height: 150px;"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-danger">Save</button>
                                        </div>
                                    </div>
                                    </form>
                                    </div>
                                </div>


                            @endforeach

                        </div>
                        <div class="blog__details__form">
                            <h4>Leave A Commnet</h4>
                            <form action="{{url('komentar')}}" method="post">
                                @csrf
                                <input type="hidden" name="id_artikel" value="{{$row['id']}}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Name" name="name" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Message" name="content" required></textarea>
                                        <button type="submit" class="site-btn">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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