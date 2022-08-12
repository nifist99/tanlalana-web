@extends('tema.content')
@section('content')

    @include('admin.artikel.management.tema')

        <div class="col-sm-12">
            <div class="bg-secondary rounded h-100 p-4">
                <a href="{{url('create/komentar/'.Crypt::encryptString($row->id))}}" class="btn btn-sm btn-primary m-2"><i class="fa fa-plus-circle"></i> Create Data</a>
                <a href="{{url('komentar/'.Crypt::encryptString($row->id))}}" class="btn btn-sm btn-light m-2"><i class="fa fa-book"></i> Refresh Data</a>
            </div>
        </div>

        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Content</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $key)
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{$key->name}}</td>
                                    <td>{{$key->content}}</td>
                                    <td>
                                        <a href="{{url('edit/komentar/'.Crypt::encryptString($row->id).'/'.Crypt::encryptString($key->id))}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" onclick="hapus({{$key->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        <a class="btn btn-success btn-sm" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#subkomentar{{$key->id}}"><i class="fa fa-book"></i></a>
                                    </td>
                                </tr>
                                        <!-- Modal -->
                                    <div class="modal fade" id="subkomentar{{$key->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <form action="{{url('store/subkomentar')}}" method="post">
                                            @csrf
                                        <div class="modal-content bg-secondary">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">{{$name}}</h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>
                                            </div>
                                            <div class="modal-body">
                                            
                                            <input type="hidden" name="id_komentar" value="{{$key->id}}">
                                            <input type="hidden" name="id_artikel" value="{{$row->id}}">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBasic" class="form-label">Name</label>
                                                    <input type="text" id="nameBasic" name="name" class="form-control" required placeholder="Enter name" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBasic" class="form-label">Comment</label>
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="content" name="content" style="height: 150px;"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-danger">Save</button>
                                            </div>
                                        </div>
                                        </form>
                                        </div>
                                    </div>

                                @foreach(Setting::SubKomentar($row->id,$key->id) as $val)
                                    <tr>
                                        <td colspan="2"></td>
                                        <td>{{$val->created_at}}</td>
                                        <td>({{$val->name}})&nbsp;{{$val->content}}</td>
                                    </tr>
                                @endforeach

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
                        location.href="{{url('delete/komentar')}}/"+id; 
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