<x-app-layout>
    <div class="content-body" style="min-height: 1092px;">
        <div class="container-fluid">

            <div class="row page-titles">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">About Us</li>
                    <a href="{{ route('about-us.create') }}" class="btn btn-primary"
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                                    @if ($data->isEmpty())
                                        <p>No Data found.</p>
                                    @else
                                        {{-- <div id="example3_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="" placeholder=""
                                                aria-controls="example3"></label></div> --}}

                                        <table id="example3" class="display dataTable no-footer"
                                            style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                            <thead>

                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Name: activate to sort column ascending"
                                                        style="width: 170.422px;">Title</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Department: activate to sort column ascending"
                                                        style="width: 203.75px;">subTitle</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Gender: activate to sort column ascending"
                                                        style="width: 77.6406px;">Image</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 74.6406px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($data as $item)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ $item->sub_title }}</td>
                                                        <td>{{ $item->description }}</td>
                                                        <td class="sorting_1"><img class="rounded-circle" width="35"
                                                            src="{{ asset('storage/app/public/' . $item->image) }}"
                                                            alt=""></td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ route('about-us.edit',['aboutUs' =>$item->id]) }}"
                                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                        class="fas fa-pencil-alt"></i></a>
                                                                <a href="{{ route('about-us.destroy',['aboutUs'=> $item->id]) }}"
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
