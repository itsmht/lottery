<!DOCTYPE html>
<html>

@include('userLayouts.header')

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('userLayouts.navbar')
    <!-- end header section -->
  </div>

  <!-- about section -->
  <div class="row">
    <div class="mx-auto col-10 col-md-8 col-lg-6">
        <h1 class="display-5 mb-4">Withdraw Money</h1>
        <h3 class="title">Withdraw Request</h3>
        @if (\Session::has('message'))
            <div class="alert alert-danger">
                {{\Session::get('message')}}
            </div>
        @endif
        <form action="{{route('withdrawSubmit')}}" method="post">
            {{@csrf_field()}}
            <input type="hidden" name="user_id" value="{{$user->user_id}}">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <select name="type" id="type" class="form-control"  required>
                            <option selected disabled>Select Withdraw Method</option>
                            <option value="binance">Binance</option>
                            <option value="bkash">Bkash</option>
                            <option value="nagad">Nagad</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="credential" id="credential" placeholder="Number/ID">
                        <label for="credential">Number/ID</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="number" class="form-control" name="amount" min="1" id="amount" placeholder="Amount">
                        <label for="amount">Amount</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="number" class="form-control" name="security_code" min="1" id="security_code" placeholder="Enter Security Code">
                        <label for="security_code">Security Code</label>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary py-3 px-5" type="submit">Submit</button>
                </div>
            </div>
        </form>
                    </div>
                    </div>
  <!-- end about section -->

  <!-- info section -->
    @include('userLayouts.footer')
  <!-- footer section -->

  @include('userLayouts.scripts')
  <!-- end owl carousel script -->
</body>

</html>

