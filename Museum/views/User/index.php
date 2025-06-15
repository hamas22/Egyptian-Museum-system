
<?php
session_start();
?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<style>
			
			.modal-addevent {
			  display: none;
			  position: fixed;
			  z-index: 9999;
			  left: 0;
			  top: 0;
			  width: 100%;
			  height: 100%;
			  overflow: auto;
			  background-color: rgba(0,0,0,0.8);
			}
			
			.modal-addevent-content {
			  background-color: #fefefe;
			  margin: 10% auto;
			  padding: 30px;
			  border: 1px solid #888;
			  width: 80%;
			  max-width: 600px;
			  border-radius: 5px;
			  position: relative;
			  animation: modalopen 0.5s;
			}
			
			@keyframes modalopen {
			  from {opacity: 0; transform: translateY(-50px);}
			  to {opacity: 1; transform: translateY(0);}
			}
			
			.close-modal {
			  color: #aaa;
			  float: right;
			  font-size: 28px;
			  font-weight: bold;
			  cursor: pointer;
			  position: absolute;
			  right: 20px;
			  top: 10px;
			}
			
			.close-modal:hover,
			.close-modal:focus {
			  color: black;
			  text-decoration: none;
			}
			
			.form-group {
			  margin-bottom: 20px;
			}
			
			.form-group label {
			  display: block;
			  margin-bottom: 5px;
			  font-weight: 600;
			}
			
			.form-group input,
			.form-group select {
			  width: 100%;
			  padding: 10px;
			  border: 1px solid #ddd;
			  border-radius: 4px;
			}
			
			#bookingForm button {
			  width: 100%;
			  padding: 12px;
			  margin-top: 10px;
			}

			.event-btn {
  display: inline-block;
  padding: 12px 24px;
  background: linear-gradient(45deg, #6d4c41, #d7a94b);
  border-radius: 8px;
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}

.event-btn:hover {
  background: linear-gradient(45deg, #5d4037, #c49b4a);
  color: #fff;
  transform: scale(1.05);
  box-shadow: 0 6px 15px rgba(0,0,0,0.3);
}
.masa-btn {
  display: inline-block;
  padding: 12px 28px;
  background: linear-gradient(45deg, #5d4037, #d7a94b); 
  color: #fff;
  border-radius: 30px;
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 1px;
  text-decoration: none;
  transition: all 0.4s ease;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.masa-btn:hover {
  background: linear-gradient(45deg, #4e342e, #c49b4a);
  transform: translateY(-3px) scale(1.03);
  box-shadow: 0 8px 18px rgba(0,0,0,0.25);
}

#nav-menu-container {
  width: 100%;
  padding: 0 30px;
  background: none; 
  box-shadow: none; 
  margin-bottom: 20px;
}

.nav-menu {
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  justify-content: center; 
  align-items: center;
  gap: 20px;
  margin: 0;
  padding: 10px 0;
}

.nav-menu li {
  position: relative;
}

.nav-menu li a {
  color:rgb(255, 255, 255); 
  font-weight: 500;
  text-transform: uppercase;
  text-decoration: none;
  padding: 8px 14px;
  border-radius: 6px;
  transition: all 0.3s ease;
}

.nav-menu li a:hover,
.nav-menu .menu-active a {
  background-color: #f5f5f5;
  color: #000;
}

.event-btn {
  background: linear-gradient(45deg, #a1887f, #ffcc80);
  color: #000 !important;
  padding: 8px 18px;
  border-radius: 25px;
  font-weight: bold;
  text-decoration: none;
  transition: all 0.3s ease;
}

.event-btn:hover {
  background: linear-gradient(45deg, #8d6e63, #ffd54f);
  transform: scale(1.05);
}

		  </style>
	
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="../assets/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Egytian Museum</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="../assets/css/linearicons.css">
			<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
			<link rel="stylesheet" href="../assets/css/bootstrap.css">
			<link rel="stylesheet" href="../assets/css/magnific-popup.css">
			<link rel="stylesheet" href="../assets/css/nice-select.css">					
			<link rel="stylesheet" href="../assets/css/animate.min.css">
			<link rel="stylesheet" href="../assets/css/owl.carousel.css">
			<link rel="stylesheet" href="../assets/css/main.css">
		</head>
		<body>

			  <header id="header" id="home">
			  	<div class="container header-top">
			  		<div class="row">
				  		<div class="col-6 top-head-left">
				  			<ul>
				  				<li><a href="#">Visit Us</a></li>
				  				<li><a href="#">Buy Ticket</a></li>
				  			</ul>
				  		</div>
				  		<div class="col-6 top-head-right">
				  			<ul>
		  						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
				  			</ul>
				  		</div>			  			
			  		</div>
			  	</div>
			  	<hr>
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
				          <li><a href="../Admin/gallery.php">Collections</a></li>
						  <li><a href="membership.php">Membership</a></li>
				          <li><a href="event.php">Events</a></li>




<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
<a href="../Admin/AddEvent.php" class="event-btn">Add Event</a>
		
<?php endif; ?>


	
				          <li><a href="visit.php">Visit</a></li>
						  <li><a href="manage.php">Manage</a></li>
						  <li><a href="feedback.php">Feedback</a></li>
						<li><a href="Services.php">Services</a></li>

				          		          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-8">
							<h6 class="text-white">Openning on 15st march, 2025</h6>
							<h1 class="text-white">
								Welcome to Egyptian Museum				
							</h1>
							<p class="pt-20 pb-20 text-white">
								"The Egyptian Museum in Cairo is considered one of the most important and oldest museums in the world, housing a rare collection of archaeological treasures from ancient Egypt. This placeholder text is intended to demonstrate how content will appear within the design without relying on final wording. As visitors explore the various halls, they can immerse themselves in the world of the pharaohs and discover the details of ancient Egyptian civilization."
							</p>
							<a href="../Auth/login.php" class="masa-btn text-uppercase text-white">Get Started</a>
						</div>											
					</div>
				</div>					
			</section>
			<!-- End banner Area -->	

			<!-- Start service Area -->
			<section class="service-area pt-100 row justify-content-center align-items-center" id="about">
						<div class="col-lg-4">
							<div class="single-service">
							  <span class="lnr lnr-clock"></span>
							  <h4>Openning Hours</h4>
							  <p>
							  	 Sat- Fri: 08.00am to 05.00pm
								
							  </p>						 	
							  <div class="overlay">
							    <div class="text">
							    	<p>
							    		"The Egyptian Museum pulses with the spirit of history, taking us on a journey through time to uncover the secrets of a civilization that continues to amaze the world to this day."


							    	</p>
							    	<a href="visit.php" class="text-uppercase primary-btn">Buy ticket</a>
							    </div>
							  </div>
							</div>							
						</div>											
	
			</section>
			<!-- End service Area -->
			
			<!-- Start quote Area -->
			<section class="quote-area section-gap">
				<div class="container">				
					<div class="row">
						<div class="col-lg-6 quote-left">
							<h1>
								<span>Egyptian antiquities</span> tell the history of a great 
								<span>people </span>who lived and built a civilization that still 
								 <span>amazes </span>the world today.
							</h1>
						</div>
						<div class="col-lg-6 quote-right">
							<p>
								"Here begins the story — within walls engraved with the secrets of time, and artifacts that carry the scent of the past. The Egyptian Museum is not just a place, but a journey deep into a civilization that amazed the world and still tells its stories in silence and beauty."


							</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End quote Area -->

			<!-- Start exibition Area -->
			<section class="exibition-area section-gap" id="exhibitions">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Ongoing Exhibitions at the Egyptian Museum</h1>
								<p>"For those who carry the spirit of the Pharaohs"</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-exibition-carusel">
							<div class="single-exibition item">
								<img src="../assets/img/pg2.jpeg" alt="">
								<ul class="tags">
									<li><a href="#">Travel</a></li>
									<li><a href="#">Life style</a></li>
								</ul>
								<a href="#"><h4>visit kings in the museum</h4></a>
								<p>
									Here stand the echoes of kings whose dreams shaped eternity
								</p>
								<h6 class="date">21st February 2025</h6>
							</div>

							<div class="single-exibition item">
								<img src="../assets/img/pg4.jpeg" alt="">
								<ul class="tags">
									<li><a href="#">Travel</a></li>
									<li><a href="#">Life style</a></li>
								</ul>
								<a href="#"><h4>portable of latest blog for the museum</h4></a>
								<p>
									In every artifact, a pharaoh whispers his legacy to the future
								</p>
								<h6 class="date">23st February 2025</h6>
							</div>

							<div class="single-exibition item">
								<img src="../assets/img/pg7.webp" alt="">
								<ul class="tags">
									<li><a href="#">Travel</a></li>
									<li><a href="#">Life style</a></li>
								</ul>
								<a href="#"><h4>Mummy </h4></a>
								<p>
									The Egyptian Museum houses some of the world’s most well-preserved mummies
								</p>
								<h6 class="date">3 March 2025</h6>
							</div>							
							<div class="single-exibition item">
								<img src="../assets/img/pg8.webp" alt="">
								<ul class="tags">
									<li><a href="#">Travel</a></li>
									<li><a href="#">Life style</a></li>
								</ul>
								<a href="#"><h4>King Tut</h4></a>
								<p>
									The tomb of Tutankhamun is one of the most famous discoveries in the Valley of the Kings
								</p>
								<h6 class="date">5 March 2025</h6>
							</div>

							<div class="single-exibition item">
								<img src="../assets/img/pg9.jpeg" alt="">
								<ul class="tags">
									<li><a href="#">Travel</a></li>
									<li><a href="#">Life style</a></li>
								</ul>
								<a href="#"><h4>Drawing the King</h4></a>
								<p>
									drawing the king was not just a depiction of a ruler, but an immortalization of divine power, where every line captured the essence of eternity.
								</p>
								<h6 class="date">15 March 2025</h6>
							</div>

							<div class="single-exibition item">
								<img src="../assets/img/pg11.jpeg" alt="">
								<ul class="tags">
									<li><a href="#">Travel</a></li>
									<li><a href="#">Life style</a></li>
								</ul>
								<a href="#"><h4>Anubis</h4></a>
								<p>
									one of the most famous gods in ancient Egyptian mythology. He is known as the God of the Dead and Embalming, and he was responsible for guiding souls to the afterlife and protecting tombs.

								</p>
								<h6 class="date">15 March 2025</h6>
							</div>							
							<div class="single-exibition item">
								<img src="../assets/img/pg14.jpeg" alt="">
								<ul class="tags">
									<li><a href="#">Travel</a></li>
									<li><a href="#">Life style</a></li>
								</ul>
								<a href="#"><h4>Power of King Tutankhamun
								</h4></a>
								<p>
									utankhamun's legacy echoes through the centuries. His reign marked a return to traditional beliefs and stability after a period of turmoil.
								</p>
								<h6 class="date">29 March 2025</h6>
							</div>

							<div class="single-exibition item">
								<img class="../assets/img-fluid" src="../assets/img/pg13.jpeg" alt="">
								<ul class="tags">
									<li><a href="#">Travel</a></li>
									<li><a href="#">Life style</a></li>
								</ul>
								<a href="#"><h4>The Legend of Anubis
								</h4></a>
								<p>
									Anubis emerged as a mysterious and powerful deity. With the head of a jackal and the body of a man, he became the guardian of the dead, the protector of tombs, and the master of embalming.

								</p>
								<h6 class="date">9 April 2025</h6>
							</div>

							<div class="single-exibition item">
								<img class="../assets/img-fluid" src="../assets/img/pg15.jpeg" alt="">
								<ul class="tags">
									<li><a href="#">Travel</a></li>
									<li><a href="#">Life style</a></li>
								</ul>
								<a href="#"><h4>The Builders of the Pyramids</h4></a>
								<p>
									The pyramids have long stood as symbols of the grandeur of ancient Egyptian civilization. But behind these architectural marvels were thousands of skilled workers, artisans, and engineers who carved their glory into stone with tireless hands and unwavering hearts.
								</p>
								<h6 class="date">12 May 2025</h6>
							</div>
						</div>													
					</div>
				</div>	
			</section>
			<!-- End exibition Area -->			
		
			<!-- Start upcoming-event Area -->
			<section class="upcoming-event-area section-gap" id="events">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Checkout our Upcoming Events</h1>
								<p>Who are in extremely love with culture.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-6 event-left">
							<div class="single-events">
								<img class="img-fluid" src="../assets/img/pg16.jpg" alt="">
								<a href="event.php"><h4>Event on the kings place</h4></a>
								<h6><span>20st Februay</span> at the Egyptian Museum</h6>
								<p>
									Step into the heart of ancient power at The Place of Kings, inside the legendary Egyptian Museum. Join us for an unforgettable evening where history comes alive among the shadows of mighty pharaohs.

								</p>
								<a href="event.php" class="primary-btn text-uppercase">View Details</a>
							</div>
							<div class="single-events">
								<img class="img-fluid" src="../assets/img/pg17.jpeg" alt="">
								<a href="event.php"><h4>Event on A Day in the Life of Ancient Egyptians</h4></a>
								<h6><span>21st February</span> at Central government museum</h6>
								<p>
									Discover what the pharaohs ate, how they dressed, the secrets of their homes, their farming techniques, the crafts they mastered, and even the games they played!
								</p>
								<a href="event.php" class="primary-btn text-uppercase">View Details</a>
							</div>							
						</div>
						<div class="col-lg-6 event-right">
							<div class="single-events">
								<a href="event.php"><h4>Event on The Unity and Power of Civilizations</h4></a>
								<h6><span>11st March</span> at Central government museum</h6>
								<p>
									The true strength of civilizations lies in their connection, not in isolation. Each civilization contributed a stone to the structure of humanity, and every cultural exchange sparked new waves of progress. When civilizations come together, identities are not erased — they blossom, reflecting the finest expressions of the human spirit.
								</p>
								<a href="event.php" class="primary-btn text-uppercase">View Details</a>
								<img class="img-fluid" src="../assets/img/pg18.jpeg" alt="">
							</div>
							<div class="single-events">
								
								<a href="event.php"><h4>Event on the Pharaonic Eras </h4></a>
								<h6><span>12st May</span> at the Egyptian Museum</h6>
								<p>
									The Pharaonic era began with the unification of Upper and Lower Egypt by King Menes (Narmer) around 3100 BCE, marking the start of a civilization that thrived for over 3,000 years.

								</p>
								<a href="event.php" class="primary-btn text-uppercase">View Details</a>
								<img class="img-fluid" src="../assets/img/pg19.jpeg" alt="">
								
							</div>							
						</div>
					</div>
				</div>	
			</section>
			<!-- End upcoming-event Area -->
			
			

			<!-- Start gallery Area -->
			<section class="gallery-area section-gap" id="gallery">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Our Exhibition Gallery</h1>
								<p>Some Photos that describe our civi.</p>
							</div>
						</div>
					</div>						
					<div id="grid-container" class="row">
						<a class="single-gallery" href="../assets/img/pg2.jpeg"><img class="grid-item" src="../assets/img/pg2.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg3.jpeg"><img class="grid-item" src="../assets/img/pg3.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg4.jpeg"><img class="grid-item" src="../assets/img/pg4.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg5.jpeg"><img class="grid-item" src="../assets/img/pg5.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg6.jpeg"><img class="grid-item" src="../assets/img/pg6.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg7.webp"><img class="grid-item" src="../assets/img/pg7.webp"></a>
						<a class="single-gallery" href="../assets/img/pg8.webp"><img class="grid-item" src="../assets/img/pg8.webp"></a>
						<a class="single-gallery" href="../assets/img/pg9.jpeg"><img class="grid-item" src="../assets/img/pg9.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg10.jpeg"><img class="grid-item" src="../assets/img/pg10.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg11.jpeg"><img class="grid-item" src="../assets/img/pg11.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg12.jpeg"><img class="grid-item" src="../assets/img/pg12.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg13.jpeg"><img class="grid-item" src="../assets/img/pg13.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg14.jpeg"><img class="grid-item" src="../assets/img/pg4.jpeg"></a>
						<a class="single-gallery" href="../assets/img/pg15.jpeg"><img class="grid-item" src="../assets/img/pg15.jpeg"></a>						
					</div>	
				</div>	
			</section>
			<!-- End gallery Area -->
			

			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
								<p class="footer-text">
									
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  

								</p>
							</div>
						</div>
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
										<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
			                            	<button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
			                            	<div style="position: absolute; left: -5000px;">
												<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
											</div>

										<div class="info"></div>
									</form>
								</div>
							</div>
						</div>						
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->		
			
		 <!-- modal-addevent -->
		 <div id="modal-addevent" class="modal-addevent">
			<div class="modal-addevent-content">
			  <span class="close-modal" onclick="closeModal()">&times;</span>
			  <h2>-----------</h2>
			  
			  <form id="bookingForm" action="AddEvent.php" method="POST">
				
				<div class="form-group">
				  <label for="username">User Name</label>
				  <input type="text" id="username" name="username" required />
				</div>
		  
				<div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" id="password" name="password" required />
				</div>
		  
				<button type="button" onclick="window.location.href='../Admin/AddEvent.php'" class="primary-btn text-uppercase">
  Confirm
</button>
			  </form>
			</div>
		  </div>

			  


			<script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="../assets/js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="../assets/js/easing.min.js"></script>			
			<script src="../assets/js/hoverIntent.js"></script>
			<script src="../assets/js/superfish.min.js"></script>	
			<script src="../assets/js/jquery.ajaxchimp.min.js"></script>
			<script src="../assets/js/jquery.magnific-popup.min.js"></script>	
			<script src="../assets/js/owl.carousel.min.js"></script>	
			<script src="../assets/js/imagesloaded.pkgd.min.js"></script>
			<script src="../assets/js/justified.min.js"></script>					
			<script src="../assets/js/jquery.sticky.js"></script>
			<script src="../assets/js/jquery.nice-select.min.js"></script>			
			<script src="../assets/js/parallax.min.js"></script>		
			<script src="../assets/js/mail-script.js"></script>	
			<script src="../assets/js/main.js"></script>	

			<script>
				// modal-addevent functionality (keep the existing open/close functions)
				function openModal() {
					
				  document.getElementById('modal-addevent').style.display = 'block';
				  document.body.style.overflow = 'hidden';
				}
				
				function closeModal() {
				  document.getElementById('modal-addevent').style.display = 'none';
				  document.body.style.overflow = 'auto';
				}
				
				window.onclick = function(event) {
				  const modal = document.getElementById('modal-addevent');
				  if (event.target == modal-addevent) {
					closeModal();
				  }
				}
			  </script>
		</body>
	</html>



