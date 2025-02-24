<x-app-layout>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Update</a></li>

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
                            <form action="{{ route('office.update',['office' => $office->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="enter the email id"
                                            name="email">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Address</label>
                                        <div class="col-sm-9">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                                <textarea class="form-control" rows="4" id="comment" name="address"></textarea>
                                            </div>
                                    </div>

                                    <div class="mb-3 col-md-2">
                                        <label class="form-label">Contact NUmber</label>
                                        <input type="text" class="form-control" name="contact_number">
                                        @if ($errors->has('contact_number'))
                                            <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Office Type</label>
                                        <select id="inputState" class="default-select form-control wide"
                                            name="office_type">
                                            <option selected="">Choose...</option>
                                            <option value="headquarters">Headquarters</option>
                                            <option value="branch">Branch</option>
                                        </select>
                                        @if ($errors->has('office_type'))
                                            <span class="text-danger">{{ $errors->first('office_type') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-2">
                                        <label class="form-label">Location Link</label>
                                        <input type="text" class="form-control" name="location_link">
                                        @if ($errors->has('location_link'))
                                            <span class="text-danger">{{ $errors->first('location_link') }}</span>
                                        @endif
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


