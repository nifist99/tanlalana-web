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
                <form method="POST" action="{{url('update/artikel-content')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$row->id}}">

                    <div class="row mb-3">
                        <textarea id="content" style="height: 800px!important" name="content">@php echo $row->content; @endphp</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>

        @push('js')

            <script 
                src="https://cdn.tiny.cloud/1/ekw4piuyytb5ihxubs6ysqz2204zzggnnhkts5sqrmqvu1nk/tinymce/6/tinymce.min.js"
                referrerpolicy="origin">
            </script>

            <script>
                
                tinymce.init({
                    selector: 'textarea#content',
                    plugins: 'image code',
                    toolbar: 'undo redo | link image | code',

                    image_title: true,

                    automatic_uploads: true,

                    file_picker_types: 'image',

                    file_picker_callback: (cb, value, meta) => {
                        const input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');

                        input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
         
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            cb(blobInfo.blobUri(), { title: file.name });
                        });
                        reader.readAsDataURL(file);
                        });

                        input.click();
                    },
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
                    });

            </script>
        @endpush
        
@endsection