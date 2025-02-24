<x-app-layout>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Update</a></li>

                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('services.update', ['service' => $service->id]) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="enter the name"
                                                name="title" value="{{ $service->title }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                        <div class="custom-ekeditor">
                                            <input type="hidden" id="ckeditor-description-input" name="description" value="{{ $service->description }}"
                                                required>
                                            <div id="ckeditor-description">{!! $service->description !!}</div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Upload Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-file-input form-control" name="icon_image"
                                                value="{{ $service->icon_image }}" id="imageInput">
                                            <img src="{{ asset('storage/app/public/' . $service->icon_image) }}"
                                                alt="">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <img id="imagePreview" src="" alt="Image Preview"
                                                style="display: none; max-width: 100px; max-height: 100px;">
                                            <button type="button" id="removeImage" class="btn btn-danger"
                                                style="display: none;">Remove</button>
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor-description'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.getElementById('ckeditor-description-input').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });

    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const removeButton = document.getElementById('removeImage');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                removeButton.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    });

    document.getElementById('removeImage').addEventListener('click', function() {
        const input = document.getElementById('imageInput');
        const preview = document.getElementById('imagePreview');
        const removeButton = document.getElementById('removeImage');

        input.value = '';
        preview.src = '';
        preview.style.display = 'none';
        removeButton.style.display = 'none';
    });
</script>
