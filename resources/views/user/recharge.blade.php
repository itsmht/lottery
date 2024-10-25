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
  <h1 class="display-5 mb-4">Recharge Money</h1>
  <h3 class="display-5 mb-4"> Bkash (Agent Number): 01611650961 </h3>
  <h3 class="display-5 mb-4"> Nagad (Agent Number): 01690214066</h3>      
  <h3 class="display-5 mb-4">Binance ID: TVZ73HQophkN9LedCmDkVa69UREbjjaFFB</h3>
<h3 class="display-5 mb-4">Bank Account 1:Tosib Enterprise, 2519020000808 ,Rupali Bank , Kabirhat Nokhali Branch </h3>
  <h3 class="display-5 mb-4">Bank Account 2: Tasib Enterprise, 0011100004233 , Southeast Bank, Bashurhat Branch </h3>
 <h3 class="display-5 mb-4">Bank Account 3:Ibrahim Kholil Ullah, 0200061533811 , IFIC Bank , Choumuhani, Route No- 120750672</h3>
  <h3 class="display-5 mb-4">Bank Account 4:Nure Alam, 20507770256978814 , Islami Bank Bangladesh Limited , Agent Banking  Service Branch, Route No- 125270607</h3>
  <h3 class="display-5 mb-4">Bank Account 5:Jaker Hossen , 7017510958508 , Dutch Bangla Bank Agent , Maijdee Branch, Noakhali , Route No- 090270608</h3>      
       

        
  <h3 class="title">Recharge Request</h3>
  @if (\Session::has('message'))
                    <div class="alert alert-danger">
                        {{\Session::get('message')}}
                    </div>
                @endif
                
                <form action="{{route('rechargeSubmit')}}" method="post">
                    {{@csrf_field()}}
                    <input type="hidden" name="user_id" value="{{$user->user_id}}">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info_form">
                                <select name="type" id="type" class="form-control"  required>
                                    <option selected disabled>Select Recharge Method</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="nagad">Binance</option>
                                    <option value="bank">Bank</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info_form">
                                <input type="text" class="form-control" name="credential" id="credential" required placeholder="Number/ID">
                                <label for="credential">Number/ID</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info_form">
                                <input type="number" class="form-control" name="amount" min="1" required id="amount" placeholder="Amount">
                                <label for="amount">Amount</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info_form">
                                <input type="text" class="form-control" name="trans"  id="trans" required placeholder="Last Four Digit">
                                <label for="trans">Last Four Digit/Bank Account</label>
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
