




<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-5">Exclusive Packages</h1>
            @if (\Session::has('message'))
                <div class="alert alert-danger">
                    {{\Session::get('message')}}
                </div>
            @endif
        </div>

        <div class="row g-4">
            @foreach($packages as $package)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <ul class="price">
                        <li class="header"><b>{{$package->title}}</b></li>
                        <li class="grey"><b>{{$package->deposit_money}}</b></li>
                        <li>Daily income {{$package->daily_income}}TK</li>
                        <li>Lifetime</li>
                        <li>Minimum Withdraw {{$package->minimum_withdraw}} TK</li>
                        @if(session()->has('logged'))
                            <li class="grey">
                        <form action="{{route('invest',['package_id'=>$package->package_id])}}" method="post">
                            {{@csrf_field()}}
                            <input type="hidden"  name="user_id" value="{{$user->user_id}}">

                            <button type="submit" class="button " data-toggle="tooltip" title='Delete'>Invest</button>
                        </form>
                            </li>
                        @else
                            <li class="grey"><a href="{{route('login')}}" class="button">Login</a></li>
                        @endif

                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

