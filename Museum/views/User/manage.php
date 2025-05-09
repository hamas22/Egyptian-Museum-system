<?php
$conn = new mysqli("localhost", "root", "", "museum");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ticketData = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ticket_Id"])) {
    $ticket_Id = $_POST["ticket_Id"];

    
    if (empty($ticket_Id)) {
        $error = "Please fill the field.";
    } else {
        $sql = "SELECT * FROM ticket WHERE ticket_Id = $ticket_Id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $ticketData = $result->fetch_assoc();
        } else {
            $error = "Ticket not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

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

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 800px;
            margin-top: 80px; 
        }

        h2 {
            color: #333;
            text-align: center;
            font-size: 24px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
        }

        input[type="number"], input[type="submit"] {
            padding: 10px;
            margin-bottom: 10px;
            width: 80%;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #FF4D4D;
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
        }

    </style>
</head>
<body>

    <!-- Navbar for navigation -->
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="../Admin/gallery.php">Collections</a>
        <a href="ticket.php">Membership</a>
        <a href="event.php">Events</a>
        <a href="visit.php">Visit</a>

    </div>

    <div class="container">
        <h2>Manage Your Ticket</h2>

        <form method="POST">
            <label>Enter Ticket ID:</label>
            <input type="number" name="ticket_Id" required>
            <input type="submit" value="Search">
        </form>

        <?php if ($error): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php elseif ($ticketData): ?>
            <table>
                <tr>
                    <th>Ticket ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Membership Type</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td><?php echo $ticketData['ticket_Id']; ?></td>
                    <td><?php echo $ticketData['name']; ?></td>
                    <td><?php echo $ticketData['email']; ?></td>
                    <td><?php echo $ticketData['visit_type']; ?></td>
                    <td>
                        <a href="edit.php?ticket_Id">Edit</a> |
                        <a href="delete.php?ticket_Id">Delete</a>
                    </td>
                </tr>
            </table>
        <?php endif; ?>

    </div>

</body>
</html>
