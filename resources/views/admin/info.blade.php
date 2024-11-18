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
            

            <div class="col-lg-8">
               <div class="card">
                <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">

                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Update</span></a>
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
                        <form action="updateInfo" method="post" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Bkash</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="number" name="bkash" value="{{$info->bkash}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Nagad</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="number" name="nagad" value="{{$info->nagad}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Telegram</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="telegram" value="{{$info->telegram}}">
                                </div>
                            </div>
                            


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



</div><!--End wrapper-->

<!-- Bootstrap core JavaScript-->
@include('scripts.js')
@include('scripts.confirmscript')







{{-- Modal --}}

{{-- Modal End --}}

</body>
</html>
