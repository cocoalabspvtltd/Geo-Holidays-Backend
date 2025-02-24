<x-app-layout>
    <div class="content-body" style="min-height: 1092px;">
        <div class="container-fluid">

            <div class="row page-titles">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Gallery</li>
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary"
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
                                    @if ($gallery->isEmpty())
                                        <p>No Data found.</p>
                                    @else
                                        @forelse ($gallery as $item)
                                            <div class="gallery">
                                                <a target="_blank" href="img_5terre.jpg">
                                                    <img src="{{ asset('storage/app/public/images' . $item->image) }}"
                                                        alt="Cinque Terre" width="600" height="400">
                                                </a>

                                            </div>

                                        @empty
                                        @endforelse

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
