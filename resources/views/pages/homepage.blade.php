@extends('layouts.home')
@section('content')
<div class="sequence">
  
    <div class="seq-preloader">
      <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>
    </div>
    
  </div>
  
      <div class="logo"> 
          <h1><img src="{{asset('images/logo/hgh_logo.jpg')}}" class="img w-75" alt=""></h1>
          <h2><img src="{{asset('images/logo/hgh_logo.jpg')}}" class="img w-50" alt=""></h2>
      </div>
      <nav>
        <ul>
          <li><a href="#1"><img src="{{asset('homepage/assets/images/icon-1.png')}}" alt=""> <em>Homepage</em></a></li>
          <li><a href="#2"><img src="{{asset('homepage/assets/images/icon-2.png')}}" alt=""> <em>About Us</em></a></li>
          <li><a href="#3"><img src="{{asset('homepage/assets/images/icon-3.png')}}" alt=""> <em>Our Doctors</em></a></li>
          <li><a href="#4"><img src="{{asset('homepage/assets/images/icon-4.png')}}" alt=""> <em>Contact Us</em></a></li>
        </ul>
      </nav>

      <div class="slides">

        

        <div class="slide" id="1">
          <div id="slider-wrapper">

            <!--Login Section start from here-->
        <div class="row bg-dark w-100" style="">
          <div class="" style="margin-left: 15em;">
            <a href="/login" class="p-2 btn btn-primary">Login</a>
            <a href="/register" class="p-2 btn btn-success">Register</a>
                        
          </div>
        </div>
       
        <!--Login Section end from here-->
            
              <div id="image-slider">
                <ul>
                  <li class="active-img">
                    <div class="slide-caption">
                      <h6>New Arrival</h6>
                      <h2>Beautiful<br>Earth</h2>
                    </div>
                  </li>
                  <li>
                    <div class="slide-caption">
                      <h6>Latest One</h6>
                      <h2>Tech<br>Meeting</h2>
                    </div>
                  </li>
                  <li>
                    <div class="slide-caption">
                      <h6>Your Update</h6>
                      <h2>Smart<br>Devices</h2>
                    </div>
                  </li>                      
                </ul>
              </div>
              <div id="thumbnail">
                <ul>
                  <li class="active"><img src="{{asset('homepage/assets/images/thumb-01.jpg')}}" alt="Earth" /></li>
                  <li><img src="{{asset('homepage/assets/images/thumb-02.jpg')}}" alt="Meeting" /></li>
                  <li><img src="{{asset('homepage/assets/images/thumb-03.jpg')}}" alt="Smart" /></li>         
                </ul>
              </div>
            </div>
      </div>
      <div class="slide" id="2">
          <div class="content second-content">
              <div id='tabs'>
                <ul>
                  <li><a href='#tabs-1'><span class='fa fa-info-circle'></span></a></li>
                  <li><a href='#tabs-2'><span class='fa fa-users'></span></a></li>
                  <li><a href='#tabs-3'><span class='fa fa-sign-in'></span></a></li>
                </ul>
                <section class='tabs-content'>
                    
                  <article id='tabs-1'>
                    <h2>Who We Are?</h2>
                    <span>Etiam tempus ex ut mi</span>
                    <p>Vivamus dictum odio at enim posuere, et dapibus nunc sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p> 
                    <p>Integer a egestas tellus, id malesuada velit. Pellentesque tincidunt, libero eu rutrum volutpat, nisi urna mollis felis, sed mollis sem libero at magna.</p>
                  </article>

                    

                    
                  <article id='tabs-2'>

                    <h2>Do you need any medical service or support?</h2>
                    <span>Just create an account and login to your dashboard.</span>
                    <p>If you don't have an account then <a href="/register">Sign Up</a> and enjoy our online medical services. You also can live chat with our professional doctors.</p>
                    <p>
                        <a href="/login" class="btn btn-primary">Sign In</a>
                    </p>

                    
                  </article>
                  <article id='tabs-3'>
                    <h2>Don't have any account?</h2>
                    <span>Create your free account right now and enjoy</span>
                    <p>
                        If you already have an account then <a href="/login">Sign In</a> to your account and get our services.
                    </p>
                    <p>
                        <a href="/register" class="btn btn-primary">Sign Up</a>
                    </p>
                    
                  </article>
                </section>
              </div>
          </div>
      </div>
      <div class="slide" id="3">
          <div class="content third-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="owl-carousel owl-theme">
                          <div class="col-md-12">
                              <div class="featured-item"> 
                                  <a href=""><img src="{{asset('homepage/assets/images/item-01.jpg')}}" alt=""></a>
                                  <div class="down-content">
                                  <h4>Donec non sagittis</h4>
                                      <h6>$25.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <a href=""><img src="{{asset('homepage/assets/images/item-02.jpg')}}" alt=""></a>
                                  <div class="down-content">
                                      <h4>Nulla a pharetra</h4>
                                      <h6>$35.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <img src="{{asset('homepage/assets/images/item-03.jpg')}}" alt="">
                                  <div class="down-content">
                                      <h4>Aliquam convallis</h4>
                                      <h6>$45.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <img src="{{asset('homepage/assets/images/item-04.jpg')}}" alt="">
                                  <div class="down-content">
                                      <h4>Vivamus vitae #4</h4>
                                      <h6>$55.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <img src="{{asset('homepage/assets/images/item-05.jpg')}}" alt="">
                                  <div class="down-content">
                                      <h4>Vivamus vitae #6</h4>
                                      <h6>$65.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <img src="{{asset('homepage/assets/images/item-06.jpg')}}" alt="">
                                  <div class="down-content">
                                      <h4>Vivamus vitae #8</h4>
                                      <h6>$75.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <img src="{{asset('homepage/assets/images/item-07.jpg')}}" alt="">
                                  <div class="down-content">
                                      <h4>Donec non sagittis</h4>
                                      <h6>$85.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <img src="{{asset('homepage/assets/images/item-08.jpg')}}" alt="">
                                  <div class="down-content">
                                      <h4>Curabitur sed 8</h4>
                                      <h6>$95.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <img src="{{asset('homepage/assets/images/item-09.jpg')}}" alt="">
                                  <div class="down-content">
                                      <h4>Curabitur sed 10</h4>
                                      <h6>$105.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <img src="{{asset('homepage/assets/images/item-10.jpg')}}" alt="">
                                  <div class="down-content">
                                      <h4>Curabitur sed 12</h4>
                                      <h6>$115.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <img src="{{asset('homepage/assets/images/item-11.jpg')}}" alt="">
                                  <div class="down-content">
                                      <h4>Curabitur sed 14</h4>
                                      <h6>$125.00</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="featured-item">
                                  <img src="{{asset('homepage/assets/images/item-12.jpg')}}" alt="">
                                  <div class="down-content">
                                      <h4>Curabitur sed 16</h4>
                                      <h6>$135.00</h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="slide" id="4">
          <div class="content fourth-content">
              <div class="container-fluid">
                  <form id="contact" action="{{route('contact')}}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-md-12">
                          <h2>Send Your Valuable Feedback</h2>
                        </div>
                        <div class="col-md-4">
                          <fieldset>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                          </fieldset>
                        </div>
                        <div class="col-md-4">
                          <fieldset>
                            <input name="email" type="text" class="form-control" id="email" placeholder="Your email..." required="">
                          </fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset>
                              <input name="mobile" type="number" class="form-control" id="email" placeholder="Your Mobile No..." required="">
                            </fieldset>
                          </div>
                        <div class="col-md-12">
                          <fieldset>
                            <textarea name="body" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                          </fieldset>
                        </div>
                        <div class="col-md-12">
                          <fieldset>
                            <button type="submit" id="form-submit" class="button">Send Now</button>
                          </fieldset>
                      </div>
                      <a href="/login" class="btn btn-primary" style="right:0px; top: 0px; display: fixed;">Login</a>
                  </form>
              </div>
          </div>
      </div>
  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/accordations.js"></script>
  <script src="assets/js/main.js"></script>

  
@endsection