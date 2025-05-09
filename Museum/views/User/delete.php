<?php
require_once '../../controllers/controle.php';
$conn = new museum_controller;

$ticket = null;
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn->openconnection();

    if (isset($_POST["action"]) && $_POST["action"] === "load") {
        $ticket_Id = intval($_POST["ticket_Id"]);
        $sql = "SELECT * FROM ticket WHERE ticket_Id = $ticket_Id";
        $result = $conn->select($sql);

        if (is_array($result) && count($result) > 0) {
            $ticket = $result[0]; 
        } else {
            $error = "Ticket not found.";
        }

    } elseif (isset($_POST["action"]) && $_POST["action"] === "delete") {
        $ticket_Id = intval($_POST["ticket_Id"]);
        $sql = "DELETE FROM ticket WHERE ticket_Id = $ticket_Id";
        $deleteResult = $conn->connection->query($sql);

        if ($deleteResult === TRUE) {
            $success = "Ticket deleted successfully.";
            $ticket = null;
        } else {
            $error = "Error deleting ticket: " . $conn->connection->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Ticket</title>
    <style>
        .navbar {
            background-color: #f8f9fa;
            width: 100%;
            text-align: center;
            padding: 15px 0;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 10;
            border-bottom: 2px solid #ddd;
        }
        .navbar a {
            color: #333;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 18px;
            margin: 0 15px;
            font-weight: bold;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: #007bff;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 40px;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: white;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            min-width: 300px;
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #ff4d4d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #e60000;
        }
        .success-msg {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            width: 100%;
            text-align: center;
        }
        .error-msg {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="../Admin/gallery.php">Collections</a>
    <a href="ticket.php">Membership</a>
    <a href="event.php">Events</a>
    <a href="visit.php">Visit</a>
    <a href="manage.php">Manage</a>
</div>

<h2>Delete Your Ticket</h2>

<?php if ($success): ?>
    <div class="success-msg"><?php echo $success; ?></div>
<?php endif; ?>

<?php if (!$ticket): ?>
    <form method="POST">
        <label>Enter Ticket ID:</label>
        <input type="number" name="ticket_Id" required>
        <input type="hidden" name="action" value="load">
        <input type="submit" value="Load Ticket">
    </form>
    <?php if ($error): ?>
        <div class="error-msg"><?php echo $error; ?></div>
    <?php endif; ?>
<?php else: ?>
    <form method="POST">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="ticket_Id" value="<?php echo $ticket['ticket_Id']; ?>">

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $ticket['name']; ?>" disabled>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $ticket['email']; ?>" disabled>

        <label>Visit Type:</label>
        <input type="text" name="visit_type" value="<?php echo $ticket['visit_type']; ?>" disabled>

        <input type="submit" value="Delete Ticket">
    </form>
<?php endif; ?>
</body>
</html>
