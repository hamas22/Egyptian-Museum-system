<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>School Tours - Egyptian Museum</title>
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
    <h1 class="display-5 fw-bold">School Tours</h1>
    <p class="lead">Guided museum visits for schools to make history come alive for students.</p>
  </header>

  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <img src="tour.jpeg" class="img-fluid" alt="School Tour" />
      </div>
      <div class="col-md-6">
        <h3>Book Your School Tour</h3>
        <p>Bring your students on an exciting and educational journey through Egyptian history!</p>
        <form>
          <div class="mb-3">
            <label for="school-name" class="form-label">School Name</label>
            <input type="text" class="form-control" id="school-name" required />
          </div>
          <div class="mb-3">
            <label for="contact-email" class="form-label">Contact Email</label>
            <input type="email" class="form-control" id="contact-email" required />
          </div>
          <div class="mb-3">
            <label for="tour-date" class="form-label">Preferred Date</label>
            <input type="date" class="form-control" id="tour-date" required />
          </div>
          <button type="submit" class="btn btn-custom">Confirm Booking</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
