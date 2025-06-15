<?php
session_start();
$isAdmin = (isset($_SESSION['role']) && $_SESSION['role'] === 'admin');
?>


<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
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
  <style>
  .card-img-top {
    height: 300px;
  }

  .heart-container {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 18px;
    cursor: pointer;
    user-select: none;
  }

  .heart-icon {
    font-size: 18px;
    transition: transform 0.3s ease;
  }

  .heart-icon.clicked {
    transform: scale(1.1);
  }

  .custom-outline {
    border-color: #0d6efd;
    outline: 2px solid #96b7e7;
  }

  .custom-outline:focus {
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    border-color: #0d6efd;
    outline: none;
  }
  </style>

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
          <a href="index.php"><img src="../assets/img/logo.png" alt="" title="" /></a>
        </div>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="../User/index.php">Home</a></li>
            <li><a href="../User/ticket.php">Membership</a></li>
            <li><a href="../User/event.php">Events</a></li>
            <li><a href="../User/visit.php">Visit</a></li>
            </li>
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
        <divctions class="about-content col-lg-12">
          <h1 class="text-white">
            Collections
          </h1>

        </divctions>
      </div>
    </div>
  </section>
  <!-- End banner Area -->


  <!-- Start gallery Area -->


  <section class="gallery-area section-gap gallery-page-area" id="gallery">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="menu-content pb-70 col-lg-8">
          <div class="title text-center">
            <h1 class="mb-10">Our Collection Museum</h1>
            <p>In our museum there are all the statues from the ancient era. Look at the photo gallery and choose.</p>
          </div>
        </div>
      </div>
      <!-- start search bar -->
      <select id="categorySelect" class="form-select mx-auto custom-outline" style="width: 700px;">
        <option value="all" selected>All Categories</option>
        <option value="ancient">Ancient Statues</option>
        <option value="jewelry">Jewelry</option>
        <option value="painting">Artistic Paintings</option>
      </select>

      <!-- end search-bar -->
      <?php if ($isAdmin): ?>
      <div class="text-center mb-4">
        <button id="addGalleryBtn" class="btn btn-success">Add Gallery</button>
      </div>

      <div id="galleryForm" class="container mb-5" style="display:none;">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <form id="newGalleryForm" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="imageUrl" class="form-label">Image URL</label>
                <input type="file" class="form-control" id="imageFile" accept="image/*" required>
              </div>
              <div class="mb-3">
                <label for="galleryTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="galleryTitle" required>
              </div>
              <div class="mb-3">
                <label for="galleryDesc" class="form-label">Description</label>
                <textarea class="form-control" id="galleryDesc" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
            </form>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <div class="row mt-5 mb-5">


        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item ancient ">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/m1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Ramses II">Ramses II</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>

            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item ancient">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/m2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Khufu  ">Khufu </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12  filter-item ancient">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/m3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Akhenaten ">Akhenaten </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item ancient ">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/m4.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Thutmose III">Thutmose III</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12  filter-item ancient">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/m5.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Amenhotep III">Amenhotep III</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12  filter-item ancient">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/m6.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Hatshepsut ">Hatshepsut </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item ancient ">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/m7.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Cleopatra VII">Cleopatra VII</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-2  col-md-6 col-12 filter-item ancient ">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/m9.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Narmer">Narmer</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item ancient">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/m10.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Mentuhotep</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12  filter-item jewelry">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/j5.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Golden ring </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12  filter-item jewelry">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/j7.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">The royal ring </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12  filter-item jewelry">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/j6.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Decorated necklace</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12  filter-item jewelry">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/j4.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Eye ring </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item jewelry ">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/j2.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Pharaonic necklace</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item jewelry">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/j1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Golden necklace</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item painting">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/ar4.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Queens painting</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item painting">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/ar6.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Great board</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item painting">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/ar7.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Soldiers painting </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item painting">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/ar5.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Queen Hatshepsut</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item painting">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/ar2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Ancient kings </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item painting">
          <div class="card" style="width: 18rem;">
            <img src="../assets/img/ar.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="Mentuhotep">Wives of kings</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Start blog Area -->

      <section class="blog-area section-gap" id="blog">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
              <div class="title text-center">
                <h1 class="mb-10">Latest From Our Blog</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 single-blog">
              <div class="thumb">
                <img class="img-fluid" src="../assets/img/m15.jpg" alt="">
              </div>
              <p class="date">19 Jan 2018</p>
              <a href="#">
                <h4>Addiction When Gambling
                  Becomes A Problem</h4>
              </a>
              <p>
                inappropriate behavior ipsum dolor sit amet, consectetur.
              </p>
              <div class="meta-bottom d-flex justify-content-between">
                <span class="heart-container">
                  <span class="heart-icon">❤</span>
                  <span class="likes-count">25 Likes</span>
                </span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 single-blog">
              <div class="thumb">
                <img class="img-fluid" src="../assets/img/m16.jpeg" alt="">
              </div>
              <p class="date">10 mar 2022</p>
              <a href="#">
                <h4>Addiction When Gambling
                  Becomes A Problem</h4>
              </a>
              <p>
                inappropriate behavior ipsum dolor sit amet, consectetur.
              </p>
              <div class="meta-bottom d-flex justify-content-between">
                <span class="heart-container">
                  <span class="heart-icon">❤</span>
                  <span class="likes-count">22 Likes</span>
                </span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 single-blog">
              <div class="thumb">
                <img class="img-fluid" src="../assets/img/m17.jpeg" alt="">
              </div>
              <p class="date">20 Jan 2024</p>
              <a href="#">
                <h4>Addiction When Gambling
                  Becomes A Problem</h4>
              </a>
              <p>
                inappropriate behavior ipsum dolor sit amet, consectetur.
              </p>
              <div class="meta-bottom d-flex justify-content-between">
                <span class="heart-container">
                  <span class="heart-icon">❤</span>
                  <span class="likes-count">19 Likes</span>
                </span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 single-blog">
              <div class="thumb">
                <img class="img-fluid" src="../assets/img/m20.jpg" alt="">
              </div>
              <p class="date">15 April 2019</p>
              <a href="#">
                <h4>Addiction When Gambling
                  Becomes A Problem</h4>
              </a>
              <p>
                inappropriate behavior ipsum dolor sit amet, consectetur.
              </p>
              <div class="meta-bottom d-flex justify-content-between">
                <span class="heart-container">
                  <span class="heart-icon">❤</span>
                  <span class="likes-count">18 Likes</span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End blog Area -->
      <!-- start blog Boster -->
      <section class="blog-posts-area section-gap">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 post-list blog-post-list">
              <div class="single-post">
                <img class="img-fluid" src="../assets/img/bo1.jpg" alt="">
                <ul class="tags">
                  <li><a href="#">Art, </a></li>
                  <li><a href="#">Technology, </a></li>
                  <li><a href="#">Fashion</a></li>
                </ul>
                <a href="blog-single.php">
                  <h1>
                    Cartridge Is Better Than Ever
                    A Discount Toner
                  </h1>
                </a>
                <p>
                  MCSE boot camps have its supporters and its detractors. Some people do not understand why you should
                  have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of
                  the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.
                  who has the willpower to actually sit through a self-imposed MCSE training.
                </p>
                <div class="bottom-meta">
                  <div class="user-details row align-items-center">
                    <div class="comment-wrap col-lg-6">
                      <ul>
                        <li><a href="#"><span class="lnr lnr-heart"></span> 4 likes</a></li>
                        <li><a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a></li>
                      </ul>
                    </div>
                    <div class="social-wrap col-lg-6">
                      <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
              <div class="single-post">
                <img class="img-fluid" src="../assets/img/bo2.jpeg" alt="">
                <ul class="tags">
                  <li><a href="#">Art, </a></li>
                  <li><a href="#">Technology, </a></li>
                  <li><a href="#">Fashion</a></li>
                </ul>
                <a href="blog-single.php">
                  <h1>
                    Cartridge Is Better Than Ever
                    A Discount Toner
                  </h1>
                </a>
                <p>
                  MCSE boot camps have its supporters and its detractors. Some people do not understand why you should
                  have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of
                  the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.
                  who has the willpower to actually sit through a self-imposed MCSE training.
                </p>
                <div class="bottom-meta">
                  <div class="user-details row align-items-center">
                    <div class="comment-wrap col-lg-6">
                      <ul>
                        <li><a href="#"><span class="lnr lnr-heart"></span> 4 likes</a></li>
                        <li><a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a></li>
                      </ul>
                    </div>
                    <div class="social-wrap col-lg-6">
                      <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
              <div class="single-post">
                <img class="img-fluid" src="../assets/img/m15.jpg" alt="">
                <ul class="tags">
                  <li><a href="#">Art, </a></li>
                  <li><a href="#">Technology, </a></li>
                  <li><a href="#">Fashion</a></li>
                </ul>
                <a href="blog-single.php">
                  <h1>
                    Cartridge Is Better Than Ever
                    A Discount Toner
                  </h1>
                </a>
                <p>
                  MCSE boot camps have its supporters and its detractors. Some people do not understand why you should
                  have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of
                  the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.
                  who has the willpower to actually sit through a self-imposed MCSE training.
                </p>
                <div class="bottom-meta">
                  <div class="user-details row align-items-center">
                    <div class="comment-wrap col-lg-6">
                      <ul>
                        <li><a href="#"><span class="lnr lnr-heart"></span> 4 likes</a></li>
                        <li><a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a></li>
                      </ul>
                    </div>
                    <div class="social-wrap col-lg-6">
                      <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
              <div class="single-post">
                <img class="img-fluid" src="../assets/img/bo3.jpg" alt="">
                <ul class="tags">
                  <li><a href="#">Art, </a></li>
                  <li><a href="#">Technology, </a></li>
                  <li><a href="#">Fashion</a></li>
                </ul>
                <a href="blog-single.php">
                  <h1>
                    Cartridge Is Better Than Ever
                    A Discount Toner
                  </h1>
                </a>
                <p>
                  MCSE boot camps have its supporters and its detractors. Some people do not understand why you should
                  have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of
                  the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.
                  who has the willpower to actually sit through a self-imposed MCSE training.
                </p>
                <div class="bottom-meta">
                  <div class="user-details row align-items-center">
                    <div class="comment-wrap col-lg-6">
                      <ul>
                        <li><a href="#"><span class="lnr lnr-heart"></span> 4 likes</a></li>
                        <li><a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a></li>
                      </ul>
                    </div>
                    <div class="social-wrap col-lg-6">
                      <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 sidebar">
              <div class="single-widget search-widget">
                <form class="example" action="#" style="margin:auto;max-width:300px">
                  <input type="text" placeholder="Search Posts" name="search2">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>

              <div class="single-widget protfolio-widget">
                <img src="../assets/img/blog/user2.jpg" alt="">
                <a href="#">
                  <h4>Adele Gonzalez</h4>
                </a>
                <p>
                  MCSE boot camps have its supporters and
                  its detractors. Some people do not understand why you should have to spend money
                  on boot camp when you can get.
                </p>
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a href="#"><i class="fa fa-behance"></i></a></li>
                </ul>
              </div>

              <div class="single-widget category-widget">
                <h4 class="title">Post Categories</h4>
                <ul>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Techlology</h6> <span>37</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Lifestyle</h6> <span>24</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Fashion</h6> <span>59</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Art</h6> <span>29</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Food</h6> <span>15</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Architecture</h6> <span>09</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Adventure</h6> <span>44</span>
                    </a></li>
                </ul>
              </div>

              <div class="single-widget recent-posts-widget">
                <h4 class="title">Recent Posts</h4>
                <div class="blog-list ">
                  <div class="single-recent-post d-flex flex-row">
                    <div class="recent-thumb">
                      <img class="img-fluid" src="../assets/img/blog/r1.jpg" alt="">
                    </div>
                    <div class="recent-details">
                      <a href="blog-single.php">
                        <h4>
                          Home Audio Recording
                          For Everyone
                        </h4>
                      </a>
                      <p>
                        02 hours ago
                      </p>
                    </div>
                  </div>
                  <div class="single-recent-post d-flex flex-row">
                    <div class="recent-thumb">
                      <img class="img-fluid" src="../assets/img/blog/r2.jpg" alt="">
                    </div>
                    <div class="recent-details">
                      <a href="blog-single.php">
                        <h4>
                          Home Audio Recording
                          For Everyone
                        </h4>
                      </a>
                      <p>
                        02 hours ago
                      </p>
                    </div>
                  </div>
                  <div class="single-recent-post d-flex flex-row">
                    <div class="recent-thumb">
                      <img class="img-fluid" src="../assets/img/blog/r3.jpg" alt="">
                    </div>
                    <div class="recent-details">
                      <a href="blog-single.php">
                        <h4>
                          Home Audio Recording
                          For Everyone
                        </h4>
                      </a>
                      <p>
                        02 hours ago
                      </p>
                    </div>
                  </div>
                  <div class="single-recent-post d-flex flex-row">
                    <div class="recent-thumb">
                      <img class="img-fluid" src="../assets/img/blog/r4.jpg" alt="">
                    </div>
                    <div class="recent-details">
                      <a href="blog-single.php">
                        <h4>
                          Home Audio Recording
                          For Everyone
                        </h4>
                      </a>
                      <p>
                        02 hours ago
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="single-widget category-widget">
                <h4 class="title">Post Archive</h4>
                <ul>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Dec '17</h6> <span>37</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Nov '17</h6> <span>24</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Oct '17</h6> <span>59</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Sep '17</h6> <span>29</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Aug '17</h6> <span>15</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Jul '17</h6> <span>09</span>
                    </a></li>
                  <li><a href="#" class="justify-content-between align-items-center d-flex">
                      <h6>Jun '17</h6> <span>44</span>
                    </a></li>
                </ul>
              </div>

              <div class="single-widget tags-widget">
                <h4 class="title">Tag Clouds</h4>
                <ul>
                  <li><a href="#">Lifestyle</a></li>
                  <li><a href="#">Art</a></li>
                  <li><a href="#">Adventure</a></li>
                  <li><a href="#">Food</a></li>
                  <li><a href="#">Techlology</a></li>
                  <li><a href="#">Fashion</a></li>
                  <li><a href="#">Architecture</a></li>
                  <li><a href="#">Food</a></li>
                  <li><a href="#">Technology</a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </section>
      <!-- end blog Boster -->

	  
      <!-- start footer Area -->
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
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                  </script> All rights reserved
                </p>
              </div>
            </div>
            <div class="col-lg-5  col-md-6 col-sm-6">
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
      <!-- End footer Area -->
      <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
      </script>
      <script src="../assets/js/vendor/bootstrap.min.js"></script>
      <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
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
  const selectElement = document.getElementById('categorySelect');
  const items = document.querySelectorAll('.filter-item');

  selectElement.addEventListener('change', () => {
    const selectedCategory = selectElement.value;

    items.forEach(item => {
      if (selectedCategory === 'all' || item.classList.contains(selectedCategory)) {
        item.style.display = 'block'; // Show item
      } else {
        item.style.display = 'none'; // Hide item
      }
    });
  });
</script>


      <script>
      const addGalleryBtn = document.getElementById('addGalleryBtn');
      const galleryForm = document.getElementById('galleryForm');
      const newGalleryForm = document.getElementById('newGalleryForm');

      addGalleryBtn?.addEventListener('click', () => {
        galleryForm.style.display = galleryForm.style.display === 'none' ? 'block' : 'none';
      });

      newGalleryForm?.addEventListener('submit', function(e) {
        e.preventDefault();

        const fileInput = document.getElementById('imageFile');
        const title = document.getElementById('galleryTitle').value;
        const desc = document.getElementById('galleryDesc').value;

        if (fileInput.files.length === 0) return;

        const reader = new FileReader();
        reader.onload = function(event) {
          const imgSrc = event.target.result;

          const cardHTML = `
        <div class="col-lg-4 p-1 col-md-6 col-12 filter-item">
          <div class="card" style="width: 18rem;">
            <img src="${imgSrc}" class="card-img-top" alt="${title}">
            <div class="card-body">
              <h5 class="card-title">${title}</h5>
              <p class="card-text">${desc}</p>
              <a href="../User/visit.php" class="btn btn-primary">Visit Now</a>
            </div>
          </div>
        </div>
      `;

          const galleryContainer = document.querySelector('.row.mt-5.mb-5');
          galleryContainer.insertAdjacentHTML('beforeend', cardHTML);
          newGalleryForm.reset();
          galleryForm.style.display = 'none';
        };

        reader.readAsDataURL(fileInput.files[0]); // this line triggers the onload
      });
      </script>


</body>

</html>
