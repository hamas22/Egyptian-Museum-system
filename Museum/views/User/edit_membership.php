<?php
session_start();
require_once '../../controllers/controle.php'; 



$user_id = $_SESSION['user_id'];
$type = $_GET['type'];

$conn = new museum_controller();

$co = $conn->openconnection();
if (!$co) {
    die("Connection failed.");
}

$query = "SELECT * FROM membership WHERE user_id = $user_id AND type_of_membership = '$type'";
$result = $conn->select($query);

if ($result) {
    $membership = $result[0];
} else {
    echo "No membership found for this type.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Membership</title>
    <link rel="stylesheet" href="style.css"> <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="date"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 25px;
            padding: 12px;
            background-color: #2d89ef;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1e70c1;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Membership</h1>
        <form action="update_membership.php" method="POST">

            <label for="type_of_membership">Membership Type:</label>
            <input type="text" id="type_of_membership" name="type_of_membership"
                value="<?php echo htmlspecialchars($membership['type_of_membership']); ?>" readonly required>
            <input type="hidden" name="original_type"
                value="<?php echo htmlspecialchars($membership['type_of_membership']); ?>">

            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="<?php echo $membership['start_date']; ?>" required>

            <label for="last_date">End Date:</label>
            <input type="date" id="last_date" name="last_date" value="<?php echo $membership['last_date']; ?>" required>

            <button type="submit">Save Changes</button>
        </form>
    </div>
    <script>
        //  Date //
        document.getElementById('start_date').addEventListener('change', function() {
            const start_date = new Date(this.value);
            if (!isNaN(start_date.getTime())) {
                const last_date = new Date(start_date);
                last_date.setFullYear(last_date.getFullYear() + 1);

                const formattedEndDate = last_date.toISOString().split('T')[0];
                document.getElementById('last_date').value = formattedEndDate;
            }
        });
        document.getElementById('editform').addEventListener('submit', function(e) {
            const startDateInput = document.getElementById('start_date');
            const start_date = new Date(startDateInput.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0); // Normalize for date-only comparison

            if (start_date < today) {
                e.preventDefault(); // Block submission
                alert("Start date cannot be in the past.");
                startDateInput.focus();
            }
        });
    </script>

</body>
</html>