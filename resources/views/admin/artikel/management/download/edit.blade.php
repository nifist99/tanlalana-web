@extends('tema.content')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{$link}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$sublink}}</li>
    </ol>
  </nav>

  <div>
    <a title="Return" href="{{url('download/'.Crypt::encryptString($row->id))}}">
        <i class="fa fa-arrow-left"></i>
        &nbsp; Back To List Data
    </a>
</div>

<div class="col-sm-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">{{$name}}</h6>
        <form method="POST" action="{{url('update/download')}}">
            @csrf
            <input type="hidden" name="id" value="{{$key->id}}">
            <input type="hidden" name="id_artikel" value="{{$row->id}}">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$key->name}}" name="name" id="inputEmail3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="link" class="col-sm-2 col-form-label">Link</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$key->link}}" name="link" id="link">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection