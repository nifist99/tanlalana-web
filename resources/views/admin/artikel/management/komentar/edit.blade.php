@extends('tema.content')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{$link}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$sublink}}</li>
    </ol>
  </nav>

  <div>
    <a title="Return" href="{{url('komentar/'.Crypt::encryptString($row->id))}}">
        <i class="fa fa-arrow-left"></i>
        &nbsp; Back To List Data
    </a>
</div>

<div class="col-sm-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">{{$name}}</h6>
        <form method="POST" action="{{url('update/komentar')}}">
            @csrf
            <input type="hidden" name="id" value="{{$key->id}}">
            <input type="hidden" name="id_artikel" value="{{$row->id}}">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{$key->name}}" id="inputEmail3" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="content" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="content" value="{{$key->content}}" id="content" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@endsection