<x-app-layout>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>

                </ol>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('tour.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="enter the name"
                                            name="title">
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Rate</label>
                                        <input type="text" class="form-control" placeholder="total amount"
                                            name="package_rate">
                                        @if ($errors->has('package_rate'))
                                            <span class="text-danger">{{ $errors->first('package_rate') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Description</label>
                                        <div class="custom-ekeditor">
                                            <input type="hidden" id="ckeditor-description-input" name="description">
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                            <div id="ckeditor"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-2">
                                        <label class="form-label">Day Count</label>
                                        <input type="number" class="form-control" name="day_count">
                                        @if ($errors->has('day_count'))
                                            <span class="text-danger">{{ $errors->first('day_count') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label class="form-label">Night Count</label>
                                        <input type="number" class="form-control" name="night_count">
                                        @if ($errors->has('night_count'))
                                            <span class="text-danger">{{ $errors->first('night_count') }}</span>
                                        @endif
                                    </div>


                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Category</label>
                                        <select id="inputState" class="default-select form-control wide"
                                            name="package_category_id">
                                            <option selected="">Choose...</option>
                                            <option value="1">International</option>
                                            <option value="2">Domestic</option>
                                        </select>
                                        @if ($errors->has('category'))
                                            <span class="text-danger">{{ $errors->first('category') }}</span>
                                        @endif
                                    </div>


                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Highlights</label>
                                        <div class="custom-ekeditor">
                                            <input type="hidden" id="ckeditor-highlights-input" name="highlights">
                                            @if ($errors->has('highlights'))
                                                <span class="text-danger">{{ $errors->first('highlights') }}</span>
                                            @endif
                                            <div id="ckeditor-highlights"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Inclusion</label>
                                        <div class="custom-ekeditor">
                                            <input type="hidden" id="ckeditor-inclusion-input" name="inclusion">
                                            @if ($errors->has('inclusion'))
                                                <span class="text-danger">{{ $errors->first('inclusion') }}</span>
                                            @endif
                                            <div id="ckeditor-inclusion"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Exclusion</label>
                                        <div class="custom-ekeditor">
                                            <input type="hidden" id="ckeditor-exclusion-input" name="exclusion">
                                            @if ($errors->has('exclusion'))
                                                <span class="text-danger">{{ $errors->first('exclusion') }}</span>
                                            @endif
                                            <div id="ckeditor-exclusion"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-2">
                                        <label class="form-label">Upload Picture</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
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
        .create(document.querySelector('#ckeditor'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.getElementById('ckeditor-description-input').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#ckeditor-highlights'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.getElementById('ckeditor-highlights-input').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#ckeditor-inclusion'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.getElementById('ckeditor-inclusion-input').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });

    // Initialize CKEditor for Exclusion
    ClassicEditor
        .create(document.querySelector('#ckeditor-exclusion'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.getElementById('ckeditor-exclusion-input').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>
