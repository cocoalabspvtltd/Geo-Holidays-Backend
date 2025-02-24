<x-app-layout>
    <div class="content-body" style="min-height: 1092px;">
        <div class="container-fluid">
            <div class="row page-titles">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">Terms and Conditions</li>

                    {{-- <a href="{{ route('package_gallery_banner.edit') }}" class="btn btn-primary"
                        style=";margin-top: 22px;">Edit Banner</a> --}}
                </ul>
            </div>
            <div>
                @if ($data->isEmpty())
                    <p>No Data found.</p>
                @else

                        @forelse ($data as $item)
                            <p>{!! $item->description !!}</p>
                        @empty
                        @endforelse

                        <a href="{{ route('social-media.create') }}" class="btn btn-primary"
                            >Edit</a>

                @endif
            </div>




        </div>
    </div>
</x-app-layout>
