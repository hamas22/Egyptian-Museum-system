<?php
session_start();
require_once '../../models/ticket.php';
require_once '../../controllers/controle.php';

$er_username = $er_useremail = $er_visittype = $er_date = $er_time  = $er_time_range = "";
$success = false;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['your_name'] ?? '');
    $email = trim($_POST['your_Email'] ?? '');
    $visitType = $_POST['visit_type'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    if ($visitType === 'Individual') {
        $numTickets = 1;
    } else {
        $numTickets = isset($_POST['num_of_ticket']) ? (int)$_POST['num_of_ticket'] : 0;
    }
    $price = 0;
    if ($visitType === 'Group') {
        $price = $numTickets * 40;
    } elseif ($visitType === 'Individual') {
        $price = $numTickets * 50; 
    }

    if (empty($name)) $er_username = "Name is Required";
    if (empty($email)) $er_useremail = "Email is Required";
    if (empty($visitType)) $er_visittype = "Type of visit is Required";
    if (empty($date)) {
        $er_date = "Date is Required";
    } else {
        $selectedDate = strtotime($date);
        $minDate = strtotime('2025-05-01');
        if ($selectedDate < $minDate) {
            $er_date = "Date must not be before MAY 2025.";
        }
    }
    if (empty($time)) $er_time = "Time is Required";

    if (!empty($time)) {
        list($hour, $minute) = explode(':', $time);
        $hour = (int)$hour;
        $minute = (int)$minute;

        if (!(($hour >= 8 && $hour < 16) || ($hour == 16 && $minute == 0))) {
            $er_time_range = "Time must be between 08:00 and 16:00.";
        }
    }

    if (empty($er_username) && empty($er_useremail) && empty($er_visittype) && empty($er_date) && empty($er_time) && empty($er_time_range)) 
    {
        $ticket = new ticket();
        $ticket->setName($name);
        $ticket->setEmail($email);
        $ticket->setVisitType($visitType);
        $ticket->setDate($date);
        $ticket->setTime($time);
        $ticket->setNoOfTickets($numTickets);

        $_SESSION['ticket'] = $ticket;
    }
        $controller = new museum_controller();

        if ($controller->openconnection()) {
            $query = "INSERT INTO ticket (visit_type, date, time, no_of_tickets, name, email, user_id, price) VALUES (
                '$visitType', '$date', '$time', '$numTickets', '$name', '$email', '{$_SESSION['user_id']}', '$price')";
            $controller->insert($query);
            header('Location: payment.php');
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Visit the Egyptian Museum</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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
      box-shadow: 0 0 30px gold;
    }
    .err_msg {
      color: red;
      font-weight: bold;
    }
    h1 {
      color: gold;
    }
  </style>
</head>
<body>
  <a href="index.php" class="btn btn-dark position-absolute top-0 end-0 m-4">Home</a>

  <div class="container">
    <div class="overlay">
      <h1 class="text-center mb-4">Book Your Visit to the Egyptian Museum 🏺</h1>
      <form id="visitForm" method="POST">
        <div class="mb-3">
          <label for="visitorName" class="form-label">Your Name</label>
          <input type="text" class="form-control" id="visitorName" name="your_name" value="<?= htmlspecialchars($_POST['your_name'] ?? '') ?>" />
          <span class="err_msg"><?= $er_username ?></span>
        </div>

        <div class="mb-3">
          <label for="visitorEmail" class="form-label">Your Email</label>
          <input type="email" class="form-control" id="visitorEmail" name="your_Email" value="<?= htmlspecialchars($_POST['your_Email'] ?? '') ?>" />
          <span class="err_msg"><?= $er_useremail ?></span>
        </div>

        <div class="mb-3">
          <label for="visitType" class="form-label">Visit Type</label>
          <select class="form-select" id="visitType" name="visit_type">
            <option value="">Select type</option>
            <option value="Individual" <?= ($_POST['visit_type'] ?? '') === 'Individual' ? 'selected' : '' ?>>Individual - 50 EGP</option>
            <option value="Group" <?= ($_POST['visit_type'] ?? '') === 'Group' ? 'selected' : '' ?>>Group - 40 EGP</option>
          </select>
          <span class="err_msg"><?= $er_visittype ?></span>
        </div>

        <div class="mb-3">
          <label for="visitDate" class="form-label">Date</label>
          <input type="date" class="form-control" id="visitDate" name="date" value="<?= htmlspecialchars($_POST['date'] ?? '') ?>" min="2025-04-01" />
          <span class="err_msg"><?= $er_date ?></span>
        </div>

        <div class="mb-3">
          <label for="visitTime" class="form-label">Time</label>
          <input type="time" class="form-control" id="visitTime" name="time" value="<?= htmlspecialchars($_POST['time'] ?? '') ?>" />
          <span class="err_msg"><?= $er_time ?> <?= $er_time_range ?></span>
        </div>

        <div class="mb-3">
          <label for="ticketCount" class="form-label">Number of Tickets</label>
          <input type="number" class="form-control" id="ticketCount" name="num_of_ticket" value="<?= htmlspecialchars($_POST['num_of_ticket'] ?? '1') ?>" min="1" />
        </div>

        <div class="mb-3">
          <p class="text-white">Ticket Price: <span id="pricePerTicket">0</span> EGP</p>
          <p class="text-warning fs-5">Total: <span id="totalPrice">0</span> EGP</p>
        </div>

        <input type="submit" class="btn btn-warning w-100" value="Continue to Payment">
      </form>
    </div>
  </div>

  <script>
    const ticketInput = document.getElementById('ticketCount');
    const visitType = document.getElementById('visitType');
    const pricePerTicket = document.getElementById('pricePerTicket');
    const totalPrice = document.getElementById('totalPrice');

    function updatePrice() {
      let price = 0;
      const type = visitType.value;

      if (type === 'Individual') {
        price = 50;
        ticketInput.value = 1;
        ticketInput.disabled = true;
      } else if (type === 'Group') {
        price = 40;
        if (parseInt(ticketInput.value) < 2) ticketInput.value = 2;
        ticketInput.disabled = false;
      } else {
        ticketInput.disabled = false;
      }

      pricePerTicket.textContent = price;
      totalPrice.textContent = parseInt(ticketInput.value) * price;
    }

    visitType.addEventListener('change', updatePrice);
    ticketInput.addEventListener('input', updatePrice);
    updatePrice(); 
  </script>
</body>
</html>
