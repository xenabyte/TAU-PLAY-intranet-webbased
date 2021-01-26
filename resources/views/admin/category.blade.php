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
                            <h4 class="page-title">Categories</h4>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Categories</h4>
                        <hr>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalLogin">
                            Add Category
                        </button>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Channels</th>
                                <th>Added Date</th>
                                <td></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    @if(!empty($category->channel))
                                        @foreach($category->channel as $channel)
                                            <li>{{ $channel->channel_name }} </li>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ date('M j Y H:i A', strtotime($category->created_at)) }}</td>
                                <td>  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#editModalLogin_{{ $category->id }}">
                                    Edit Category
                                </button>

                                <a href="{{ url('/admin/change_category_status') }}/{{$category->id}}" class="btn @if($category->status == 1) btn-warning  @else  btn-success @endif btn-md"> @if($category->status == 1) Deactivate  @else Activate  @endif Category </a>

                                </td>
                            </tr>
                            <div class="modal fade" id="editModalLogin_{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLogin" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Edit Category</h6>
                                            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="la la-times"></i></span>
                                            </button>
                                        </div><!--end modal-header-->
                                        <div class="modal-body">
                                            <div class="card-body p-0 auth-header-box">
                                                <div class="text-center p-3">
                                                    <h4 class="mt-3 mb-1 font-weight-semibold font-18">Edit Channel Category</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                 <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active p-3 pt-3">
                                                        <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('save.category') }}">
                                                            @csrf
                                                            <input name="id" value="{{ $category->id }}" type="hidden"/>
                                                            <div class="form-group">
                                                                <label for="cat">Category Name</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" name="category_name" id="cat" value="{{ $category->category_name }}">
                                                                </div>
                                                            </div><!--end form-group-->

                                                            <div class="form-group mb-0 row">
                                                                <div class="col-12 mt-2">
                                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"> Save changes <i class="fas fa-sign-in-alt ml-1"></i></button>
                                                                </div><!--end col-->
                                                            </div> <!--end form-group-->
                                                        </form><!--end form-->
                                                    </div>
                                                </div>
                                            </div><!--end card-body-->
                                        </div><!--end modal-body-->

                                    </div><!--end modal-content-->
                                </div><!--end modal-dialog-->
                            </div><!--end modal-->
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


    </div><!-- container -->

    <div class="modal fade" id="exampleModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Add Category</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <div class="modal-body">
                    <div class="card-body p-0 auth-header-box">
                        <div class="text-center p-3">
                            <h4 class="mt-3 mb-1 font-weight-semibold font-18">Add New Channel Category</h4>
                        </div>
                    </div>
                    <div class="card-body">

                         <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('add.category') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cat">Category Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="category_name" id="cat" placeholder="Enter Category Name">
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"> Add <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end modal-body-->

            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div><!--end modal-->

@include('admin.inc.footer')
