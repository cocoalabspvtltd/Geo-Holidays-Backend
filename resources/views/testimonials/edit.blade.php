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
                                <form action="{{ route('testimonials.update', ['testimonial' => $testimonial->id]) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control form-control-rounded" id="description" name="description" placeholder="Enter Description">{{ $testimonial->description }}</textarea>
                                        </div>
                                    </div>

                                     <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">User Details</label>
                                        <div class="col-sm-9">
                                            <div id="userDetailsContainer">
                                                <div class="user-details-entry mb-3">
                                                    <input type="text" class="form-control mb-2" placeholder="Name"
                                                        name="user_name" value="{{ $testimonial->user_name }}" required>
                                                    <input type="text" class="form-control mb-2"
                                                        placeholder="Designation" name="user_designation"
                                                        value="{{ $testimonial->user_designation }}" required>

                                                    @if ($testimonial->user_image)
                                                        <img src="{{ asset('storage/app/public/' . $testimonial->user_image) }}"
                                                            alt="{{ $testimonial->user_image }}"
                                                            style="max-width: 80px; display: block; margin-top: 10px;">

                                                        <!-- Update Image Button -->
                                                        <button type="button" id="updateImageButton"
                                                            class="btn btn-primary mt-2">Update Image</button>

                                                        <!-- File input will be hidden initially -->
                                                        <input type="file" id="imageInput"
                                                            class="form-file-input form-control mb-2" name="user_image"
                                                            style="display: none;" onchange="previewImage(event)">
                                                    @else
                                                        <input type="file" class="form-file-input form-control mb-2"
                                                            name="user_image">
                                                    @endif
                                                    <!-- Image Preview -->
                                                    <img id="imagePreview"
                                                        style="max-width: 80px; display: none; margin-top: 10px;">


                                                </div>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        });



        document.getElementById('imageUpload').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const image = document.getElementById('imagePreview');
                    image.src = event.target.result;
                    image.style.display = 'block';
                    document.getElementById('removeImageButton').style.display = 'inline-block';
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('removeImageButton').addEventListener('click', function() {
            const imageInput = document.getElementById('imageUpload');
            imageInput.value = '';
            document.getElementById('imagePreview').style.display = 'none';
            this.style.display = 'none';
        });



        document.addEventListener('click', function(event) {
            if (event.target && event.target.className.includes('remove-user-detail')) {
                event.target.parentElement.remove();
            }
        });
    </script>

    <script>
        // When Update Image button is clicked, show the file input
        document.getElementById('updateImageButton')?.addEventListener('click', function() {
            document.getElementById('imageInput').click();
        });

        // Preview the selected image
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                    document.getElementById('currentImage').style.display = 'none'; // Hide current image if present
                }
                reader.readAsDataURL(file);
            }
        }
    </script>

</x-app-layout>
