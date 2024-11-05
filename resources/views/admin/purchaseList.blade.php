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


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title">Recharge Request List</h5>

                                </div>
                            </div>
                            {{-- <div class="row">


                                <div class="col-md-6">
                                  <div id="example_filter" class="dataTables_filter">
                                    <form action="{{route('search.submit')}}" method="POST" target="_blank">
                                      {{@csrf_field()}}
                                      <div class="input-group mb-3" style="
                                      margin-left: 405px;">
                                    <input type="text"  id="searchCompany" class="typeahead form-control" name="search" placeholder="Search By Unique ID" aria-controls="example" required>
                                    <button class="input-group-text" type="submit"><i class="fa fa-search"></i></button>
                                      </div>
                                  </form>
                                  </div>
                              </div>

                              </div> --}}






                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">User's Phone Number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($recharges as $company)


                                        <tr>
                                            <th id="companyId" scope="row">{{$company->transaction_id}}</th>
                                            <td>{{$company->trans}}</td>
                                            <td>{{$company->user->phone}}</td>
                                            <td>{{$company->user->name}}</td>
                                            <td>{{$company->binance_id}}</td>
                                            <td>{{$company->transaction_amount}}</td>
                                            <td>{{$company->transaction_status}}</td>
                                            <td>
                                                <form action="{{route('approveRecharge',['id'=>$company->transaction_id])}}" method="post">
                                                    {{@csrf_field()}}
                                                    <input type="hidden"  name="transaction_id" value="{{$company->transaction_id}}">
                                                    <input type="hidden" name="transaction_amount" value="{{$company->transaction_amount}}">
                                                    <button type="submit" class="badge badge-success shadow-success border border-success waves-effect waves-light m-1 show_confirm" data-toggle="tooltip" title='Delete'>Approve</button>
                                                </form>
                                                <form action="{{route('cancelTransaction',['id'=>$company->transaction_id])}}" method="post">
                                                    {{@csrf_field()}}
                                                    <input type="hidden" type="hidden" name="transaction_id" value="transaction_id">
                                                    <button type="submit" class="badge badge-danger shadow-danger border border-danger waves-effect waves-light m-1 show_confirm" data-toggle="tooltip" title='Delete'>Cancel</button>
                                                </form>
                                            </td>
                                            {{-- @if ($company->ALL_ACCOUNTS_NAME)
                                            <td>{{$company->client_email}}</td>
                                            @else
                                            <td>None</td>
                                            @endif
                                            @if ($client->client_phone)
                                            <td>+880 {{$client->client_phone}}</td>
                                            @else
                                            <td>None</td>
                                            @endif --}}

                                            {{-- <td><a href="{{route('editClient',['id'=>$client->client_id])}}"><button  id="modal-animation-10" class="badge badge-warning shadow-warning border border-warning waves-effect waves-light m-1">Edit </button></a>
                                              <form action="{{route('deleteClient',['id'=>$client->client_id])}}" method="post">
                                                {{@csrf_field()}}
                                                <input type="hidden" type="hidden" name="client_id" value="client_id">
                                                <button type="submit" class="badge badge-danger shadow-danger border border-danger waves-effect waves-light m-1 show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                              </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {!! $recharges->onEachSide(1)->links() !!}
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
    @include('layouts.footer')
    <!--End footer-->

    <!--start color switcher-->
    {{-- @include('layouts.colorSwitcher') --}}
    <!--end color switcher-->

</div><!--End wrapper-->

<!-- Bootstrap core JavaScript-->
@include('scripts.js')

{{-- Modal --}}
{{-- <div class="modal fade" id="largesizemodal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('createCompany')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

          {{@csrf_field()}}
          <div class="form-group row">
            <label for="USERS_NAME" class="col-sm-3 col-form-label">Company Name</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="USERS_NAME" id="USERS_NAME" placeholder="Enter Company Name">
          </div></div>

          <div class="form-group row">
            <label for="USERS_MOBILE" class="col-sm-3 col-form-label">Company Phone</label>
            <div class="col-sm-9">
            <input type="number" class="form-control" name="USERS_MOBILE" id="USERS_MOBILE" placeholder="Enter Company Phone">
          </div></div>
          <div class="form-group row">
            <label for="INIT_PASSWORD" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="INIT_PASSWORD" id="INIT_PASSWORD" placeholder="Enter Password">
          </div></div>


            <div class="form-group row">
                <label for="USERS_NAME" class="col-sm-3 col-form-label">Product Type</label>
                <div class="col-sm-9">
                    <div class="icheck-material-success icheck-inline">
                        <input type="radio" id="initial" name="product_type" value="1">
                        <label for="initial">LPG</label>

                    </div>
                    <div class="icheck-material-success icheck-inline">

                        <input type="radio" id="monthly" name="product_type" value="0">
                        <label for="monthly">General</label>
                    </div>
                </div></div>



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
</div> --}}

{{-- Modal End --}}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>

<script type="text/javascript">
    var route = "{{route('searchCompany')}}";
    $('#searchCompany').typeahead({
        source: function(query, process) {
            return $.get(route, {
                query: query
            }, function(data) {
                var states = data;
                console.log(states.uniqueId);
                var arr= new Array();
                $.each( states, function(i, obj) {
                    arr.push( obj.uniqueId )
                });

                return process(arr);

            });
        }
    });
</script>

{{-- <script>
    function filterDistrict(id) {
        var districts = $(id).val();
       // var USERS_ID = $('#USERS_ID').val();
        $.ajax({
            url: "{{url('testFilter')}}",
            type: "GET",
            data: {districts: districts},
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            success: function(data) {
                data.companies = undefined;
                for (var i = 0; i < data.companies.length; i++) {
                    var company = data.companies[i];
                    console.log(data);
                }
                alert(data.companies.USERS_NAMES);
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
</script> --}}

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

    $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to withdraw?`,
            text: "If you change the status, the user's balance will deduct'.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
</html>
