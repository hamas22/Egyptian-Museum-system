<?php
require_once '../../models/ticket.php';
require_once '../../controllers/controle.php';

$conn = new museum_controller();
$ticket = null;
$success = "";
$error = "";

$conn->openconnection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["action"] === "load") {
        $ticket_Id = intval($_POST["ticket_Id"]);
        $result = $conn->select("SELECT * FROM ticket WHERE ticket_Id = $ticket_Id");

        if ($result && count($result) > 0) {
            $row = $result[0];
            $ticket = [
                'ticket_Id' => $row["ticket_Id"],
                'name' => $row["name"],
                'email' => $row["email"],
                'visit_type' => $row["visit_type"]
            ];
        } else {
            $error = "No ticket found with ID $ticket_Id.";
        }

    } elseif ($_POST["action"] === "edit") {
        $ticket_Id = intval($_POST["ticket_Id"]);
        $name = $_POST["name"];
        $email = $_POST["email"];
        $visit_type = $_POST["visit_type"];

        $sql = "UPDATE ticket 
                SET name = '$name', email = '$email', visit_type = '$visit_type' 
                WHERE ticket_Id = $ticket_Id";

        if ($conn->connection->query($sql) === TRUE) {
            $success = "Ticket updated successfully.";

            $result = $conn->select("SELECT * FROM ticket WHERE ticket_Id = $ticket_Id");
            if ($result && count($result) > 0) {
                $row = $result[0];
                $ticket = [
                    'ticket_Id' => $row["ticket_Id"],
                    'name' => $row["name"],
                    'email' => $row["email"],
                    'visit_type' => $row["visit_type"]
                ];
            }
        } else {
            $error = "Error updating ticket: " . $conn->connection->error;
        }
    }
}
?>

<!-- HTML BELOW -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Ticket</title>
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
            padding: 100px 20px 40px;
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
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
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

<h2>Edit Ticket</h2>

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
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="ticket_Id" value="<?php echo $ticket['ticket_Id']; ?>">

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $ticket['name']; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $ticket['email']; ?>" required>

        <label>Visit Type:</label>
        <input type="text" name="visit_type" value="<?php echo $ticket['visit_type']; ?>" required>

        <input type="submit" value="Edit Ticket">
    </form>
<?php endif; ?>
</body>
</html>
