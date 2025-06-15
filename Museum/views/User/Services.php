<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Services - Egyptian Museum</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f5f2e7;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .header {
      background-color: #7a5c29;
      color: white;
      padding: 60px 0;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: none;
      border-radius: 15px;
      overflow: hidden;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .card-img-top {
      height: 250px;
      object-fit: cover;
    }

    .btn-custom {
      background-color: #7a5c29;
      color: white;
      border-radius: 30px;
    }

    .btn-custom:hover {
      background-color: #5a401f;
    }

    .section-title {
      margin-top: 80px;
      margin-bottom: 40px;
      font-weight: bold;
      color: #5a401f;
    }
  </style>
</head>
<body>

  <header class="header">
    <h1 class="display-5 fw-bold">Our Services</h1>
    <p class="lead">Explore everything we offer at the Egyptian Museum</p>
  </header>

  <div class="container my-5">
    <h2 class="section-title">Educational Services</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="workshop.jpeg" class="card-img-top" alt="Workshop">
          <div class="card-body">
            <h5 class="card-title">Educational Workshops</h5>
            <p class="card-text">Hands-on experiences for kids and adults to learn through creativity and fun.</p>
            <a href="workshop.php" class="btn btn-custom">Book Now</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="tour.jpeg" class="card-img-top" alt="School Tour">
          <div class="card-body">
            <h5 class="card-title">School Tours</h5>
            <p class="card-text">Guided museum visits for schools to make history come alive for students.</p>
            <a href="school-tours.php" class="btn btn-custom">Book Now</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="lecture.png" class="card-img-top" alt="Lecture">
          <div class="card-body">
            <h5 class="card-title">Cultural Lectures</h5>
            <p class="card-text">Join expert talks and deep-dive lectures about Egyptian history and heritage.</p>
            <a href="lectures.php" class="btn btn-custom">Book Now</a>
          </div>
        </div>
      </div>
    </div>

    <h2 class="section-title">General Services</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="library.jpg" class="card-img-top" alt="Library">
          <div class="card-body">
            <h5 class="card-title">Library</h5>
            <p class="card-text">Our library offers a rich collection of books, research materials, and rare manuscripts focusing on Egyptology, history, art, and archaeology. Open to students, researchers, and the public.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="cafe.jpg" class="card-img-top" alt="Café">
          <div class="card-body">
            <h5 class="card-title">Museum Café</h5>
            <p class="card-text">Relax and recharge with a variety of drinks, snacks, and Egyptian delicacies in our cozy café surrounded by history and culture.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="archive.jpg" class="card-img-top" alt="Archive">
          <div class="card-body">
            <h5 class="card-title">Archives</h5>
            <p class="card-text">Access a comprehensive archive of historical records, museum documents, and conservation data curated over decades for scholars and professionals.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card h-100 shadow-sm">
          <img src="study.jpg" class="card-img-top" alt="Study Room">
          <div class="card-body">
            <h5 class="card-title">Study Rooms</h5>
            <p class="card-text">Dedicated quiet spaces with internet access and reference tools for individual study, group discussions, and academic collaboration.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card h-100 shadow-sm">
          <img src="restaurant.jpg" class="card-img-top" alt="Restaurant">
          <div class="card-body">
            <h5 class="card-title">Restaurant</h5>
            <p class="card-text">Enjoy a full dining experience with authentic Egyptian cuisine and international dishes in a beautiful setting inside the museum grounds.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
