<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="bg-theme bg-theme1">
@include('sweetalert::alert')

    <!-- Start wrapper-->
     <div id="wrapper">

<!--Start sidebar-wrapper-->
@include('layouts.sideBar')
<!--End sidebar-wrapper-->
<!--Start topbar header-->
@include('layouts.topbar')
<!--End topbar header-->
<div class="clearfix"></div>

  <div class="content-wrapper">
    <div class="container-fluid">



        <div class="row mt-3">
            <div class="col-lg-12">
               <div class="card profile-card-2">


                   <center><img style="width:300px; height:300px;" src="{{ asset('public/profile' .'/'. $userDetails->image) }}" alt="company_logo" ><br><br></center>
              <center>
                    <h5 class="card-title">Name: {{$userDetails->name}}</h5>
                   </center>
                   <center>
                    <h5 class="card-title">Unique Id: {{$userDetails->uniqueId}}</h5>
                   </center>
                 <center>
                    <h5 class="card-title">Email: {{$userDetails->email}}</h5>
                   </center>

                   <center>
                    <h5 class="card-title">Mobile: {{$userDetails->phone}}</h5>
                   </center>
                   <center>
                    <h5 class="card-title">Available balance: {{$userDetails->balance}}</h5>
                   </center>
                   @if($transaction!=null)
                   <center>
                    <h5 class="card-title">Last Transaction Amount: 
                        @if($transaction->transaction_amount!=null)
                        {{$transaction->transaction_amount}}</h5>
                        @else
                        Nothing to show
                        @endif
                   </center>
                   <center>
                    <h5 class="card-title">Last Transaction Date: 
                        @if($transaction->created_at!=null)
                        {{\Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y g:i:s A')}}</h5>
                        @else
                        Nothing to show
                        @endif

                   </center>
                   <center>
                    <h5 class="card-title">Last Transaction Method: 
                        @if($transaction->binance_id!=null)
                        <b>{{$transaction->binance_id}}</b></h5>
                        @else
                        Nothing to show
                        @endif
                   </center>
                   
                   <center>
                    <h5 class="card-title">Last Transaction Type: 
                        @if($transaction->transaction_type!=null)
                        {{$transaction->transaction_type}}</h5>
                        @else
                        Nothing to show
                        @endif
                   </center>
                   @else
                   <center>
                    <h5 class="card-title text-danger">No Transaction Available for {{$userDetails->name}}</h5>
                   </center>
                   @endif
                   </center>
                   {{--<center>
                       <h5 class="card-title">Active Package: {{$userDetails->subscription->package->title}}</h5>
                   </center>--}}
                   </center>
                 {{--  <center>
                       <h5 class="card-title">Refer Code: {{$userDetails->referCode->code}}</h5>
                   </center>--}}
                   <center>
                    <h5 class="card-title">Status: @if($userDetails->status==1)
                                                    Active
                                                    @else
                                                    Inactive
                                                    @endif</h5>
                   </center>
                   <center>

                            <form action="{{route('changeStatus')}}" method="POST">
                                {{@csrf_field()}}
                                <input type="hidden"  name="user_id" value="{{$userDetails->user_id}}" >
                            @if($userDetails->status==1)
                            <input type="hidden" name="status" value="0">
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" > Deactivate</button>
                            @else
                            <input type="hidden" name="status" value="1">
                            <button type="submit" class="btn btn-success show_confirm" data-toggle="tooltip" > Activate</button>
                            @endif
                            </form>
                   </center>
                   <br>
                   <center>
                    <form>
                        <button type="button" data-toggle="modal" data-target="#largesizemodal" class="btn btn-success waves-effect waves-light p-1 ">Recharge</button>
                      </form>
                   </center>
                   <br>

            </div>

            </div>

            <div class="col-lg-8">
               <div class="card">
                <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">

                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                    </li>
                </ul>
                <div class="tab-content p-3">

                        <!--/row-->
                    </div>
                    <div class="tab-pane " id="messages">
                        <div class="alert alert-info alert-dismissible" role="alert">



                      </div>
                      <div class="table-responsive">

                      </div>
                    </div>
                    <div class="tab-pane active" id="edit">
                        <form action="editUser" method="post" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <input type="hidden" name="user_id" value="{{$userDetails->user_id}}" >
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="password" value="{{$userDetails->password}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Security Code</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="security_code" value="{{$userDetails->security_code}}">
                                </div>
                            </div>
                            @if($user->type=="3")
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Balance</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number" name="balance" value="{{$userDetails->balance}}">
                                    </div>
                                </div>
                            @else
                                <input class="form-control" type="hidden" name="balance" value="{{$userDetails->balance}}">

                            @endif


                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">

                                    <input type="submit" class="btn btn-warning" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
          </div>




        </div>






<!--start overlay-->
<div class="overlay toggle-menu"></div>
<!--end overlay-->

</div>
<!-- End container-fluid-->

</div><!--End content-wrapper-->

<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->

<!--Start footer-->

<!--End footer-->

<!--start color switcher-->

{{--@include('layouts.footer')--}}
<!--end color switcher-->

</div><!--End wrapper-->

<!-- Bootstrap core JavaScript-->
@include('scripts.js')
@include('scripts.confirmscript')







{{-- Modal --}}
<div class="modal fade" id="largesizemodal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Recharge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('userRecharge')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                    {{@csrf_field()}}

                    <div class="form-group row">
                        <label for="USERS_NAME" class="col-sm-3 col-form-label">Total Amount</label>
                        <div class="col-sm-9">
                            <input type="number" min="1" class="form-control" name="transaction_amount" id="USERS_NAME" placeholder="Enter the amount you want to add">
                        </div></div>
                        <input type="hidden" name="user_id" value="{{$userDetails->user_id}}" >







                    <div class="form-group">
                        <div class="form-group float-right">
                            <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-success" id="savedata"><i class="fa fa-check-square-o"></i> Save</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
{{-- Modal End --}}

</body>
</html>
