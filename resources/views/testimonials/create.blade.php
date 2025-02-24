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
                                <form action="{{ route('testimonials.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Enter the title" name="title">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Sub Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Enter the sub title" name="sub_title">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <div class="custom-ekeditor">
                                                <input type="hidden" id="ckeditor-description-input" name="description"
                                                    required>
                                                <div id="ckeditor-description"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">User Details</label>
                                        <div class="col-sm-9">
                                            <div id="userDetailsContainer">
                                                <div class="user-details-entry mb-3">
                                                    <input type="text" class="form-control mb-2" placeholder="Name" name="user_name" required>
                                                    <input type="file" class="form-file-input form-control mb-2" name="user_image" required>
                                                    <input type="text" class="form-control mb-2" placeholder="Designation" name="user_designation" required>
                                                    <button type="button" class="btn btn-danger remove-user-detail">Remove</button>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
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

        document.getElementById('addUserDetailButton').addEventListener('click', function() {
            const container = document.getElementById('userDetailsContainer');
            const index = container.children.length;
            const entry = document.createElement('div');
            entry.className = 'user-details-entry mb-3';
            entry.innerHTML = `
                <input type="text" class="form-control mb-2" placeholder="Name" name="user_details[${index}][name]" required>
                <input type="file" class="form-file-input form-control mb-2" name="user_details[${index}][image]" required>
                <input type="text" class="form-control mb-2" placeholder="Designation" name="user_details[${index}][designation]" required>
                <button type="button" class="btn btn-danger remove-user-detail">Remove</button>
            `;
            container.appendChild(entry);
        });

        document.addEventListener('click', function(event) {
            if (event.target && event.target.className.includes('remove-user-detail')) {
                event.target.parentElement.remove();
            }
        });
    </script>
</x-app-layout>
