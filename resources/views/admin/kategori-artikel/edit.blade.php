@extends('tema.content')
@section('content')

<div>
    <a title="Return" href="{{url('kategori-artikel')}}">
        <i class="fa fa-arrow-left"></i>
        &nbsp; Back To List Data
    </a>
</div>

<div class="col-sm-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">{{$name}}</h6>
        <form method="POST" action="{{url('update/kategori-artikel')}}">
            @csrf
            <input type="hidden" name="id" value="{{$row->id}}">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{$row->name}}" id="inputEmail3">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>

@endsection