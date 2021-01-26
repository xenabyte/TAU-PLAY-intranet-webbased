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
                            <h4 class="page-title">Channel</h4>
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
                        <h4 class="card-title">Channels</h4>
                        <hr>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalLogin">
                            Add Channel
                        </button>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Channel</th>
                                <th>Channel Type</th>
                                <th>Image</th>
                                <th>Channel Link</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach($channels as $channel)
                                <tr>
                                    <td><a href="#" class="text-primary">{{ $channel->channel_name }}</a></td>
                                    <td>{{ $channel->channel_type }}</td>
                                    <td><img src="{{ env('IMAGE_URL') }}/{{ $channel->channel_image }}" class="img-thumbnail" width="150" /></td>
                                    <td>{{ $channel->channel_url }}</td>
                                    <td>{{ $channel->category->category_name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#editModalLogin_{{ $channel->id }}">
                                            Edit Channel
                                        </button>

                                        <a href="{{ url('/admin/delete_channel') }}/{{$channel->id}}" class="btn btn-danger btn-md"> Delete Channel </a>
                                        <a href="{{ url('/admin/change_channel_status') }}/{{$channel->id}}" class="btn @if($channel->status == 1) btn-warning  @else  btn-success @endif btn-md"> @if($channel->status == 1) Deactivate  @else Activate  @endif Channel </a>
                                    </td>
                                </tr><!--end tr-->

                                <div class="modal fade" id="editModalLogin_{{ $channel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLogin" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Edit Channel</h6>
                                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="la la-times"></i></span>
                                                </button>
                                            </div><!--end modal-header-->
                                            <div class="modal-body">
                                                <div class="card-body p-0 auth-header-box">
                                                    <div class="text-center p-3">
                                                        <h4 class="mt-3 mb-1 font-weight-semibold font-18">Edit Channel</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">

                                                     <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        <div class="tab-pane active p-3 pt-3">
                                                            <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('save.channel') }}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $channel->id }}" />
                                                                <div class="form-group">
                                                                    <label for="cat">Channel Name</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control" name="channel_name" id="cat" required value="{{ $channel->channel_name }}">
                                                                    </div>
                                                                </div><!--end form-group-->

                                                                <div class="form-group">
                                                                    <label for="channel_link">Channel Link</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="link" class="form-control" name="channel_url" id="channel_link" required value="{{ $channel->channel_url }}">
                                                                    </div>
                                                                </div><!--end form-group-->

                                                                <div class="form-group">
                                                                    <label for="cat">Channel Category</label>
                                                                    <div class="input-group mb-3">
                                                                        <select name="category_id" required class="form-control">
                                                                            @foreach($categories as $category)
                                                                            <option @if($channel->category_id == $category->id) selected  @endif value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div><!--end form-group-->


                                                                <div class="form-group">
                                                                    <label for="cat">Channel Type</label>
                                                                    <div class="input-group mb-3">
                                                                        <select name="channel_type" required class="form-control">
                                                                            <option @if($channel->channel_type == 'M3U8') selected  @endif value="M3U8"> M3U8 </option>
                                                                            <option @if($channel->channel_type == 'Youtube') selected  @endif value="Youtube"> Youtube </option>
                                                                        </select>
                                                                    </div>
                                                                </div><!--end form-group-->

                                                                <div class="form-group">
                                                                    <label for="channel_link">Channel Image</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="file" class="form-control" name="channel_image">
                                                                    </div>
                                                                </div><!--end form-group-->

                                                                <div class="form-group mb-0 row">
                                                                    <div class="col-12 mt-2">
                                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"> Save  <i class="fas fa-sign-in-alt ml-1"></i></button>
                                                                    </div><!--end col-->
                                                                </div> <!--end form-group-->
                                                            </form>
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
                    <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Add Channel</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <div class="modal-body">
                    <div class="card-body p-0 auth-header-box">
                        <div class="text-center p-3">
                            <h4 class="mt-3 mb-1 font-weight-semibold font-18">Add New Channel</h4>
                        </div>
                    </div>
                    <div class="card-body">

                         <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('add.channel') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cat">Channel Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="channel_name" id="cat" required placeholder="Enter Category Name">
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label for="channel_link">Channel Link</label>
                                        <div class="input-group mb-3">
                                            <input type="link" class="form-control" name="channel_url" id="channel_link" required placeholder="Enter Link">
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label for="cat">Channel Category</label>
                                        <div class="input-group mb-3">
                                            <select name="category_id" required class="form-control">
                                                <option selected value="">Select Channel Category </option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label for="cat">Channel Type</label>
                                        <div class="input-group mb-3">
                                            <select name="channel_type" required class="form-control">
                                                <option value="M3U8"> M3U8 </option>
                                                <option value="Youtube"> Youtube </option>
                                            </select>
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label for="channel_link">Channel Image</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="channel_image">
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
