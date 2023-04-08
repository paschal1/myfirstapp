
  
  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Drivers</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
       @foreach ($driver as $drivers)    
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="Driversimage/{{$drivers->file}}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$drivers->name}}</p>
              <span class="text-sm text-grey">{{$drivers->more}}</span>
            </div>
          </div>
        </div>
       @endforeach
      </div>
    </div>
  </div>
  