<x-app-layout>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Details</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('home-slider.update',['homeSlider'=> $homeSlider->id]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="enter the title" name="title" value="{{ $homeSlider->title}}">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">SubTitle</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="enter the sub_title" name="sub_title" value="{{ $homeSlider->sub_title}}">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Upload Image</label>
                                        <div class="col-sm-9">
                                            <!-- Display the current image if it exists -->
                                            @if(isset($homeSlider) && $homeSlider->image)
                                                <div id="currentImageContainer" class="mb-3">
                                                    <img src="{{ asset('storage/' . $homeSlider->image) }}" alt="Current Image" style="max-width: 50%;">
                                                    <button type="button" id="updateImageButton" class="btn btn-primary mt-2">Update Image</button>
                                                </div>
                                            @endif

                                            <!-- Image Upload and Preview -->
                                            <input type="file" class="form-file-input form-control" name="image" id="imageUpload" style="display: none;">
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

    <script>
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
    </script>
</x-app-layout>
