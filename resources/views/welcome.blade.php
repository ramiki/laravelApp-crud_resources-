<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>App Starter HTML CSS Website Template</title>
<!--
App Starter Template
http://www.templatemo.com/tm-492-app-starter
-->
<link rel="stylesheet" href="css/css/bootstrap.min.css">
<link rel="stylesheet" href="css/css/animate.css">
<link rel="stylesheet" href="css/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<link rel="stylesheet" href="css/css/magnific-popup.css">

<link rel="stylesheet" href="css/css/owl.theme.css">
<link rel="stylesheet" href="css/css/owl.carousel.css">

<link href='https://fonts.googleapis.com/css?family=Unica+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700' rel='stylesheet' type='text/css'>

<!-- Main css -->
<link rel="stylesheet" href="css/css/style.css">

</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- PRE LOADER -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>



<!-- Navigation Section -->

<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand logo"><span>Stud</span>'Us</a>
		</div>
      
		<div class="collapse navbar-collapse">

               <ul class="nav navbar-nav navbar-right bg-info" style="margin-left: 140px;">

               @if (Route::has('login'))
                         {{-- In Laravel, the @auth directive is used to check if the user is authenticated or not ( opposite to guest --}}
                         @auth
                              <li><a href="{{ url('/forms') }}" class="">Fomrs</a></li>
                         @else
                              <li><a href="{{ route('login') }}" class="">Log in</a></li>

                              @if (Route::has('register'))
                              <li><a href="{{ route('register') }}" class="">Register</a></li>
                              @endif
                         @endauth
                    
               @endif

               
                    {{-- <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li> --}}
               </ul> 
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home" class="smoothScroll">Home</a></li>
				<li><a href="#about" class="smoothScroll">About</a></li>
				<li><a href="#screenshot" class="smoothScroll">Screenshots</a></li>
                <li><a href="#pricing" class="smoothScroll">Pricing</a></li>
                <li><a href="#newsletter" class="smoothScroll">Newsletter</a></li>
        		<li><a href="#" data-toggle="modal" data-target="#modal1">Contact</a></li>
               </ul>
             
		</div>

	</div>
</div>


<!-- Home Section -->

<section id="home" class="main">
     <div class="overlay"></div>
	<div class="container">
		<div class="row">

               <div class="wow fadeInUp col-md-6 col-sm-5 col-xs-10 col-xs-offset-1 col-sm-offset-0" data-wow-delay="0.2s">
                    <img src="images/images/home-img.svg" class="img-responsive" alt="Home">
               </div>

               <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="home-thumb">
                         <h1 class="wow fadeInUp" data-wow-delay="0.6s">Stud'us School Management</h1>
                         <p class="wow fadeInUp" data-wow-delay="0.8s">The optimal way and digital solution for schools, designed for Teaching & Learning Management in the Education Industry !</p>
                         <a href="{{ route('login') }}" class="wow fadeInUp section-btn btn btn-success smoothScroll" data-wow-delay="1s">Login To WebApp</a>
                    </div>
               </div>

		</div>
	</div>
</section>


<!-- About Section -->

<section id="about">
     <div class="container ">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="wow bounceIn section-title">
                         <h1>welcome to the Webapp</h1>
                         <hr>
                    </div>
               </div>

               <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                   <h2>Our WebApp Dueal</h2>
                   <h3 class="wow fadeInUp" data-wow-delay="0.8s">The eLearning School Management WebApp.</h3>
                   <p class="wow fadeInUp" data-wow-delay="0.4s">facilitate the  <a href="https://plus.google.com/+templatemo" target="_blank">management and administration</a>  of educational institutions. It offers a range of features and functionalities to streamline various aspects of school operations.</p>
               </div>

               <div class="wow fadeInUp col-md-3 col-sm-6" data-wow-delay="0.4s">
                    <div class="about-thumb">
                         <img src="images/images/team-img1.png" class="img-responsive" alt="Team">
                              <div class="about-overlay">
                                   <h3>E-Learning</h3>
                                   <h4>Offshor</h4>
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                        <li><a href="#" class="fa fa-instagram"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                   </ul>
                              </div>
                    </div>
               </div>

                <div class="wow fadeInUp col-md-3 col-sm-6" data-wow-delay="0.4s">
                    <div class="about-thumb">
                         <img src="images/images/team-img2.webp" class="img-responsive" alt="Team">
                              <div class="about-overlay">
                                   <h3>Management </h3>
                                   <h4>School</h4>
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-pinterest"></a></li>
                                        <li><a href="#" class="fa fa-behance"></a></li>
                                        <li><a href="#" class="fa fa-google-plus"></a></li>
                                   </ul>
                              </div>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- Divider Section -->

<section id="divider">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <h2 class="wow fadeInUp" data-wow-delay="0.4s">Overall, the eLearning School Management WebApp simplifies administrative tasks, enhances communication and collaboration, and empowers educational institutions to deliver a more efficient and engaging learning experience...</h2>
                    <a href="#screenshot" class="wow fadeInUp section-btn btn btn-success smoothScroll" data-wow-delay="0.8s">Learn More</a>
               </div>

          </div>
     </div>
</section>


<!-- Screenshot Section -->

<section id="screenshot">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <div class="section-title">
                         <h1>WebApp Screenshots</h1>
                         <p class="wow fadeInUp" data-wow-delay="0.8s">various sections for : User Management - Student Management - Course and Curriculum Management - Communication and Collaboration - Gradebook and Progress Tracking - Online Assessments and Examinations - And also More ...</p>
                    </div>
               </div>

               <!-- Screenshot Owl Carousel -->
               <div id="screenshot-carousel" class="owl-carousel">

                    <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                         <a href="images/images/screenshot-img1.png" class="image-popup">
                              <img src="images/images/screenshot-img1.png" class="img-responsive" alt="screenshot">
                         </a>
                    </div>

                    <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                         <a href="images/images/screenshot-img2.png" class="image-popup">
                              <img src="images/images/screenshot-img2.png" class="img-responsive" alt="screenshot">
                         </a>
                    </div>

                    <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                         <a href="images/images/screenshot-img3.png" class="image-popup">
                              <img src="images/images/screenshot-img3.png" class="img-responsive" alt="screenshot">
                         </a>
                    </div>

                    <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                         <a href="images/images/screenshot-img4.png" class="image-popup">
                              <img src="images/images/screenshot-img4.png" class="img-responsive" alt="screenshot">
                         </a>
                    </div>

                    <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                         <a href="images/images/screenshot-img5.png" class="image-popup">
                              <img src="images/images/screenshot-img5.png" class="img-responsive" alt="screenshot">
                         </a>
                    </div>

                    <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                         <a href="images/images/screenshot-img6.png" class="image-popup">
                              <img src="images/images/screenshot-img6.png" class="img-responsive" alt="screenshot">
                         </a>
                    </div>

                    <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                         <a href="images/images/screenshot-img7.png" class="image-popup">
                              <img src="images/images/screenshot-img7.png" class="img-responsive" alt="screenshot">
                         </a>
                    </div>

                    <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                         <a href="images/images/screenshot-img8.png" class="image-popup">
                              <img src="images/images/screenshot-img8.png" class="img-responsive" alt="screenshot">
                         </a>
                    </div>

               </div>

          </div>
     </div>
</section>


<!-- Pricing Section -->

<section id="pricing">
     <div class="container">
          <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                         <h1>App Pricing</h1>
                         <hr>
                    </div>
               </div>

               <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.4s">
                    <div class="pricing-plan">
                         <div class="pricing-month">
                              <h2>$60</h2>
                         </div>
                         <div class="pricing-title">
                              <h3>Starter</h3>
                         </div>
                         <p>40 Users</p>
                         <p>10GB per user</p>
                         <p>Unlimited Support</p>
                         <p>1 Year License</p>
                         <button class="btn btn-default section-btn">Register now</button>
                    </div>
               </div>

               <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
                    <div class="pricing-plan">
                         <div class="pricing-month">
                              <h2>$120</h2>
                         </div>
                         <div class="pricing-title">
                              <h3>Business</h3>
                         </div>
                         <p>100 Users</p>
                         <p>20GB per user</p>
                         <p>Unlimited Support</p>
                         <p>2 Years License</p>
                         <button class="btn btn-default section-btn">Register now</button>
                    </div>
               </div>

               <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.8s">
                    <div class="pricing-plan">
                         <div class="pricing-month">
                              <h2>$200</h2>
                         </div>
                         <div class="pricing-title">
                              <h3>Advanced</h3>
                         </div>
                         <p>200 Users</p>
                         <p>30GB per user</p>
                         <p>Unlimted Support</p>
                         <p>3 Years License</p>
                         <button class="btn btn-default section-btn">Register now</button>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- Newsletter Section -->

<section id="newsletter">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <div class="wow bounceIn section-title">
                         <h2>Subscribe Newsletter</h2>
                         <p class="wow fadeInUp" data-wow-delay="0.5s"> "Stay Updated with Our Newsletter Get the Latest News and Updates Subscribe Today !___! ".</p>
                    </div>
                    <div class="wow fadeInUp newsletter-form" data-wow-delay="0.8s">
                         <form action="#" method="post">
                              <div class="col-md-8 col-sm-7">
                                   <input name="email" type="email" class="form-control" id="email" placeholder="Your Email here">
                           	  </div>
                              <div class="col-md-4 col-sm-5">
                                   <input name="submit" type="submit" class="form-control" id="submit" value="Send Newsletter">
                              </div>
                         </form>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- Footer Section -->

<footer>
	<div class="container">
		<div class="row">

               <div class="col-md-8 col-sm-6">
                    <div class="wow fadeInUp footer-copyright" data-wow-delay="0.4s">
                         <p>Copyright &copy; 2020 Stud'Us
                         <span>||</span> 
                         Developed & Design: <a href="#" title="free css templates" target="_blank">Ramiki</a></p>
                    </div>
               </div>

			<div class="col-md-4 col-sm-6">
				<ul class="wow fadeInUp social-icon" data-wow-delay="0.8s">
                         <li><a href="#" class="fa-brands fa-facebook-f"></a></li>
                         <li><a href="#" class="fa-brands fa-twitter"></a></li>
                         <li><a href="#" class="fa-brands fa-google"></a></li>
                         <li><a href="#" class="fa-brands fa-linkedin"></a></li>
                    </ul>
               </div>
			
		</div>
	</div>
</footer>


<!-- Modal Contact -->

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content modal-popup">
          <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h2 class="modal-title">Contact Form</h2>
          </div>

               <form action="#" method="post">
                    <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required>
                 	<input name="email" type="email" class="form-control" id="email" placeholder="Email Address" required>
                 	<textarea name="message" rows="3" class="form-control" id="message" placeholder="Message" required></textarea>
                    <input name="submit" type="submit" class="form-control" id="submit" value="Send Message">
               </form>
          </div>
     </div>
</div>


<!-- Back top -->

<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- SCRIPTS -->

<script src="js/js/jquery.js"></script>
<script src="js/js/bootstrap.min.js"></script>
<script src="js/js/jquery.magnific-popup.min.js"></script>
<script src="js/js/magnific-popup-options.js"></script>
<script src="js/js/owl.carousel.min.js"></script>
<script src="js/js/smoothscroll.js"></script>
<script src="js/js/wow.min.js"></script>
<script src="js/js/custom.js"></script>

</body>
</html>