<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Membership Confirmation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      color: white;
    }
    .overlay {
      background-color: rgba(0, 0, 0, 0.75);
      padding: 40px;
      border-radius: 20px;
      margin-top: 60px;
      box-shadow: 0 0 30px gold;
    }
    label {
      color: #f8f9fa;
    }
    h1 {
      color: gold;
    }
  </style>
</head>
<body>
    <button onclick="history.back()" class="btn btn-dark position-absolute top-0 end-0 m-4">
       🔙 Back
      </button>
      
  <div class="container">
    <div class="overlay">
      <h1 class="text-center mb-4">Membership Confirmation 💳</h1>
      <form id="visitForm">
        <div class="mb-3">
          <label for="visitorName" class="form-label">Your Name</label>
          <input type="text" class="form-control" id="visitorName" required />
        </div>

        <div class="mb-3">
          <label for="visitorEmail" class="form-label">Your Email</label>
          <input type="email" class="form-control" id="visitorEmail" required />
        </div>

        <div class="mb-3">
          <label for="visitDate" class="form-label">Date</label>
          <input type="date" class="form-control" id="visitDate" required />
        </div>

        <button type="submit" class="btn btn-warning w-100">Continue to Payment</button>
      </form>
    </div>
  </div>

  <script>
    const visitorName = document.getElementById('visitorName');
    const visitorEmail = document.getElementById('visitorEmail');

    document.getElementById('visitForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const data = {
        name: visitorName.value,
        email: visitorEmail.value,
        date: document.getElementById('visitDate').value,
      };
      localStorage.setItem('membershipData', JSON.stringify(data));
      window.location.href = 'payment.php';
    });
  </script>
</body>
</html>
