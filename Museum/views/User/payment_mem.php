<?php
session_start();



error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_Id = $_SESSION['user_id'];

 
    $type_of_membership = $_POST['type_of_membership'];
    $start_date = $_POST['start_date'];
    $last_date = $_POST['last_date'];


    $today = date("Y-m-d");
    if ($start_date < $today) {
        echo "<script>alert('Start date cannot be in the past.'); window.history.back();</script>";
        exit();
    }


    require_once '../../controllers/controle.php';
    $museumController = new museum_controller();

   
    if ($museumController->openconnection()) {
      
        $query = "INSERT INTO membership (type_of_membership, start_date, last_date, user_Id) VALUES ('$type_of_membership', '$start_date', '$last_date', $user_Id)";

   
        if ($museumController->insert($query)) {
            echo "<p style='color: green;'>..</p>"; 
            header("Location: payment_mem.php");
            exit();
        } else {
            echo "Error inserting record: " . $museumController->connection->error;
        }

    } else {
        die("Failed to connect to the database.");
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Payment - Egyptian Museum</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  body {
    background-image: url('../assets/img//ar2.jpg');
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
    box-shadow: 0 0 30px goldenrod;
  }

  label {
    color: #fff;
  }

  h1 {
    color: gold;
  }
  </style>
</head>

<body>
  <a href="index.php" class="btn btn-dark position-absolute top-0 end-0 m-4 ">Home</a>
  <div class="container">
    <div class="overlay">
      <h1 class="text-center mb-4">Payment Confirmation 💳</h1>
      <form id="paymentForm" action="membership.php">
        <div class="mb-3">
          <label for="paymentMethod" class="form-label">Select Payment Method</label>
          <select class="form-select" id="paymentMethod" required>
            <option value="">Choose a method</option>
            <option value="Visa">Visa</option>
            <option value="MasterCard">MasterCard</option>
            <option value="Wallet">Wallet</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="cardNumber" class="form-label">Card / Wallet Number</label>
          <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" required />
        </div>
        <button type="submit" class="btn btn-warning w-100">Pay Now</button>
      </form>
    </div>
  </div>

  <script>
  const form = document.getElementById('paymentForm');

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    const method = document.getElementById('paymentMethod').value;
    const number = document.getElementById('cardNumber').value.trim();

    if (!method || !number) {
      alert("Please fill in all payment details.");
      return;
    }

    alert("✅ Thanks for subscribing to the membership !");

    // Optionally redirect after confirmation
    window.location.href = "index.php"; // Uncomment this line if needed
  });
  </script>
</body>

</html>