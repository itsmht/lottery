<section class=" slider_section position-relative">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="box">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Influence Investment Fund
                      </h1>
                      @if(session()->has('logged'))
                      
                      @else
                      <div class="">
                        <a href="{{route('register')}}">
                          Sign Up
                        </a>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="img-box">
                    <img src="../../assets1/images/slider-img.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </section>
