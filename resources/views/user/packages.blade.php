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

  @include('userLayouts.packages')
  <!-- end about section -->

  <!-- info section -->
    @include('userLayouts.footer')
  <!-- footer section -->

  @include('userLayouts.scripts')
  <!-- end owl carousel script -->
</body>

</html>