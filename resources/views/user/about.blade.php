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

  @include('userLayouts.about')
  <!-- end about section -->
<h1><b>Privacy and Policy</b></h1>
<p> 1. After deposited the amount, customer has to send last 4 digit of the Bkash/Nagad number. 

  2. If possible, send the screenshot of successful page of Bkash/Nagad.
  
  3. If any customer wants to close his account he has to inform our official 15days earlier. 
  
  4. If anyone forget their information/or need any sort of help, please contact to customer service.
  5. If anyone send money to wrong wallet except our company wallet, company will not be responsible for this action.</p>
  <!-- info section -->
    @include('userLayouts.footer')
  <!-- footer section -->

  @include('userLayouts.scripts')
  <!-- end owl carousel script -->
</body>

</html>