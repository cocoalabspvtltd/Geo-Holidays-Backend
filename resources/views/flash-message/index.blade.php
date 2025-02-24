<x-app-layout>
    <div class="content-body" style="min-height: 1092px;">
        <div class="container-fluid">
            <div class="row page-titles">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">Flash Message</li>
                    <a href="{{ route('flash-message.create') }}" class="btn btn-primary"
                    style="margin-left: 88%;margin-top: -40px;">Add +</a>
                </ul>
            </div>
            <div>
                @if ($data->isEmpty())
                    <p>No Data found.</p>
                @else

                        @forelse ($data as $item)
                            <p>{!! $item->title !!}</p>
                            <a href="{{ route('social-media.create') }}" class="btn btn-primary" style="padding: 8px;"
                            >Edit</a>
                        @empty

                        @endforelse


                @endif
            </div>




        </div>
    </div>
</x-app-layout>
