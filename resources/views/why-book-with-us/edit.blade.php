<x-app-layout>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Update Details</a></li>

                </ol>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="card">

                        <div class="card-body">
                            <div class="basic-form">
                                <form
                                    action="{{ route('Why-book-with-us.update', ['whyBookWithUS' => $whyBookWithUS->id]) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="enter the title"
                                                name="title" value="{{ $whyBookWithUS->title }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control form-control-rounded" id="description" name="description" placeholder="Enter Description">{{ $whyBookWithUS->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Icon Image</label>
                                        @if ($whyBookWithUS->description)
                                            <div class="col-sm-9">
                                                <img src="{{ asset('storage/' . $whyBookWithUS->description) }}"
                                                    alt="{{ $whyBookWithUS->title }}" width="150">
                                                <br>
                                                <button type="button" class="btn btn-warning btn-round mt-2"
                                                    onclick="document.getElementById('icon_image').click();">Update
                                                    Image</button>
                                                <input type="file" class="form-control d-none" id="icon_image"
                                                    name="icon_image">
                                            </div>
                                        @else
                                            <input type="file" class="form-control" id="icon_image" name="icon_image"
                                                onchange="previewImage(event)">
                                            <br>
                                            <img id="image_preview" style="max-width: 200px; display: none;">
                                        @endif

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
