<x-app-layout>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('blogs.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="enter the title" name="title">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea id="description" name="description" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Upload Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-file-input form-control" name="image" id="imageUpload">
                                            <div id="imagePreviewContainer" class="mt-3">
                                                <img id="imagePreview" src="" alt="Image Preview" style="max-width: 50%; display: none;">
                                                <button type="button" id="removeImageButton" class="btn btn-danger mt-2" style="display: none;">Remove Image</button>
                                            </div>
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
<!-- Include CKEditor script -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                const form = document.getElementById('form');
                form.addEventListener('submit', function(event) {
                    const editorData = editor.getData();
                    if (editorData.trim() === '') {
                        alert('Description is required.');
                        event.preventDefault(); // Prevent form submission
                    }
                });
            })
            .catch(error => {
                console.error(error);
            });
    });

    function previewImage(event) {
        var imagePreview = document.getElementById('image_preview');
        var reader = new FileReader();
        reader.onload = function(){
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</x-app-layout>
