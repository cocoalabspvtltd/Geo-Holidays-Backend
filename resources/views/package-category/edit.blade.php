<x-app-layout>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>

                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('category.update',['packageCategory'=> $packageCategory->id ]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="enter the name" name="name" value="{{ $packageCategory->name }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control form-control-rounded" id="description" name="description" placeholder="Enter Description">{{ $packageCategory->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Upload Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-file-input form-control" name="image" value="{{ $packageCategory->image }}">
                                            <img src="{{ asset('storage/app/public/'.$packageCategory->image )}}" alt="">
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
                .catch(error => {
                    console.error(error);
                });
        });

        function previewImage(event) {
            var imagePreview = document.getElementById('image_preview');
            var reader = new FileReader();
            reader.onload = function() {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</x-app-layout>
