<x-app-layout>
    <style>
        li.picker-switch.accordion-toggle {
            display: none;
        }
    </style>
    <!--**********************************
 Content body start
***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                @forelse ($contact_details as $data)
                                    <div class="col-xl-6 col-sm-8">
                                        <div class="card booking">
                                            <div class="card-body">
                                                <div class="booking-status d-flex align-items-center">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28"
                                                            height="28" viewBox="0 0 64 64">
                                                            <path fill="var(--primary)"
                                                                d="M8 58V10a2 2 0 012-2h36a2 2 0 012 2v48h-2V10H10v48zm36 0h2v-4H12v4h2v-2h28v2zm4-2h-2V10a4 4 0 00-4-4H10a4 4 0 00-4 4v50h4v2h44V58zm-4-2V22h2v34h-2zm-4 0h-2V26h-2v4h-4V30h-2V26h-2v4h-4V26h-2v4h-4v-4h-2v4h-4v-4h-2v34h24zM26 34h12V30H26v4zm0 8h12V38H26v4zm0 8h12V46H26v4z" />
                                                        </svg>

                                                    </span>
                                                    <div class="ms-4">
                                                        <h2 class="mb-0 font-w600">{{ $data->address }}</h2>
                                                        <p class="mb-0 text-nowrap">{{ $data->email }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse

                                {{-- <div class="col-xl-6 col-sm-8">
                                    <div class="card booking">
                                        <div class="card-body">
                                            <div class="booking-status d-flex align-items-center">
                                                <span>
                                                    <svg id="_009-log-out" data-name="009-log-out"
                                                        xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                        viewBox="0 0 28 28">
                                                        <path data-name="Path 1957"
                                                            d="M151.435,178.842v2.8a5.6,5.6,0,0,1-5.6,5.6h-14a5.6,5.6,0,0,1-5.6-5.6v-16.8a5.6,5.6,0,0,1,5.6-5.6h14a5.6,5.6,0,0,1,5.6,5.6v2.8a1.4,1.4,0,0,1-2.8,0v-2.8a2.8,2.8,0,0,0-2.8-2.8h-14a2.8,2.8,0,0,0-2.8,2.8v16.8a2.8,2.8,0,0,0,2.8,2.8h14a2.8,2.8,0,0,0,2.8-2.8v-2.8a1.4,1.4,0,0,1,2.8,0Zm-10.62-7,1.81-1.809a1.4,1.4,0,1,0-1.98-1.981l-4.2,4.2a1.4,1.4,0,0,0,0,1.981l4.2,4.2a1.4,1.4,0,1,0,1.98-1.981l-1.81-1.81h12.02a1.4,1.4,0,1,0,0-2.8Z"
                                                            transform="translate(-126.235 -159.242)"
                                                            fill="var(--primary)" fill-rule="evenodd" />
                                                    </svg>

                                                </span>
                                                <div class="ms-4">
                                                    <h2 class="mb-0 font-w600">516</h2>
                                                    <p class="mb-0">Check Out</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header border-0 pb-0">
                                            <h4 class="fs-20">Calender</h4>
                                        </div>
                                        <div class="card-body pb-2 loadmore-content" id="BookingContent">
                                            <div class="text-center event-calender  booking-calender">
                                                <input type='text' class="form-control d-none "
                                                    id='datetimepicker1' />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-xl-6">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-header border-0 flex-wrap">
                                                    <h4 class="fs-20">Reservation Stats</h4>
                                                    <div class="card-action coin-tabs">
                                                        <ul class="nav nav-tabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link " data-bs-toggle="tab" href="#Daily1"
                                                                    role="tab">Daily</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link " data-bs-toggle="tab"
                                                                    href="#weekly1" role="tab">Weekly</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-bs-toggle="tab"
                                                                    href="#monthly1" role="tab">Monthly</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body pb-0">
                                                    <div class="d-flex flex-wrap">
                                                        <span class="me-sm-5 me-0 font-w500">
                                                            <svg class="me-1" xmlns="http://www.w3.org/2000/svg"
                                                                width="13" height="13" viewBox="0 0 13 13">
                                                                <rect width="13" height="13" fill="#135846" />
                                                            </svg>

                                                            Check In
                                                        </span>
                                                        <span class="fs-16 font-w600 me-4">23,451 <small
                                                                class="text-success fs-12 font-w400">+0.4%</small></span>
                                                        <span class="me-sm-5 ms-0 font-w500">
                                                            <svg class="me-1" xmlns="http://www.w3.org/2000/svg"
                                                                width="13" height="13" viewBox="0 0 13 13">
                                                                <rect width="13" height="13" fill="#E23428" />
                                                            </svg>
                                                            Check Out
                                                        </span>
                                                        <span class="fs-16 font-w600">20,441</span>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="Daily1">
                                                            <div id="chartBar" class="chartBar"></div>
                                                        </div>
                                                        <div class="tab-pane fade " id="weekly1">
                                                            <div id="chartBar1" class="chartBar"></div>
                                                        </div>
                                                        <div class="tab-pane fade " id="monthly1">
                                                            <div id="chartBar2" class="chartBar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card bg-secondary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-end pb-4 justify-content-between">
                                                        <span class="fs-14 font-w500 text-white">Available Room
                                                            Today</span>
                                                        <span class="fs-20 font-w600 text-white"><span
                                                                class="pe-2"></span>683</span>
                                                    </div>
                                                    <div class="progress default-progress h-auto">
                                                        <div class="progress-bar bg-white progress-animated"
                                                            style="width: 60%; height:13px;" role="progressbar">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card bg-secondary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-end pb-4 justify-content-between">
                                                        <span class="fs-14 font-w500 text-white">Sold Out Room
                                                            Today</span>
                                                        <span class="fs-20 font-w600 text-white"><span
                                                                class="pe-2"></span>156</span>
                                                    </div>
                                                    <div class="progress default-progress h-auto">
                                                        <div class="progress-bar bg-white progress-animated"
                                                            style="width: 30%; height:13px;" role="progressbar">
                                                            <span class="sr-only">30% Complete</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-xl-3 col-sm-3 col-6 mb-4 col-xxl-6">
                                                            <div class="text-center">
                                                                <h3 class="fs-28 font-w600">569</h3>
                                                                <span class="fs-16">Total Concierge</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-sm-3 col-6 mb-4 col-xxl-6">
                                                            <div class="text-center">
                                                                <h3 class="fs-28 font-w600">2,342</h3>
                                                                <span class="fs-16">Total Customer</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-sm-3 col-6 mb-4 col-xxl-6">
                                                            <div class="text-center">
                                                                <h3 class="fs-28 font-w600">992</h3>
                                                                <span class="fs-16">Total Room</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-sm-3 col-6 mb-4 col-xxl-6">
                                                            <div class="text-center">
                                                                <h3 class="fs-28 font-w600">76k</h3>
                                                                <span class="fs-16 wspace-no">Total Transaction</span>
                                                            </div>
                                                        </div>
                                                        <div class="mb-5 mt-4 d-flex align-items-center">
                                                            <div>
                                                                <h4><a href="javascript:void(0);"
                                                                        class="text-secondary">Let Travl Generate Your
                                                                        Annualy Report Easily</a></h4>
                                                                <span class="fs-12">Lorem ipsum dolor sit amet,
                                                                    consectetur adipiscing elit, sed do eiusmod tempor
                                                                    incididunt ut labo
                                                                </span>
                                                            </div>
                                                            <div><a href="javascript:void(0);" class="ms-5"><i
                                                                        class="fas fa-arrow-right fs-20"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="fs-20">Latest Review by Customers</h4>
                                </div>
                                <div class="card-body pt-0">
                                    <div
                                        class="front-view-slider owl-carousel owl-carousel owl-loaded owl-drag owl-dot">
                                        @forelse ($testimonials as $item)
                                        <div class="items">
                                            <div class="customers border">
                                                <p class="fs-16">{!! $item->description !!}</p>
                                                <div class="d-flex justify-content-between align-items-center mt-4">
                                                    <div class="customer-profile d-flex ">
                                                        <img src="" alt="">
                                                        <div class="ms-3">
                                                            <h5 class="mb-0"><a href="javascript:void(0);">{{ $item->user_name }}</a></h5>
                                                            <span>{{ $item->user_designation}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="customer-button text-nowrap">
                                                        <a href="javascript:void(0);"><i
                                                                class="far fa-check-circle text-success"></i></a>
                                                        <a href="javascript:void(0);"><i
                                                                class="far fa-times-circle text-danger"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty

                                        @endforelse

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
 Content body end
***********************************-->


</x-app-layout>
