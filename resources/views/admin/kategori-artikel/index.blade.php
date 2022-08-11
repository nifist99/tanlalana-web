@extends('tema.content')
@section('content')


        <div class="col-sm-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="m-n2">
                    <a href="{{url('create/kategori-artikel')}}" class="btn btn-sm btn-primary m-2"><i class="fa fa-plus-circle"></i> Create Data</a>
                    <a href="{{url('kategori-artikel')}}" class="btn btn-sm btn-light m-2"><i class="fa fa-book"></i> Refresh Data</a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">{{$name}}</h6>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $row)
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$row->name}}</td>
                                    <td>
                                        <a href="{{url('edit/kategori-artikel/'.Crypt::encryptString($row->id))}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" onclick="hapus({{$row->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $list->links() }}
                </div>
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
                    location.href="{{url('delete/kategori-artikel')}}/"+id; 
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