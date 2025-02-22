@extends('layouts.front')

@section('content')

  <div class="custom-hero mt-5">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
        <h1 class="hero-heading">Talent Collection &mdash; 2023</h1>
        <div  class="line js-line mx-auto mb-3 my-3"></div>
        <p class="sub-text">At Talent Base, our mission goes beyond showcasing talent. We're dedicated to empowering artists by providing them with a platform to share their stories</p>
        </div>
    </div>
    </div>
  </div>

  <div class="section">
    <div class="container text-center">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="0">
          <div class="feature-v3 d-block">
            <div class="wrap-icon">
              
            </div>
            <div class="text">
              <h3>Diverse Talents</h3>
              <p>We are a virtual gallery, a stage, and a canvas where artists of all genres can exhibit their brilliance.</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-v3 d-block">
            <div class="wrap-icon">
              
            </div>
            <div class="text">
              <h3>Discover the Extraordinary</h3>
              <p>Here at Talent Base experience the extraordinary talents that redefine what it means to be an artist.</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-v3 d-block">
            <div class="wrap-icon">
              
            </div>
            <div class="text">
              <h3>Participate and Engage</h3>
              <p>Whether you're an artist yourself or simply an appreciator of the arts, there's a place for you here.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- <div class="section">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-lg-4">
          <h2>Don't miss the new season 2021 lookbook</h2>
          <div class="line my-3"></div>
        </div>
        <div class="col-lg-4">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4">
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        </div>
        <div class="col-lg-4">
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
          <p>Far far away, behind the word mountains, far from the countries.</p>
        </div>
      </div>
    </div>
  </div> -->
  
  <div class="site-section">
    <div class="container">
      <div class="row align-items-center justify-content-around">

        <div class="col-lg-4 text-center">

          <div>
            @foreach($talent->slice(0, 2) as $key)
            <div data-jarallax-element="-50" class="jarallax">
              <h2>{{$key->first_name}} {{$key->last_name}}</h2>
              <span class="d-inline-block">@ {{$key->instagram}}</span> | 
              <span class="d-inline-block">{{$key->talent_categories->category_name}}</span>
              <img src="{{ url('storage/upload/profile/'.$key->file_name) }}" alt="Avatar" class="img-fluid my-0 my-lg-5">
            </div>
            @endforeach
          </div>

        </div>
        <div class="col-lg-5 mt-5">

          <div>
          @foreach($talent->slice(2, 4) as $key)
            <h2>{{$key->first_name}} {{$key->last_name}}</h2>
            
            <span class="d-inline-block">@ {{$key->instagram}}</span> <br>
            <div  class="line me-auto mb-0 my-1"></div>
            <span class="d-inline-block">{{$key->talent_categories->category_name}}</span>
            
            <img src="{{ url('storage/upload/profile/'.$key->file_name) }}" alt="Avatar" class="img-fluid my-0 my-lg-5">
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- <div class="section-4">
    <div class="container">
      <div class="row mb-4 align-items-center">
        <div class="col-6">
          <h2 class="line-top">Featured Talents</h2>
        </div>
        <div class="col-6 text-right">
          <a href="#" class="custom-prev-v2 js-custom-prev-v2">Prev</a>
          <span class="mx-3">/</span>
          <a href="#" class="custom-next-v2 js-custom-next-v2">Next</a>
        </div>
      </div>

      <div>
        <div class="owl-4-slider owl-carousel">
            @foreach($talent as $key)
            <div class="product">
                <a href="#" class="d-block">
                <img src="{{ url('storage/upload/profile/'.$key->file_name) }}" alt="Avatar" class="img-fuild">
                </a>
                <div class="text-center text-md-left">
                <h3>{{$key->first_name}} {{$key->last_name}}</h3>
                <p>{{$key->instagram}} | {{$key->email}}</p>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div> -->


  <div class="section">
    <div class="container">
      <div class="row justify-content-around align-items-center">
        <div class="col-lg-6">
          <div class="image-stack-v2">
            <div class="image-stack__item image-stack__item--top">
              <div data-jarallax-element="-100" class="jarallax">
                <img src="front-assets/images/img_v_3-min.jpg" alt="Image" class="img-fluid">
              </div>
            </div>
            <div class="image-stack__item image-stack__item--bottom">
              <img src="front-assets/images/img_v_8-min.jpg" alt="Image" class="img-fluid">
            </div>
          </div>


        </div>
        <div class="col-lg-4">

          <h2 class="mb-4">Don't miss the new season 2021 Talents</h2>
          <div class="line my-3"></div>
          <p>As the calendar turns to a fresh year, our anticipation for artistic brilliance reaches new heights. The stage is set, the spotlight ready, and the canvas awaits the strokes of creativity.</p>

          <p>Introducing the much-awaited "New Season 2023 Talents" – an extraordinary showcase of artistic prowess that promises to captivate, inspire, and amaze.</p>
        </div>
      </div>
    </div>
  </div>


  <div class="container pb-5 mb-5 border-bottom">
    <div class="row justify-content-around">
      <div class="col-lg-8 mb-4 mb-lg-0">

        <h2 class="mb-4">Why you choose us</h2>
        <div class="line my-3"></div>
        <p>At Talent Base, we understand that the choice of who to entrust with your creative aspirations is a significant one. We take pride in being more than just a platform – we're your partner in turning dreams into reality.</p>
        <p class="mt-5"><a href="{{ route('home') }}" target="_blank" class="btn btn-primary">Find Out More</a></p>

        
      </div>
    </div>
  </div>


  <div class="section">
    <div class="container">
      <div class="row justify-content-around align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="image-stack-v2">
            <div class="image-stack__item image-stack__item--top">
              <div data-jarallax-element="-100" class="jarallax">
                <img src="front-assets/images/img_v_7-min.jpg" alt="Image" class="img-fluid">
              </div>
            </div>
            <div class="image-stack__item image-stack__item--bottom">
              <img src="front-assets/images/img_v_5-min.jpg" alt="Image" class="img-fluid">
            </div>
          </div>


        </div>
        <div class="col-lg-4">

          <h2 class="mb-4">Stay Tuned, Stay Inspired</h2>
          <div class="line my-3"></div>
          <p>Get ready to be amazed, delighted, and inspired as the "New Season 2023 Talents" takes center stage. Follow us closely for updates, artist profiles, behind-the-scenes glimpses, and exclusive previews.</p>

          <p>Don't miss the opportunity to be part of this artistic celebration that promises to define the creative landscape of the year.</p>
        </div>
      </div>
    </div>
  </div>

@endsection