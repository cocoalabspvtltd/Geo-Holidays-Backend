<x-app-layout>
    <div class="content-body" style="min-height: 1092px;">
        <div class="container-fluid">
            <div class="row page-titles">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><strong>{{ $banner->title }}</strong></li>
                    <li>{{ $banner->description }}</li><br>
                    <a href="{{ route('package_gallery_banner.edit') }}" class="btn btn-primary"
                        style=";margin-top: 22px;">Edit Banner</a>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
