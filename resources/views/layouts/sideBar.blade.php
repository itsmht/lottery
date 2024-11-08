<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        @if($user->type==1)

            <a href="{{route('userDashboard')}}">

        @else

            <a href="{{route('adminDashboard')}}">

        @endif
       <img style="width: 121px; height:39px;" src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
      <h5 style="font-size: 12px;">Control Panel</h5>

    </a>
    <br>
  </div>
  <center><h5 class="logo-text">User: {{$user->name}}</h5></center><hr>
  <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
         @if($user->type==1)

            <a href="{{route('userDashboard')}}">

        @else

            <a href="{{route('adminDashboard')}}">

        @endif
         <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
       </a>
     </li>


    {{-- User Sidebar Modules --}}
     @if($user->type==1)
      <li>
        <a href="{{route('login')}}">
            <i class="zmdi zmdi-lock"></i> <span>Investment</span>
        </a>
     </li>

@endif
@if($user->type==1)
      <li>
        <a href="{{route('login')}}">
            <i class="zmdi zmdi-lock"></i> <span>Request  Withdraw</span>
        </a>
     </li>

@endif
@if($user->type==1)
      <li>
        <a href="{{route('login')}}">
            <i class="zmdi zmdi-lock"></i> <span>My Transactions</span>
        </a>
     </li>

@endif

{{-- End User Modules --}}
     {{-- <li>
        <a href="">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li> --}}

      {{-- <li>

          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
 --}}

     {{-- <li>

        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-share"></i> <span>Update</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
            <li><a href="#"><i class="zmdi zmdi-dot-circle-alt"></i> Home</a></li>

            </ul>

                  <li><a href="javaScript:void();"><i class="zmdi zmdi-dot-circle-alt"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="sidebar-submenu">
                    <li><a href="javaScript:void();"><i class="zmdi zmdi-dot-circle-alt"></i> Level Two</a></li>
                  </ul></li>
                </ul>


      </li> --}}
      @if($user->type==2 || $user->type==3)
      <li>
        <a href="{{route('users')}}">
            <i class="zmdi zmdi-lock"></i> <span>Users</span>
        </a>
     </li>

@endif
@if($user->type==2 || $user->type==3)
      <li>
        <a href="{{route('schemeList')}}">
            <i class="zmdi zmdi-lock"></i> <span>Schemes</span>
        </a>
     </li>

@endif
@if($user->type==2 || $user->type==3)
      <li>
        <a href="{{route('purchaseList')}}">
            <i class="zmdi zmdi-lock"></i> <span>Purchase Requests</span>
        </a>
     </li>

@endif
@if($user->type==2 || $user->type==3)
      <li>
        <a href="{{route('approvedPurchases')}}">
            <i class="zmdi zmdi-lock"></i> <span>Approved Purchases</span>
        </a>
     </li>

@endif
@if($user->type==2 || $user->type==3)
      <li>
        <a href="{{route('announcementList')}}">
            <i class="zmdi zmdi-lock"></i> <span>Announcements</span>
        </a>
     </li>

@endif



<li>
    @if($user->type==1)

       <a href="{{route('userDashboard')}}">

   @else

       <a href="{{route('adminDashboard')}}">

   @endif
    <i class="zmdi zmdi-view-dashboard"></i> <span>Profile</span>
  </a>
</li>

   </ul>

  </div>
