<x-app-layout>
    <div class="content-body" style="min-height: 1092px;">
        <div class="container-fluid">

            <div class="row page-titles">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Testimonials</li>
                    <a href="{{ route('testimonials.create') }}" class="btn btn-primary"
                        style="margin-left: 88%;margin-top: -40px;">Add +</a>
                </ul>

            </div>
            <!-- row -->
            @if (Session::has('notif.success'))
                <div class="bg-blue-300 mt-2 p-4">
                    {{-- if it's there then print the notification --}}
                    <span class="text-white">{{ Session::get('notif.success') }}</span>
                </div>
            @endif
            <div class="row page-titles">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">{{ $banner->title }}</li>
                    <a href="{{ route('testimonial_banner.edit') }}" class="btn btn-primary"
                        style="margin-left: 88%;margin-top: -40px;">Edit</a>
                </ul>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">

                                <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                                    @if ($data->isEmpty())
                                        <p>No Data found.</p>
                                    @else
                                        <table id="example3" class="display dataTable no-footer"
                                            style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                            <thead>

                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Department: activate to sort column ascending"
                                                        style="width: 303.75px;">Description</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Gender: activate to sort column ascending"
                                                        style="width: 300.6406px;">User Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Gender: activate to sort column ascending"
                                                        style="width: 300.6406px;">User Designation</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Gender: activate to sort column ascending"
                                                        style="width: 300.6406px;">User Image</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 74.6406px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($data as $item)
                                                    <tr role="row" class="odd">
                                                        <td>{!! Str::limit($item->description, 40, ' ...') !!}</td>
                                                        <td>{{ $item->user_name}}</td>
                                                        <td>{{ $item->user_designation}}</td>
                                                        <td><img src="{{ asset('storage/' . $item->user_image) }}" alt="{{ $item->user_name}}" style="max-width: 150px;"></td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ route('testimonials.edit',['testimonial'=>$item->id]) }}"
                                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                        class="fas fa-pencil-alt"></i></a>
                                                                <a href="{{ route('testimonials.destroy',['testimonial'=>$item->id]) }}"
                                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                                        class="fa fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <!-- Display message if no uncompleted tasks -->
                                                    <tr>
                                                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"
                                                            colspan="2">
                                                            No data can be shown.
                                                        </td>
                                                    </tr>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
