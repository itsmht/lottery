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
        <a href="{{route('recharge')}}"><p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Recharge</p></a>
               <a href="{{route('withdrawRequest')}}"><p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Withdraw</p></a>
               <a href="{{route('userRefer')}}"><p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">My Refer Code</p></a>
                <h1 class="display-5 mb-4">User Profile</h1>
                <h3 class="display-5 mb-4">Balance: {{$user->balance}} </h3>
                @if($currentPackage)
                <h3 class="display-5 mb-4">Current Package: {{$currentPackage->package->title}} </h3>
                @else
                <h3 class="display-5 mb-4">Current Package: No Package </h3>
                @endif
                <img style="width: 200px; height: 200px;" src="{{asset('user_images/'.$user->image)}}" alt="no_img">
                <br>


                @if (\Session::has('message'))
                    <div class="alert alert-green">
                        {{\Session::get('message')}}
                    </div>
                @endif
                <form action="{{route('editUserProfile')}}" method="post" enctype="multipart/form-data">
                    {{@csrf_field()}}
                    <input type="hidden" name="user_id" value="{{$user->user_id}}">
                    <input type="hidden" name="balance" value="{{$user->balance}}">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                                <label for="name">Name</label>
                            </div>
                        </div>
                        {{--<div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                                <label for="email">Email</label>
                            </div>
                        </div>--}}
                        {{--<div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}">
                                <label for="phone">Phone</label>
                            </div>
                        </div>--}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="password" id="password" value="{{$user->password}}">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                                <label for="image">Image</label>
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


