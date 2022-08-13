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
                <h6 class="mb-4">{{$name}}</h6>
                <form method="POST" action="{{url('update/artikel')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$row->id}}">
                    <div class="row mb-3">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$row->judul}}"  name="judul" id="judul" placeholder="judul" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal" value="{{$row->tanggal}}" id="tanggal" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_kategori_artikel" class="col-sm-2 col-form-label">Kategori Artikel</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="id_kategori_artikel"
                                aria-label="Kategori Artikel" name="id_kategori_artikel" required>
                                <option selected value="{{$kategori->id}}">{{$kategori->name}}</option>
                                @foreach ($list as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="status"
                                aria-label="status" name="status" required>
                                <option selected value="publish">publish</option>
                                <option value="unpublish">unpublish</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        @if($row->foto)
                            <div class="col-sm-10">
                                <img class="mb-3" src="{{url('storage/'.$row->foto)}}" width="200px" height="auto" alt="">
                                <input class="form-control bg-dark" type="file" id="file" name="foto">
                            </div>
                            
                        @else
                            <div class="col-sm-10">
                                <input class="form-control bg-dark" type="file" id="file" name="foto">
                            </div>
                        @endif
                    </div>

                    <div class="row mb-3">
                        <label for="url_video" class="col-sm-2 col-form-label">Url video</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$row->url_video}}" name="url_video" id="url_video" placeholder="url video">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>

        
@endsection