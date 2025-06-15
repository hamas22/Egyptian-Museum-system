<?php
session_start();

$user_Id = $_SESSION['user_id'] ?? null;
$memberships = [];

require_once '../../controllers/controle.php';
$museumController = new museum_controller();

if ($museumController->openconnection()) {
    if ($user_Id) {
        
        $query = "SELECT type_of_membership FROM membership WHERE user_Id = $user_Id";
     
        $result = $museumController->select($query);

        if ($result) {
            foreach ($result as $row) {
                $memberships[] = $row['type_of_membership'];
            }
        }
    }

} else {
    
    echo "Failed to connect to the database.";
   
}

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../assets/img/fav.png">
    <meta name="author" content="codepixer">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Membership</title>

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
<style>

</style>

<body>

    <header id="header" id="home">
        <div class="container header-top">
        </div>
        </div>
        <hr>
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.php"><img src="../assets/img/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="index.php">Home</a></li>
                        <li><a href="../Admin/gallery.php">collection</a></li>
                        <li><a href="visit.php">Visit</a></li>
                        <li><a href="event.php">Events</a></li>
                    </ul>
                </nav></div>
        </div>
    </header><section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Subscribe Memberships
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="upcoming-exibition-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Membership Is Excellent In Our Museum.</h1>
                        <p>Come and join us now in our Egyptian Museum and enjoy the premium membership.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="../assets/img/memi.jpg" alt="">
                    </div>
                    <h4>Individual Membership</h4>
                    <p>
                        Free general admission for one person. 10% discount at gift shop.
                        Invitations to members-only events.
                    </p>
                    <div class="meta-bottom d-flex justify-content-between align-items-center">
                        <p class="price m-0 " style="color: #FFD700;">500 EGP</p>
                        <?php
                        $type = "Individual Membership";
                        if (in_array($type, $memberships)) {
                          
                            echo '<a href="cancel_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color: red; color:white; padding: 6px 8px;margin-bottom: 8px;">Cancel</a>';
                        } else {
                           
                            echo '<a href="mem_confirm.php?type=' . urlencode($type) . '" class="btn" style="background-color: #FFD700; color:black; padding: 6px 8px;margin-bottom: 8px;">Join Now</a>';
                        }
                        if (in_array($type, $memberships)) {
                            echo '<a href="edit_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color:blue; color:white; padding: 6px 8px; margin-bottom: 8px;">Edit</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="../assets/img/memf.jpg" alt="">
                    </div>

                    <h4>Family Membership</h4>
                    <p>
                        Free admission for 2 adults + 2 children. 15% discount at gift shop and café. Access to family events and
                        workshops.
                    </p>
                    <div class="meta-bottom d-flex justify-content-between align-items-center">
                        <p class="price m-0 " style="color: #FFD700;">1200 EGP</p>
                        <?php
                        $type = "Family Membership";
                        if (in_array($type, $memberships)) {
                          
                            echo '<a href="cancel_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color: red; color:white; padding: 6px 8px;margin-bottom: 8px;">Cancel</a>';
                        } else {
                          
                            echo '<a href="mem_confirm.php?type=' . urlencode($type) . '" class="btn" style="background-color: #FFD700; color:black; padding: 6px 8px;margin-bottom: 8px;">Join Now</a>';
                        }
                        if (in_array($type, $memberships)) {
                            echo '<a href="edit_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color:blue; color:white; padding: 6px 8px; margin-bottom: 8px;">Edit</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="../assets/img/mems.jpg" alt="">
                    </div>
                    <h4>Student Membership</h4>
                    <p>
                        Free admission for one student. Must show student ID.10% discount at gift shop.Access to educational
                        events.</p>
                    <div class="meta-bottom d-flex justify-content-between align-items-center">
                        <p class="price m-0 " style="color: #FFD700;">250 EGP</p>
                        <?php
                        $type = "Student Membership";
if (in_array($type, $memberships)) {
   
    echo '<a href="cancel_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color: red; color:white; padding: 6px 8px;margin-bottom: 8px;">Cancel</a>';
} else {
 
    echo '<a href="mem_confirm.php?type=' . urlencode($type) . '" class="btn" style="background-color: #FFD700; color:black; padding: 6px 8px;margin-bottom: 8px;">Join Now</a>';
}
                        if (in_array($type, $memberships)) {
                            echo '<a href="edit_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color:blue; color:white; padding: 6px 8px; margin-bottom: 8px;">Edit</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="../assets/img/memse.jpg" alt="">
                    </div>

                    <h4>Senior Membership</h4>

                    <p>
                        +For individuals aged 60.Free admission. 10% discount at café and store. Priority booking for events.</p>
                    <div class="meta-bottom d-flex justify-content-between align-items-center">
                        <p class="price m-0 " style="color: #FFD700;">300 EGP</p>
                        <?php
                        $type = "Senior Membership";
                       if (in_array($type, $memberships)) {
   
    echo '<a href="cancel_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color: red; color:white; padding: 6px 8px;margin-bottom: 8px;">Cancel</a>';
} else {
   
    echo '<a href="mem_confirm.php?type=' . urlencode($type) . '" class="btn" style="background-color: #FFD700; color:black; padding: 6px 8px;margin-bottom: 8px;">Join Now</a>';
}
                        if (in_array($type, $memberships)) {
                            echo '<a href="edit_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color:blue; color:white; padding: 6px 8px; margin-bottom: 8px;">Edit</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="../assets/img/memd.jpg" alt="">
                    </div>
                    <h4>Dual Membership</h4>
                    <p>
                        Admission for 2 adults. 10% discount at gift shop. Exclusive invitations to preview exhibitions.The duoble
                        may have one person with them.</p>
                    <div class="meta-bottom d-flex justify-content-between align-items-center">
                        <p class="price m-0 " style="color: #FFD700;">800 EGP</p>
                        <?php
                        $type = "Dual Membership";
                       if (in_array($type, $memberships)) {
   
    echo '<a href="cancel_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color: red; color:white; padding: 6px 8px;margin-bottom: 8px;">Cancel</a>';
} else {
  
    echo '<a href="mem_confirm.php?type=' . urlencode($type) . '" class="btn" style="background-color: #FFD700; color:black; padding: 6px 8px;margin-bottom: 8px;">Join Now</a>';
}
                        if (in_array($type, $memberships)) {
                            echo '<a href="edit_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color:blue; color:white; padding: 6px 8px; margin-bottom: 8px;">Edit</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="../assets/img/memv.jpg" alt="">
                    </div>
                    <h4>Honorary Membership</h4>
                    <p>
                        Granted to special contributors. All general access benefits.Lifetime access without renewal.VIP
                        invitations to all events.</p>
                    <div class="meta-bottom d-flex justify-content-between align-items-center">
                        <p class="price m-0 " style="color: #FFD700;">1200 EGP</p>
                        <?php
                        $type = "Honorary Membership";
                       if (in_array($type, $memberships)) {
    
    echo '<a href="cancel_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color: red; color:white; padding: 6px 8px;margin-bottom: 8px;">Cancel</a>';
} else {
 
    echo '<a href="mem_confirm.php?type=' . urlencode($type) . '" class="btn" style="background-color: #FFD700; color:black; padding: 6px 8px;margin-bottom: 8px;">Join Now</a>';
}
                        if (in_array($type, $memberships)) {
                            echo '<a href="edit_membership.php?type=' . urlencode($type) . '" class="btn" style="background-color:blue; color:white; padding: 6px 8px; margin-bottom: 8px;">Edit</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                            dolore magna aliqua.
                        </p>
                        <p class="footer-text">
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> and distributed
                            by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                            </p>
                    </div>
                </div>
                <div class="col-lg-5 	col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">
                            <form target="_blank" novalidate="true"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter Email '" required="" type="email">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvtyaPmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"></script>
 <script src="../assets/js/vendor/bootstrap.min.js"></script>
 <script src="../assets/js/jquery.ajaxchimp.min.js"></script>
 <script src="../assets/js/jquery.nice-select.min.js"></script>
<script src="../assets/js/jquery.magnific-popup.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>

</html>