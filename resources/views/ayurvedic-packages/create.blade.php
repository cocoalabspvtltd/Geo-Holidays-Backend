<x-app-layout>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>

                </ol>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('ayurvedic_packages.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="enter the name"
                                            name="title" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Sub-Title</label>
                                        <input type="text" class="form-control" placeholder="total amount"
                                            name="sub_title" required>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Description</label>
                                        <div class="custom-ekeditor">
                                            <input type="hidden" id="ckeditor-highlight-input1" name="description"
                                                required>
                                            <div id="ckeditor-description"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Activity Details</label>
                                        <div class="custom-ekeditor">
                                            <input type="hidden" id="ckeditor-highlight-input2" name="activity_details"
                                                required>
                                            <div id="ckeditor-activity-details"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Treatments</label>
                                        <div class="custom-ekeditor">
                                            <input type="hidden" id="ckeditor-highlight-input3" name="treatments"
                                                required>
                                            <div id="ckeditor-treatments"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-2">
                                        <label class="form-label">Upload Picture</label>
                                        <input type="file" class="form-control" name="image" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
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
                document.getElementById('ckeditor-highlight-input1').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#ckeditor-activity-details'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.getElementById('ckeditor-highlight-input2').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#ckeditor-treatments'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.getElementById('ckeditor-highlight-input3').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>

