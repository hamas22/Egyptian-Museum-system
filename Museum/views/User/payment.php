<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "museum";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'];

$sql = "SELECT ticket_Id, visit_type, date, time, no_of_tickets, user_Id, name, email, price FROM ticket WHERE user_id = '$userId' ORDER BY ticket_Id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $ticketData = $result->fetch_assoc();
} else {
    die("No ticket data available.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment - Egyptian Museum</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <style>
    body {
      background-image: url('../assets/img/ar2.jpg');
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
    label { color: #fff; }
    h1 { color: gold; }
    .ticket {
      width: 350px;
      padding: 20px;
      text-align: center;
      background: linear-gradient(135deg, #fff8dc, #f5deb3);
      border: 5px double #a67c00;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      position: relative;
      font-family: 'Segoe UI', sans-serif;
      margin: 30px auto;
      color: #3a2c00;
    }
    .ticket h2 {
      font-size: 24px;
      color: #7a5901;
    }
    .btn-close-custom {
      position: absolute;
      top: 10px;
      right: 10px;
      background: none;
      border: none;
      font-size: 20px;
      font-weight: bold;
      color: #000;
      z-index: 99;
    }
    .download-btn {
      margin-top: 10px;
      background-color: #d4af37;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      color: white;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <a href="index.php" class="btn btn-dark position-absolute top-0 end-0 m-4">Home</a>

  <div class="container">
    <div class="overlay">
      <h1 class="text-center mb-4">Payment Confirmation 💳</h1>
      <form id="paymentForm" method="POST">
        <div class="mb-3">
          <label for="paymentMethod" class="form-label">Select Payment Method</label>
          <select class="form-select" id="paymentMethod" name="paymentMethod" required>
            <option value="">Choose a method</option>
            <option value="Visa">Visa</option>
            <option value="MasterCard">MasterCard</option>
            <option value="Wallet">Wallet</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="cardNumber" class="form-label">Card / Wallet Number</label>
          <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" required />
        </div>
        <button type="submit" class="btn btn-warning w-100">Pay Now</button>
      </form>
    </div>
  </div>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <div id="ticketToDownload" class="ticket">
      <button type="button" class="btn-close-custom" onclick="window.location.href='payment.php'">×</button>
      <h2>🎫 Egyptian Museum Ticket</h2>
      <p><strong>Ticket ID:</strong> <?= htmlspecialchars($ticketData['ticket_Id']) ?></p>
      <p><strong>Name:</strong> <?= htmlspecialchars($ticketData['name']) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($ticketData['email']) ?></p>
      <p><strong>Visit Type:</strong> <?= htmlspecialchars($ticketData['visit_type']) ?></p>
      <p><strong>Date:</strong> <?= htmlspecialchars($ticketData['date']) ?></p>
      <p><strong>Time:</strong> <?= htmlspecialchars($ticketData['time']) ?></p>
      <p><strong>Tickets:</strong> <?= htmlspecialchars($ticketData['no_of_tickets']) ?></p>
      <p><strong>Total Paid:</strong> <?= htmlspecialchars($ticketData['price']) ?> EGP</p>
      <p><strong>Payment Method:</strong> <?= htmlspecialchars($_POST['paymentMethod']) ?></p>
      <p><strong>Card Number:</strong> <?= htmlspecialchars($_POST['cardNumber']) ?></p>
      <button class="download-btn" onclick="downloadTicket()">Download Ticket</button>
    </div>

   

<script>
  function downloadTicket() {
    const ticket = document.getElementById("ticketToDownload");
    html2pdf().from(ticket).set({
      margin: 0.5,
      filename: 'Egyptian_Museum_Ticket.pdf',
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'in', format: 'A5', orientation: 'portrait' }
    }).save();
  }
</script>
  <?php endif; ?>
</body>
</html>
