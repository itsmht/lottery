<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body class="bg-theme bg-theme1">

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

  <!--Start Dashboard Content-->

	<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"> <span class="float-right"><i class="fa fa-suitcase"></i></span></h5>

                  <a href=""><p class="mb-0 text-white small-font">Total Users Registered: {{$userCount}}<span class="float-right"></span></p></a>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"> <span class="float-right"><i class="fa fa-money"></i></span></h5>

                  <p class="mb-0 text-white small-font">Total Withdrawals: {{$totalWithdraw}} <span class="float-right"> </span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"> <span class="float-right"><i class="fa fa-shopping-cart "></i></span></h5>

                  <p class="mb-0 text-white small-font">Total Recharges: {{$totalRecharge}} </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><span class="float-right"><i class="fa fa-industry"></i></span></h5>

                  <p class="mb-0 text-white small-font">Total Transactions: {{$totalTransaction}}  </p>
                </div>
            </div>

        </div>
        </form>
    </div>
 </div>
 <div class="card mt-3">
  <div class="card-content">
      <div class="row row-group m-0">
          <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0"> <span class="float-right"><i class="fa fa-suitcase"></i></span></h5>

                <a href=""><p class="mb-0 text-white small-font">Users Registered Today: {{$dailyUserCount}}<span class="float-right"></span></p></a>
              </div>
          </div>
          <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0"> <span class="float-right"><i class="fa fa-money"></i></span></h5>

                <p class="mb-0 text-white small-font">Today's Withdrawals: {{$dailyWithdraw}} <span class="float-right"> </span></p>
              </div>
          </div>
          <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0"> <span class="float-right"><i class="fa fa-shopping-cart "></i></span></h5>

                <p class="mb-0 text-white small-font">Today's Recharges: {{$dailyRecharge}} </p>
              </div>
          </div>
          <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0"><span class="float-right"><i class="fa fa-industry"></i></span></h5>

                <p class="mb-0 text-white small-font">Today's Transactions: {{$dailyTransaction}}  </p>
              </div>
          </div>

      </div>
      </form>
  </div>
</div>

        {{--<form action="{{route('userReferSubmit')}}" method="post">
            {{@csrf_field()}}
            <input type="hidden" name="user_id" value="{{$user->user_id}}">--}}
            <div class="col-12 col-lg-6 col-xl-3 border-light mx-auto">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Refer Code</label>
                    <div class="col-lg-9">
                        @if ($refer !== null)
                        <input class="form-control" type="text" readonly id="myInput" name="code" value="{{$refer->code}}">
                        @else
                            <input class="form-control" type="text" readonly id="myInput" name="code" placeholder="Enter Refer Code">
                        @endif
                            <div class="col-lg-9">

{{--
                            <input type="submit" class="btn btn-success" value="Save">
--}}
                            <button onclick="myFunction()" class="btn btn-warning">Copy</button>
                        </div>

                    </div>
                </div>
            </div>
        {{--</form>--}}


      <!--End Dashboard Content-->

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
	@include('layouts.footer')
	<!--End footer-->

  <!--start color switcher-->
   {{-- @include('layouts.colorSwitcher') --}}
  <!--end color switcher-->

  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  @include('scripts.js')
<script>
    function myFunction() {
        // Get the text field
        var copyText = document.getElementById("myInput");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the text: " + copyText.value);
    }
</script>

</body>
</html>
