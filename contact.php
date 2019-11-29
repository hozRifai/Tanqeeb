<?php
 session_start();
  require 'init.php';
  $pageTitle = "Contact page";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email  = $_POST["email"];
    $subject = $_POST["subject"] ;
    $message = $_POST["message"] ; 
    $final_message  = "Sent From: $name " . $message;
    $to = "tanqeeb@moakt.co";
    // this is not going to work! we need a real server!
    mail($to, $subject, $final_message);
  }
 ?>

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

 <?php
    include 'includes/templates/footer.php';