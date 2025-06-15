<?php
session_start();
require_once '../../controllers/controle.php';

$museumController = new museum_controller();
$museumController->openconnection();

$role = $_SESSION['role'] ?? '';
$admin_id = $_SESSION['admin_id'] ?? null;
$user_id = $_SESSION['user_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($role == 'user' && isset($_POST['message'])) {
        $msg = $museumController->connection->real_escape_string(trim($_POST['message']));
        $sql = "INSERT INTO feedback (message, user_Id) VALUES ('$msg', '$user_id')";
        $museumController->connection->query($sql);
    } elseif ($role == 'admin' && isset($_POST['reply'], $_POST['feedback_id'])) {
        $reply = $museumController->connection->real_escape_string(trim($_POST['reply']));
        $fid = intval($_POST['feedback_id']);
        $sql = "INSERT INTO report (reply, admin_Id, feedback_Id) VALUES ('$reply', '$admin_id', '$fid')";
        $museumController->connection->query($sql);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f2ec;
            color: #4b3e2e;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 60px auto;
            background-color: #fffaf0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 30px;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
        }

        h2 {
            text-align: center;
            color: #6b4e2f;
            margin-bottom: 30px;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 2px solid #b89c79;
            border-radius: 8px;
            resize: vertical;
            font-size: 16px;
            background-color: #fefcf9;
            transition: border 0.3s;
        }

        textarea:focus {
            outline: none;
            border-color: #a67c52;
        }

        button {
            background-color: #a67c52;
            color: white;
            padding: 10px 20px;
            border: none;
            margin-top: 10px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #8b6a43;
            transform: scale(1.05);
        }

        .feedback-box {
            border: 1px solid #d2b48c;
            background-color: #fff8f0;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: box-shadow 0.3s;
        }

        .feedback-box:hover {
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }

        .top-bar {
            background-color: #6b4e2f;
            padding: 15px;
            text-align: right;
        }

        .top-bar a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            background-color: #a67c52;
            padding: 8px 15px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .top-bar a:hover {
            background-color: #8b6a43;
        }
    </style>
</head>
<body>

<div class="top-bar">
    <a href="index.php">🏠 Home</a>
</div>

<div class="container">
<?php if ($role == 'user'): ?>
    <h2>Send Feedback</h2>
    <form method="POST">
        <textarea name="message" required placeholder="Write your feedback here..."></textarea><br>
        <button type="submit">Send</button>
    </form>

<?php elseif ($role == 'admin'): ?>
    <h2>User Feedbacks</h2>
    <?php
    $query = "SELECT f.feedback_Id, f.message, u.name AS username 
              FROM feedback f 
              JOIN user u ON f.user_Id = u.user_id";
    $result = $museumController->connection->query($query);

    while ($row = $result->fetch_assoc()):
    ?>
        <div class="feedback-box">
            <p><strong>User:</strong> <?= htmlspecialchars($row['username']) ?></p>
            <p><strong>Message:</strong> <?= htmlspecialchars($row['message']) ?></p>
            <form method="POST">
                <input type="hidden" name="feedback_id" value="<?= $row['feedback_Id'] ?>">
                <textarea name="reply" required placeholder="Write your report..."></textarea><br>
                <button type="submit">Send Report</button>
            </form>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>Please login first.</p>
<?php endif; ?>
</div>

</body>
</html>
