<?php
 session_start();
  require 'init.php';
  $pageTitle = "Main pge";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email  = $_POST["email"];
    $subject = $_POST["subject"] ;
    $message = $_POST["message"] ; 
    $final_message  = "Sent From: $name " . $message;
    $to = "tanqeeb@gmail.com";
    // this is not going to work! we need a real server!
    mail($to, $subject, $final_message);
  }
 ?>

<div class="bg">
  <h1 class=" my-5 wow fadeInDownBig" data-wow-duration="2s">Discover Great Restaurants At Your Place!</h1>
    <h4 class="my-2 wow  bounceInRight" data-wow-duration="3s">Let's uncover the best places to eat !</h4>
    <div class="my-5 wow bounceIn container" data-wow-duration="4s">
    <form class="mt-5" action="restaurants.php" method="GET">
      <div class="form-row">
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-1"></div>

        <div class="form-group col-md-5">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Location</span>
              </div>
              <select class="form-control form-control-lg" name="city">
                <option value="Sharjah">Sharjah</option>
                <option value="Abu Dhabi">Abu Dhabi</option>
                <option value="Dubai">Dubai</option>
                <option value="Ajman">Ajman</option>
                <option value="Ras Al Khaima">RAK</option>
                <option value="Fujairah">Fujairah</option>
            </select>
            <div class="input-group-append">
                  <button type="submit" class="btn btn-danger btn-lg">SEARCH</button>
              </div>
          </div>
          </div>
      </div>
    </form>
  </div>
</div>


<section class="main-block">
        <div class="container">

          <div class="row">
                <div class="col text-center">
                    <h1 style="margin-bottom: 4%;"> Restaurants </h1>
                </div>
            </div>


            <div class="row">

                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="detail.html">
                            <img src="layouts/images/featured1.jpg" class="img-fluid" alt="#">
                            <span class="featured-rating-orange">3.5</span>
                            <div class="featured-title-box">
                                <h6>Joe’s Shanghai</h6>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="detail.html">
                            <img src="layouts/images/featured2.jpg" class="img-fluid" alt="#">
                            <span class="featured-rating-green">9.5</span>
                            <div class="featured-title-box">
                                <h6>Joe’s Shanghai</h6>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="detail.html">
                            <img src="layouts/images/featured3.jpg" class="img-fluid" alt="#">
                            <span class="featured-rating">3.2</span>
                            <div class="featured-title-box">
                                <h6>Tasty Hand-Pulled Noodles</h6>
 
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col text-center">
                    <a href="restaurants.php" class="btn btn-danger center">VIEW ALL</a>
                </div>
            </div>

        </div>
    </section>




<hr id="hr_seperator">




<!--Gallery-->
    <section id="photos">
        <h1 class="mb-5 text-center">Cuisines</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 portfolio-item">

                    <img class="card-img-top" src="https://images.pexels.com/photos/7658/food-pizza-box-chalkboard.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                    
                    <a href="#" data-featherlight="https://images.pexels.com/photos/7658/food-pizza-box-chalkboard.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"><h2>Pizza</h2></a>

                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">

                    <img class="card-img-top" src="https://images.pexels.com/photos/551997/pexels-photo-551997.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                    <a href="#" data-featherlight="https://images.pexels.com/photos/551997/pexels-photo-551997.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"><h2>Appetizers</h2></a>

                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">

                    <img class="card-img-top" src="https://images.pexels.com/photos/539451/pexels-photo-539451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                    <a href="#" data-featherlight="https://images.pexels.com/photos/539451/pexels-photo-539451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"><h2>Soup</h2></a>

                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">

                    <img class="card-img-top" src="https://images.pexels.com/photos/684965/pexels-photo-684965.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                    <a href="#" data-featherlight="https://images.pexels.com/photos/684965/pexels-photo-684965.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"><h2>Shushi rolls</h2></a>

                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">

                    <img class="card-img-top" src="https://images.pexels.com/photos/64208/pexels-photo-64208.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                    <a href="#" data-featherlight="https://images.pexels.com/photos/64208/pexels-photo-64208.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"><h2>Spaghetti</h2></a>

                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">

                    <img class="card-img-top" src="https://images.pexels.com/photos/803963/pexels-photo-803963.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                    <a href="#" data-featherlight="https://images.pexels.com/photos/803963/pexels-photo-803963.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"><h2>Pasta</h2></a>

                </div>

            </div>
        </div>
    </section>
    <!--gallery end-->



<!-- Start Contact -->
    <section id="contact">
      <div class="container">
        <h1 class="mb-5 text-center">Contact Us</h1>
        <div class="row wow fadeInUp">
          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>UOS</h3>
              <p>
                University of Sharjah will be more happy to reach out or help
                other people who are interested in pursuing knowledge, and by
                doing so this will allow us to grow and to be the university
                that we are aiming for.
              </p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"
                  ><i class="fa fa-instagram"></i
                ></a>
                <a href="#" class="google-plus"
                  ><i class="fa fa-google-plus"></i
                ></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>M7, Man Building</p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                <p>sciences@sharjah.ac.ae</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>+97165050225</p>
              </div>
            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      placeholder="Your Name"
                      data-rule="minlen:4"
                      data-msg="Please enter at least 4 chars"
                    />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      placeholder="Your Email"
                      data-rule="email"
                      data-msg="Please enter a valid email"
                    />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    name="subject"
                    id="subject"
                    placeholder="Subject"
                    data-rule="minlen:4"
                    data-msg="Please enter at least 8 chars of subject"
                  />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea
                    class="form-control"
                    name="message"
                    rows="5"
                    data-rule="required"
                    data-msg="Please write something for us"
                    placeholder="Message"
                  ></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center">
                  <button type="submit" title="Send Message">
                    Send Message
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>



<section class="bg_counter" >
  <div class="container">
    <div class="row text-center">

      <div class="col">
              <div class="counter">
          <i class="fa fa-lightbulb-o fa-2x"></i>
          <h2 class="counter-count">3</h2>
          <p class="count-text ">Years of expericence</p>
        </div>
      </div>

            <div class="col">
        <div class="counter">
          <i class="fa fa-code fa-2x"></i>
          <h2 class="counter-count">30</h2>
          <p class="count-text ">Restaurants</p>
          </div>
          </div>

      <div class="col">
        <div class="counter">
            <i class="fa fa-coffee fa-2x"></i>
            <h2 class="counter-count">25</h2>
            <p class="count-text ">Cuisines</p>
          </div>
            </div>

      <div class="col">
        <div class="counter">
            <i class="fa fa-coffee fa-2x"></i>
            <h2 class="counter-count">500</h2>
            <p class="count-text ">Happy Customers</p>
          </div>
            </div>

        </div>
  </div>
</section>
<script>
$(window).scroll(function() {
   var hT = $('.bg_counter').offset().top,
       hH = $('.bg_counter').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
   if (wS > (hT+hH-wH)){
       $('.counter-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 5000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
          $(window).off('scroll');
   }
});
</script>


 <?php
    include 'includes/templates/footer.php';