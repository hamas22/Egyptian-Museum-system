

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<style>
		/* modal-addevent Styles */
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
		/* Modal Styles */
		.modal-book {
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
		
		.modal-content {
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
	<title>Art Museum</title>

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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
					<li><a href="ticket.php">Membership</a></li>
					<li><a href="../Admin/gallery.php">collections</a></li>
					<li><a href="visit.php">Visit</a></li>
					
					
								          
				  </ul>
				</nav><!-- #nav-menu-container -->		    		
			  </div>
		  </div>
		</header><!-- #header -->

		<!-- start banner Area -->
		<section class="banner-area relative" id="home">	
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12">
						<h1 class="text-white">
							Upcoming Events		
						</h1>	
						<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="event.php"> Events</a></p>
					</div>											
				</div>
			</div>
		</section>
		<!-- End banner Area -->	

		<!-- Start upcoming-event Area -->
		<section class="upcoming-event-area section-gap" id="events">
			<div class="container">
				<div>
					<div class="menu-content pb-60 col-lg-10">
						<div class="title text-center">
							<h1 class="mb-10">Checkout our Upcoming Events</h1>
							<p>Who are in extremely love with Egypt civilization.</p>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-10">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-dark">
									<i class="fas fa-search text-light"></i>
									</span> 
								</div>
								<input type="text" id="searchInput" class="form-control" placeholder="Search user...">
							</div>
						</div>
						<div class="col-2">
							<button class="btn btn-dark">
							<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <a href="../Admin/AddEvent.php" class="text-light">Add new Event</a>
<?php endif; ?>
							</button>
						</div>
					</div>
					<script>
document.getElementById("searchInput").addEventListener("keyup", function() {
    let input = this.value.toLowerCase();
    let rows = document.querySelectorAll("#usertable tbody tr");

    rows.forEach(function(row) {
        let title = row.children[1].textContent.toLowerCase(); 
        if (title.includes(input)) {
            row.style.display = ""; 
        } else {
            row.style.display = "none"; 
        }
    });
});
</script>



					<!-- table -->
					<div class="table-responsive">
    <table class="table table-hover table-bordered text-center align-middle" id="usertable">
      <thead class="table-dark">
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Event Name</th>
          <th scope="col">Description</th>
          <th scope="col">Date</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $conn = new mysqli("localhost", "root", "", "museum");

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM event";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td><img src='../Admin/" . $row['image'] . "' width='100' height='70' class='rounded shadow-sm'></td>";
				echo "<td>" . htmlspecialchars($row['title']) . "</td>";
				echo "<td>" . htmlspecialchars($row['description']) . "</td>";
				echo "<td>" . htmlspecialchars($row['date']) . "</td>";
			
				echo "<td>";
			
				if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
					echo "
					<a href='#' class='btn btn-sm btn-info me-2 editevent' 
					   data-id='" . $row['event_Id'] . "' 
					   data-title='" . htmlspecialchars($row['title'], ENT_QUOTES) . "' 
					   data-description='" . htmlspecialchars($row['description'], ENT_QUOTES) . "' 
					   data-date='" . $row['date'] . "'>
					  <i class='fas fa-edit'></i>
					</a>
			
					<a href='DeleteEvent.php?id=" . $row['event_Id'] . "' 
					   class='btn btn-sm btn-danger me-2' 
					   onclick=\"return confirm('Are you sure you want to delete this event?');\">
					  <i class='fas fa-trash-alt'></i>
					</a>";
				}
			
				if (isset($_SESSION['role']) && $_SESSION['role'] === 'user') {
					echo "
					<button class='btn btn-sm btn-success book-event' 
							data-id='" . $row['event_Id'] . "' 
							data-title='" . htmlspecialchars($row['title'], ENT_QUOTES) . "' 
							data-description='" . htmlspecialchars($row['description'], ENT_QUOTES) . "' 
							data-date='" . $row['date'] . "'
							data-toggle='modal' 
							data-target='#bookEventModal'>
					  Book
					</button>";
				}
			
				echo "</td>";
				echo "</tr>";
			}
		}
			else {
          echo "<tr><td colspan='5'>No events found.</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>

				</div>																
			</div>	
		</section>
		<!-- End upcoming-event Area -->
	
		
		<!-- Start blog Area -->
		<section class="blog-area section-gap" id="blog">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-70 col-lg-8">
						<div class="title text-center">
							<h1 class="mb-10">Latest From Our Blog</h1>
							<p>Some of feedbacks on our events.</p>
						</div>
					</div>
				</div>					
				<div class="row">
					<div class="col-lg-3 col-md-6 single-blog" >
						<div class="thumb">
							<img class="img-fluid" src="../assets/img/202312016c4a83a2ff724119828fdc4852d6a1ef_CcrbeeE007023_20231201_CBMFN0A004.jpeg" alt="">								
						</div>
						<p class="date">10 Jan 2024</p>
						<a href="#"><h4>feedbacks on the pyramid builders event</h4></a>
						<p>
							Thats was amazing and very helpfull to know about the Egyptian civilization
						</p>
						<div class="meta-bottom d-flex justify-content-between">
							<p><span class="lnr lnr-heart"></span> 15 Likes</p>
							<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
						</div>									
					</div>
					<div class="col-lg-3 col-md-6 single-blog">
						<div class="thumb">
							<img class="img-fluid" src="../assets/img/b901d3c03922b8644e2628feb32674b7-2.jpeg" alt="">								
						</div>
						<p class="date">15 Jan 2023</p>
						<a href="#"><h4>feedbacks on the Mummy event</h4></a>
						<p>
							it was very exciting day and i gain alot of information.
						</p>
						<div class="meta-bottom d-flex justify-content-between">
							<p><span class="lnr lnr-heart"></span> 13 Likes</p>
							<p><span class="lnr lnr-bubble"></span> 05 Comments</p>
						</div>									
					</div>
					<div class="col-lg-3 col-md-6 single-blog">
						<div class="thumb">
							<img class="img-fluid" src="../assets/img/tourist-couple-pyramids.jpg" alt="">								
						</div>
						<p class="date">23 Jul 2024</p>
						<a href="#"><h4>feedbacks on the unity and power of civilization</h4></a>
						<p>
							It was good and exciting.
						</p>
						<div class="meta-bottom d-flex justify-content-between">
							<p><span class="lnr lnr-heart"></span> 20 Likes</p>
							<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
						</div>									
					</div>
					<div class="col-lg-3 col-md-6 single-blog">
						<div class="thumb">
							<img class="img-fluid" src="../assets/img/018.jpg.webp" alt="">								
						</div>
						<p class="date">05 Dec 2024</p>
						<a href="#"><h4>feedbacks on the king Life event</h4></a>
						<p>
							we like it so much.
						</p>
						<div class="meta-bottom d-flex justify-content-between">
							<p><span class="lnr lnr-heart"></span> 15 Likes</p>
							<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
						</div>									
					</div>							
				</div>
			</div>	
		</section>
		<!-- End blog Area -->

		<!-- start footer Area -->		
		<footer class="footer-area section-gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<h6>About Us</h6>
						
							<p class="footer-text">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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
			  
			  <form id="bookingForm" action="../Admin/AddEvent.php" method="POST">
				
				<div class="form-group">
				  <label for="email">User Name</label>
				  <input type="text" id="email" name="email" required />
				</div>
		  
				<div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" id="password" name="password" required />
				</div>
		  
				<button type="submit" class="primary-btn text-uppercase" name="login">Confirm</button>
			  </form>
			</div>
		  </div>

		  <!-- Modal -->
		<div id="bookingModal" class="modal-book">
			<div class="modal-content">
			  <span class="close-modal" onclick="closeModal()">&times;</span>
			  <h2>The Choosen event</h2>
			  <h2>Booking ID:</h2>
			  <form id="bookingForm" action="payment2.php" method="GET">
				
				<div class="form-group">
				  <label for="tickets">Number of Tickets</label>
				  <select id="tickets" name="tickets">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5+</option>
				  </select>
				</div>
				<button type="button" class="primary-btn text-uppercase" onclick="window.location.href='payment_event.php'">
  Confirm Booking
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
		<script src="../assets/js/mail-script.js"></script>	
		<script src="../assets/js/main.js"></script>	



		<script>
  const editLinks = document.querySelectorAll(".editevent");

  editLinks.forEach(link => {
    link.addEventListener("click", function () {
      document.getElementById("editEventId").value = this.dataset.id;
      document.getElementById("editEventName").value = this.dataset.title;
      document.getElementById("editEventDescription").value = this.dataset.description;
      document.getElementById("editEventDate").value = this.dataset.date;
      document.getElementById("editEventModal").style.display = "block";
    });
  });

  function closeModal() {
    document.getElementById("editEventModal").style.display = "none";
  }
</script>



<div class="modal" id="editEventModal" tabindex="-1" role="dialog" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="editForm" method="POST" action="EditEvent.php">
        <div class="modal-header">
          <h5 class="modal-title">Edit Event</h5>
          <button type="button" onclick="closeModal()" class="close">&times;</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="event_Id" id="editEventId">
          <div class="form-group">
            <label>Event Name:</label>
            <input type="text" name="eventName" id="editEventName" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Description:</label>
            <textarea name="eventDescription" id="editEventDescription" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Date:</label>
            <input type="date" name="eventDate" id="editEventDate" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" onclick="closeModal()" class="btn btn-secondary">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById("editEventDate").setAttribute("min", today);
  });

  document.addEventListener("click", function (e) {
    if (e.target.classList.contains("editevent")) {
      const today = new Date().toISOString().split('T')[0];
      document.getElementById("editEventDate").setAttribute("min", today);
    }
  });


document.querySelectorAll('.book-event').forEach(button => {
  button.addEventListener('click', function () {
    const eventId = this.dataset.id;
    const title = this.dataset.title;
    
    const visitors = prompt("Enter number of visitors:");
    
    if (visitors && Number(visitors) > 0) {
      const bookingData = {
        title: title,
        description: "Some event description",
        date: "2025-05-01",
        count: visitors,
        price: 50,
        total: 50 * Number(visitors)
      };
      localStorage.setItem('ticketData', JSON.stringify(bookingData));
      window.location.href = 'payment_event.php';
    }
  });
});

</script>

	</body>
</html>


