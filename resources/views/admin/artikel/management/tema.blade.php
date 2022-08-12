
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{$link}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$sublink}}</li>
    </ol>
  </nav>

  <div>
    <a title="Return" href="{{url('artikel')}}">
        <i class="fa fa-arrow-left"></i>
        &nbsp; Back To List Data
    </a>
</div>

<div class="col-sm-12">
    <div class="card bg-dark text-white">
        <img src="{{url('assets/img/back.jpg')}}" class="card-img" height="450px" alt="...">
        <div class="card-img-overlay">
            <div class="text-center">
                <h5 class="card-title">{{$row->judul}}</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text">date : {{$row->created_at}}</p>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="m-n2">
            <a href="{{url('create/artikel')}}" class="btn btn-sm btn-primary m-2">Performance</a>
            <a href="{{url('create/artikel')}}" class="btn btn-sm btn-outline-primary m-2">Link Download</a>
            <a href="{{url('create/artikel')}}" class="btn btn-sm btn-outline-primary m-2">Komentar</a>
        </div>
    </div>
</div>