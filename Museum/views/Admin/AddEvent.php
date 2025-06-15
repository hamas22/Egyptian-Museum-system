<?php
session_start();
require_once '../../controllers/controle.php'; 
$museumController = new museum_controller();


if (!$museumController->openconnection()) {
    die("Failed to connect to the database.");
}

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../User/index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $museumController->escape_string($_POST['eventName']);
    $eventDescription = $museumController->escape_string($_POST['eventDescription']);
    $eventDate = $_POST['eventDate'];
    $admin_id = $_SESSION['admin_id'];

    $imageName = $_FILES['eventPhoto']['name'];
    $imageTmp = $_FILES['eventPhoto']['tmp_name'];
    $uploadPath = "Uploads/" . $imageName;

    if (move_uploaded_file($imageTmp, $uploadPath)) {
        $sql = "INSERT INTO event (title, description, date, image, admin_id)
                VALUES ('$eventName', '$eventDescription', '$eventDate', '$uploadPath', '$admin_id')";

        if ($museumController->insert($sql)) { 
            echo "Event added successfully!";
            echo '<br><a href="AddEvent.php">Add Another Event</a>';
        } else {
            echo "Database Error: " . $museumController->connection->error; 
        }
    } else {
        echo "Image upload failed.";
    }
}

$museumController->closeconnection(); 
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <style>

            .modal {
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

            body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        padding: 40px;
    }

    .form-container {
        max-width: 600px;
        margin: auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        resize: vertical;
        height: 120px;
    }

    button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

body {
background: linear-gradient(to bottom, #efebe9, #d7ccc8);
  font-family: 'Segoe UI', sans-serif;
  margin: 0;
  padding: 0;
}

.about-content h1 {
  font-size: 2.8rem;
  font-weight: bold;
  animation: fadeDown 1s ease-out;
}

.about-content p a {
  color: #ffcc80;
  text-decoration: none;
  transition: color 0.3s ease;
}
.about-content p a:hover {
  color: #fff176;
}

@keyframes fadeDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.form-container {
  background: linear-gradient(145deg, #fbe9e7, #e0c9a6);
  max-width: 650px;
  margin: 50px auto;
  padding: 40px 50px;
  border-radius: 20px;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
  animation: slideInUp 1.2s ease;
  color: #4e342e;
}

@keyframes slideInUp {
  from {
    opacity: 0;
    transform: translateY(60px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.form-container h2 {
  text-align: center;
  color: #3e2723;
  margin-bottom: 30px;
  font-size: 2rem;
  position: relative;
}

.form-container h2::after {
  content: "";
  display: block;
  width: 60px;
  height: 4px;
  background: #d7a94b;
  margin: 10px auto 0;
  border-radius: 2px;
  animation: expandLine 1s ease-out;
}

@keyframes expandLine {
  from {
    width: 0;
  }
  to {
    width: 60px;
  }
}

.form-group {
  margin-bottom: 20px;
  animation: fadeIn 1s ease forwards;
  opacity: 0;
}
.form-group:nth-child(1) { animation-delay: 0.2s; }
.form-group:nth-child(2) { animation-delay: 0.4s; }
.form-group:nth-child(3) { animation-delay: 0.6s; }
.form-group:nth-child(4) { animation-delay: 0.8s; }

@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
}

input[type="text"],
input[type="date"],
input[type="file"],
textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #bfa16f;
  border-radius: 10px;
  background-color: #fffaf0;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  transition: border 0.3s, box-shadow 0.3s;
}

input:focus,
textarea:focus {
  border-color: #8d6e63;
  box-shadow: 0 0 8px rgba(191, 161, 111, 0.5);
  outline: none;
}

.primary-btn {
  background: linear-gradient(45deg, #6d4c41, #d7a94b);
  color: #fff;
  border: none;
  padding: 14px 25px;
  font-weight: bold;
  border-radius: 10px;
  display: block;
  margin: 20px auto 0;
  transition: background 0.4s ease, transform 0.2s ease;
  text-transform: uppercase;
  letter-spacing: 1px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}

.primary-btn:hover {
  background: linear-gradient(45deg, #5d4037, #c49b4a);
  transform: scale(1.05);
}



        </style>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="../assets/img/fav.png">
        <meta name="author" content="codepixer">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="UTF-8">
        <title>Art Museum</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
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
                        <a href="index.php"><img src="/Art Museum - Doc/img/\" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="../User/index.php">Home</a></li>
                            <li><a href="gallery.php">collections</a></li>
                            <li><a href="../User/event.php">Events</a></li>
                            <li><a href="../User/visit.php">visit</a></li>


                        </ul>
                    </nav></div>
            </div>
        </header><section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Adding Events <span style="color: rgb(195, 40, 16); ">(FOR ADMINS)</span>
                    </h1>
                    <p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="AddEvent.php" > Add Events</a></p>
                </div>
            </div>
        </div>
    </section>
    <div class="form-container">
        <h2>Add Event</h2>
        <form id="eventForm" method="POST" action="AddEvent.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="eventName">Event Name</label>
                <input type="text" id="eventName" name="eventName" required>
            </div>

            <div class="form-group">
                <label for="eventDescription">Description</label>
                <textarea id="eventDescription" name="eventDescription" required></textarea>
            </div>

            <div class="form-group">
                <label for="eventDate">Date</label>
                <input type="date" id="eventDate" name="eventDate" min="<?= date('Y-m-d'); ?>" required>
            </div>

            <div class="form-group">
                <label for="eventPhoto">Upload a photo</label>
                <input type="file" id="eventPhoto" name="eventPhoto" accept="image/*" required>
            </div>

            <button class="primary-btn text-uppercase" type="submit">Upload Event</button>
        </form>
</div>
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
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> and distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
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


    </body>
</html>