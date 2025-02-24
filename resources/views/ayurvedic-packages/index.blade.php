<x-app-layout>
    <div class="content-body" style="min-height: 1092px;">
        <div class="container-fluid">

            <div class="row page-titles">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Ayurvedic Packages</li>
                    <a href="{{ route('ayurvedic_packages.create') }}" class="btn btn-primary"
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
                                    
                                    <table id="example3" class="display dataTable no-footer" style="min-width: 845px"
                                        role="grid" aria-describedby="example3_info">
                                        <thead>

                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example3"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label=": activate to sort column descending"
                                                    style="width: 49.0469px;"></th>
                                                <th class="sorting" tabindex="0" aria-controls="example3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Name: activate to sort column ascending"
                                                    style="width: 170.422px;">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="example3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Department: activate to sort column ascending"
                                                    style="width: 203.75px;">Description</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Department: activate to sort column ascending"
                                                    style="width: 203.75px;">SubTitle</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Department: activate to sort column ascending"
                                                    style="width: 203.75px;">Activity Details</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Department: activate to sort column ascending"
                                                    style="width: 203.75px;">Treatments</th>
                                                <th class="sorting" tabindex="0" aria-controls="example3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending"
                                                    style="width: 74.6406px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $task)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><img class="rounded-circle" width="35"
                                                            src="{{ asset('storage/app/public/'.$task->image)}}"
                                                            alt=""></td>
                                                    <td>{{ $task->title }}</td>
                                                    <td>{!! Str::limit($task->description, 100) !!}</td>
                                                    <td>{{ $task->sub_title }}</td>
                                                    <td>{!! Str::limit($task->activity_details, 100) !!}</td>
                                                    <td>{!! Str::limit($task->treatments, 100) !!}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="{{ route('ayurvedic_packages.edit',$task->id) }}"
                                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                            <a href="{{ route('ayurvedic_packages.destroy',$task->id) }}"
                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <!-- Display message if no uncompleted tasks -->
                                                <tr>
                                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400" colspan="2">
                                                        No data can be shown.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
