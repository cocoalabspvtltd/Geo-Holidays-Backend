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
                                <form action="{{ route('flash-message.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="enter the title" name="title">
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
</x-app-layout>
