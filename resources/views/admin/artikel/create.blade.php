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
                <form method="POST" action="{{url('store/artikel')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="judul" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_kategori_artikel" class="col-sm-2 col-form-label">Kategori Artikel</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="id_kategori_artikel"
                                aria-label="Kategori Artikel" name="id_kategori_artikel" required>
                                <option selected>Open this select menu</option>
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
                        <div class="col-sm-10">
                            <input class="form-control bg-dark" type="file" id="file" name="foto" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="content" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea id="content" name="content"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="url_video" class="col-sm-2 col-form-label">Url video</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="url_video" id="url_video" placeholder="url_video" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

        @push('js')
            <script>
                $(document).ready(function() {
                    $('.js-example-basic-single').select2();
                });
            </script>

            <script 
                src="https://cdn.tiny.cloud/1/ekw4piuyytb5ihxubs6ysqz2204zzggnnhkts5sqrmqvu1nk/tinymce/6/tinymce.min.js"
                referrerpolicy="origin">
            </script>

            <script>
                
                tinymce.init({
                    selector: 'textarea#content',
                    plugins: 'image code',
                    toolbar: 'undo redo | link image | code',
                    /* enable title field in the Image dialog*/
                    image_title: true,
                    /* enable automatic uploads of images represented by blob or data URIs*/
                    automatic_uploads: true,
                    /*
                        URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                        images_upload_url: 'postAcceptor.php',
                        here we add custom filepicker only to Image dialog
                    */
                    file_picker_types: 'image',
                    /* and here's our custom image picker*/
                    file_picker_callback: (cb, value, meta) => {
                        const input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');

                        input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
                            /*
                            Note: Now we need to register the blob in TinyMCEs image blob
                            registry. In the next release this part hopefully won't be
                            necessary, as we are looking to handle it internally.
                            */
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
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