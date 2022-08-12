@extends('tema.content')
@section('content')

        <div>
            <a title="Return" href="{{url('artikel')}}">
                <i class="fa fa-arrow-left"></i>
                &nbsp; Back To List Data
            </a>
        </div>

        <div class="col-sm-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="card bg-dark mb-3">
                    <img class="card-img-top" src="{{url('storage/'.$row->foto)}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$row->judul}}</h5>
                      <p class="card-text">
                        @php
                          echo $row->content;
                        @endphp
                      </p>
                      <p>
                        <a href="{{$row->url_video}}">{{$row->url_video}}</a>
                      </p>
                      <p class="card-text"><small class="text-muted">created by : {{$row->users}}  date : {{$row->created_at}}</small></p>
                    </div>
                </div>
            </div>
        </div>

@endsection