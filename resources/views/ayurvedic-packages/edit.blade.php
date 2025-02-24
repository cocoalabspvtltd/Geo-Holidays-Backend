<x-app-layout>
    <div class="content-body" style="min-height: 1092px;">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Update Data</a></li>

                </ol>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('ayurvedic_packages.index') }}"><i
                        class="fa fa-arrow-left"></i>
                    Back</a>
            </div>

            <form action="{{ route('ayurvedic_packages.update',['ayurvedicPackages' =>$ayurvedicPackages->id] ) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="inputName" class="form-label"><strong>Title</strong></label>
                        <input type="text" name="title" value="{{ $ayurvedicPackages->title }}"  class="form-control" id="inputName" placeholder="Name">
                        @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="inputName" class="form-label"><strong>Sub-Title</strong></label>
                        <input type="text" name="sub_title" value="{{ $ayurvedicPackages->sub_title }}"  class="form-control" id="inputName" placeholder="Sub title">
                        @error('sub_title')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Description</label>
                        <div class="custom-ekeditor">
                            <input type="hidden" id="ckeditor-description-input" name="description" required>
                            <div id="ckeditor-description">{{ $ayurvedicPackages->description }}</div>
                        </div>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Activity Details</label>
                        <div class="custom-ekeditor">
                            <input type="hidden" id="ckeditor-activity_details-input" name="activity_details" required>
                            <div id="ckeditor-activity-details">{{ $ayurvedicPackages->activity_details }}</div>
                        </div>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Treatments</label>
                        <div class="custom-ekeditor">
                            <input type="hidden" id="ckeditor-treatments-input" name="treatments" required>
                            <div id="ckeditor-treatments">{{ $ayurvedicPackages->treatments }}</div>
                        </div>
                    </div>

                    <div class="mb-3 col-md-2">
                        <label class="form-label">Upload Picture</label>
                        <input type="file" class="form-control" name="image" value="{{ $ayurvedicPackages->image }}">
                        <img src="{{asset('storage/app/public/'.$ayurvedicPackages->image)}}" alt="">
                    </div>

                </div>

                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            </form>

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

    ClassicEditor
        .create(document.querySelector('#ckeditor-activity-details'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.getElementById('ckeditor-activity_details-input').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#ckeditor-treatments'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.getElementById('ckeditor-treatments-input').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>
