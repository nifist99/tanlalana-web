@extends('tema.content')
@section('content')

@push('css')
    <style>
          .card {
            flex-direction: row;
            align-items: center;
          }
          .card-title {
            font-weight: bold;
          }
          .card img {
            width: 30%;
            border-top-right-radius: 0;
            border-bottom-left-radius: calc(0.25rem - 1px);
          }
          @media only screen and (max-width: 768px) {
            a {
              display: none;
            }
            .card-body {
              padding: 0.5em 1.2em;
            }
            .card-body .card-text {
              margin: 0;
            }
            .card img {
              width: 50%;
            }
          }
          @media only screen and (max-width: 1200px) {
            .card img {
              width: 40%;
            }
          }
    </style>
@endpush

        <div class="col-sm-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="m-n2">
                    <a href="{{url('create/artikel')}}" class="btn btn-sm btn-primary m-2"><i class="fa fa-plus-circle"></i> Create Data</a>
                    <a href="{{url('artikel')}}" class="btn btn-sm btn-light m-2"><i class="fa fa-book"></i> Refresh Data</a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">{{$name}}</h6>
              
                    @foreach($list as $row)
                    <div class="col-12 mt-3">
                        <div class="card bg-dark">
                            <img src="{{url('storage/'.$row->foto)}}" class="card-img-top" />
                            <div class="card-body">
                              <h5 class="card-title">{{$row->judul}}</h5>
                              <p class="card-text">
                                created by : {{$row->users}}  date : {{$row->created_at}}
                              </p>
                              <a href="{{url('management/'.Crypt::encryptString($row->id))}}" class="btn btn-sm btn-light"><i class="fa fa-book"></i> Management Artikel</a>
                              <a href="{{url('edit-content/artikel/'.Crypt::encryptString($row->id))}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit Content</a>
                              <a href="{{url('detail/artikel/'.Crypt::encryptString($row->id))}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                              <a href="{{url('edit/artikel/'.Crypt::encryptString($row->id))}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                              <a href="javascript:void(0)" onclick="hapus({{$row->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    
                            </div>
                          </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $list->links() }}
                </div>
            </div>

@push('js')
    <script>
        function hapus(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't delete this data",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#696cff',
                cancelButtonColor: '#ff3e1d',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    location.href="{{url('delete/artikel')}}/"+id; 
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
            }
    </script>
@endpush

@endsection