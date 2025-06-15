<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Educational Workshops - Egyptian Museum</title>
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

    .btn-custom {
      background-color: #7a5c29;
      color: white;
      border-radius: 30px;
    }

    .btn-custom:hover {
      background-color: #5a401f;
    }
  </style>
</head>
<body>

  <header class="header">
    <h1 class="display-5 fw-bold">Educational Workshops</h1>
    <p class="lead">Hands-on experiences for kids and adults to learn through creativity and fun.</p>
  </header>

  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <img src="workshop.jpeg" class="img-fluid" alt="Workshop" />
      </div>
      <div class="col-md-6">
        <h3>Book Your Workshop</h3>
        <p>We offer a variety of workshops suitable for different age groups and interests. Join us for a creative and fun experience!</p>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="email" required />
          </div>
          <div class="mb-3">
            <label for="date" class="form-label">Preferred Date</label>
            <input type="date" class="form-control" id="date" required />
          </div>
          <button type="submit" class="btn btn-custom">Confirm Booking</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
