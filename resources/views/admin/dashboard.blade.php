@include('admin.inc.header')


            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Analytics</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">TAU PLAY</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div><!--end col-->
                                    <div class="col-auto align-self-center">
                                        <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                            <span class="ay-name" id="Day_Name">Today:  {{ date('M j', strtotime(now())) }}</span>&nbsp;
                                            <span class="" id="Select_date"></span>
                                            <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                                        </a>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-6">
                                    <div class="card report-card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="text-dark mb-0 font-weight-semibold">Categories</p>
                                                    <h3 class="m-0">{{ count($categories) }}</h3>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-light-alt">
                                                        <i data-feather="layers" class="align-self-center text-muted icon-sm"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div> <!--end col-->
                                <div class="col-md-6 col-lg-6">
                                    <div class="card report-card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="text-dark mb-0 font-weight-semibold">Channels</p>
                                                    <h3 class="m-0">{{ count($channels) }}</h3>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-light-alt">
                                                        <i data-feather="grid" class="align-self-center text-muted icon-sm"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div> <!--end col-->
                            </div><!--end row-->
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Audience Overview</h4>
                                        </div><!--end col-->
                                        <div class="col-auto">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   This Year<i class="las la-angle-down ml-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Today</a>
                                                    <a class="dropdown-item" href="#">Last Week</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                    <a class="dropdown-item" href="#">This Year</a>
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                    </div>  <!--end row-->
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="">
                                        <div id="ana_dash_1" class="apex-charts"></div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Sessions Device</h4>
                                        </div><!--end col-->
                                    </div>  <!--end row-->
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="text-center">
                                        <div id="ana_device" class="apex-charts"></div>
                                        <h6 class="bg-light-alt py-3 px-2 mb-0">
                                            <i data-feather="calendar" class="align-self-center icon-xs mr-1"></i>
                                            01 January 2020 to 31 December 2020
                                        </h6>
                                    </div>
                                    <div class="table-responsive mt-2">
                                        <table class="table border-dashed mb-0">
                                            <thead>
                                            <tr>
                                                <th>Device</th>
                                                <th class="text-right">Sassions</th>
                                                <th class="text-right">Day</th>
                                                <th class="text-right">Week</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Dasktops</td>
                                                <td class="text-right">1843</td>
                                                <td class="text-right">-3</td>
                                                <td class="text-right">-12</td>
                                            </tr>
                                            <tr>
                                                <td>Tablets</td>
                                                <td class="text-right">2543</td>
                                                <td class="text-right">-5</td>
                                                <td class="text-right">-2</td>
                                            </tr>
                                            <tr>
                                                <td>Mobiles</td>
                                                <td class="text-right">3654</td>
                                                <td class="text-right">-5</td>
                                                <td class="text-right">-6</td>
                                            </tr>

                                            </tbody>
                                        </table><!--end /table-->
                                    </div><!--end /div-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                    </div><!--end row-->


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Available Channels</h4>
                                        </div><!--end col-->
                                    </div>  <!--end row-->
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="table-responsive browser_users">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-top-0">Channel</th>
                                                    <th class="border-top-0">Image</th>
                                                    <th class="border-top-0">Channel Link</th>
                                                    <th class="border-top-0">Average Views</th>
                                                </tr><!--end tr-->
                                            </thead>
                                            <tbody>
                                                @foreach($channels as $channel)
                                                <tr>
                                                    <td><a href="#" class="text-primary">{{ $channel->channel_name }}</a></td>
                                                    <td><img src="{{ env('IMAGE_URL') }}/{{ $channel->channel_image }}" width="50"/></td>
                                                    <td>{{ $channel->channel_url }}</td>
                                                    <td> 52.80% <i class="fas fa-caret-up text-success font-16"></i></td>
                                                </tr><!--end tr-->
                                                @endforeach
                                            </tbody>
                                        </table> <!--end table-->
                                    </div><!--end /div-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Available Channel Categories</h4>
                                        </div><!--end col-->
                                    </div>  <!--end row-->
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="table-responsive browser_users">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-top-0">Category</th>
                                                    <th class="border-top-0">Channel Count</th>
                                                    <th class="border-top-0">Added Date</th>
                                                </tr><!--end tr-->
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $category)
                                                <tr>
                                                    <td>{{ $category->category_name }}</td>
                                                    <td>{{ count($category->channel) }}</td>
                                                    <td>{{ date('M j Y H:i:A', strtotime($category->created_at)) }}</td>
                                                </tr><!--end tr-->
                                                @endforeach
                                            </tbody>
                                        </table> <!--end table-->
                                    </div><!--end /div-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                    </div><!--end row-->


                </div><!-- container -->

@include('admin.inc.footer')
