<x-app-layout>
    <div class="content-body" style="min-height: 1092px;">
        <div class="container-fluid">
            <div class="row page-titles">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">Disclaimer</li>
                    <a href="{{ route('disclaimer.create') }}" class="btn btn-primary"
                    style="margin-left: 88%;margin-top: -40px;">Add +</a>
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
