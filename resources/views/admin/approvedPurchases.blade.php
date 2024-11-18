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
                                    <h5 class="card-title">Approved Purchase List</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1 col-md-6">
                                    <div class="dt-buttons btn-group">
                                        <div class="col-sm-12">
                                            <form action="{{ route('filterSubmit') }}" method="POST">
                                                {{ @csrf_field() }}
                                                <div class="input-group mb-3">
                                                    <!-- Scheme Select Dropdown -->
                                                    <select name="scheme_id" class="form-control" id="scheme_id">
                                                        @foreach($schemes as $scheme)
                                                            <option value="{{ $scheme->scheme_id }}" {{ old('scheme_id') == $scheme->scheme_id ? 'selected' : '' }}>
                                                                {{ $scheme->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <!-- Date Picker Input -->
                                                    <input type="date" name="date" class="form-control" style="margin-left: 10px;" value="{{ old('date') }}" />
                                                    <input type="hidden" name="filter" value="approve">

                                                    <!-- Submit Button -->
                                                    <button style="margin-left: 10px;" class="input-group-text" type="submit">
                                                        <i class="zmdi zmdi-filter-list"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Table to display filtered results -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Scheme</th>
                                        <th scope="col">Picked Up Number</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Result</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Buying Date</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($purchases->isNotEmpty())
                                        @foreach ($purchases as $purchase)
                                            <tr>
                                                <th scope="row">{{ $purchase->purchase_id }}</th>
                                                <td>{{ $purchase->user->name }}</td>
                                                <td>{{ $purchase->user->phone }}</td>
                                                <td>{{ $purchase->scheme->title }}</td>
                                                <td>{{ $purchase->picked_number }}</td>
                                                <td>{{ $purchase->method }}</td>
                                                <td>
                                                    @if ($purchase->is_win == 0)
                                                        Result Not Published
                                                    @elseif ($purchase->is_win == 2)
                                                        Lost
                                                    @else
                                                        Win
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($purchase->status == "1")
                                                        Approved
                                                    @elseif ($purchase->status == "2")
                                                        Rejected
                                                    @else
                                                        Pending
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($purchase->created_at)->format('l, F j, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">No records found for the selected filters.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
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
</div><!--End wrapper-->

@include('scripts.js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    // SweetAlert confirmation on approve/cancel button
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
            title: "Are you sure?",
            text: "If you change the status, it will affect the record.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willChange) => {
            if (willChange) {
                form.submit();
            }
        });
    });
</script>

</body>
</html>
