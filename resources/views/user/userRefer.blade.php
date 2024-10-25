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
  <h1 class="display-5 mb-4">My Refer Code</h1>
  
  <h3 class="title">Click the Copy button!</h3>
  @if (\Session::has('message'))
                    <div class="alert alert-danger">
                        {{\Session::get('message')}}
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="form-floating">
                        @if ($refer !== null)
                            <input type="text" class="form-control"  name="code" readonly id="code" value="{{$refer->code}}">
                        @else
                            <input type="text" class="form-control"  name="code" readonly id="code">

                        @endif
                            <label for="code">Refer Code</label>
                    </div>
                </div>
                <div class="col-12">
                    <button onclick="Copy()" class="btn btn-warning py-3 px-5">Copy</button>
                </div>
                    </div>
                    </div>
  <!-- end about section -->

  <!-- info section -->
    @include('userLayouts.footer')
  <!-- footer section -->

  @include('userLayouts.scripts')
  <script>
    function Copy() {
        // Get the text field
        var copyText = document.getElementById("code");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the text: " + copyText.value);

    }
</script>
  <!-- end owl carousel script -->
</body>

</html>
