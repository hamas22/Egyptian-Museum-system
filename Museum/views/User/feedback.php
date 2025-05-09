<?php
session_start();

$feedbackMessage = "";
$feedbacks = [];
$isAdmin = false;
$adminId = null;

$conn = new mysqli("localhost", "root", "", "museum");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION["user_id"])) {
    $feedbackMessage = "You must be logged in to access this page.";
} else {
    $userId = $_SESSION["user_id"];

    $adminQuery = $conn->prepare("SELECT admin_id FROM admin WHERE admin_id = ?");
    $adminQuery->bind_param("i", $userId);
    $adminQuery->execute();
    $adminQuery->store_result();

    if ($adminQuery->num_rows > 0) {
        $isAdmin = true;
        $adminQuery->bind_result($adminId);
        $adminQuery->fetch();
    }
    $adminQuery->close();
}

if ($isAdmin && isset($_POST["reply"]) && isset($_POST["feedback_Id"])) {
    $feedbackId = $_POST["feedback_Id"];
    $reply = trim($_POST["reply"]);

    if (!empty($reply)) {
        $checkStmt = $conn->prepare("SELECT report_Id FROM report WHERE feedback_Id = ?");
        $checkStmt->bind_param("i", $feedbackId);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows == 0) {
            // Insert new reply
            $stmt = $conn->prepare("INSERT INTO report (admin_Id, feedback_Id, reply) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $adminId, $feedbackId, $reply);
            if ($stmt->execute()) {
                $feedbackMessage = "✅ Reply sent and saved!";
            } else {
                $feedbackMessage = "❌ Failed to save reply: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $feedbackMessage = "⚠️ Feedback already has a reply.";
        }

        $checkStmt->close();
    } else {
        $feedbackMessage = "⚠️ Reply cannot be empty.";
    }
}

if (!$isAdmin && $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["message"])) {
    $message = trim($_POST["message"]);
    if (!empty($message)) {
        $stmt = $conn->prepare("INSERT INTO feedback (user_Id, message) VALUES (?, ?)");
        $stmt->bind_param("is", $userId, $message);
        if ($stmt->execute()) {
            $feedbackMessage = "✅ Feedback saved successfully!";
        } else {
            $feedbackMessage = "❌ Error saving feedback: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $feedbackMessage = "⚠️ Please enter a message.";
    }
}

if ($isAdmin) {
    $result = $conn->query("
        SELECT 
            feedback.feedback_Id, 
            user.user_Id, 
            feedback.message,
            report.reply
        FROM feedback 
        JOIN user ON user.user_Id = feedback.user_Id
        LEFT JOIN report ON feedback.feedback_Id = report.feedback_Id
    ");
    while ($row = $result->fetch_assoc()) {
        $feedbacks[] = $row;
    }
    $result->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Museum - Feedback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>

<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="about-content col-lg-12 text-center">
                <h1 class="text-white">Feedback</h1>
                <p class="text-white link-nav"><a href="index.php">Home</a> <span class="lnr lnr-arrow-right"></span> Feedback</p>
            </div>
        </div>
    </div>
</section>

<section class="contact-page-area section-gap">
    <div class="container">
        <?php if (!empty($feedbackMessage)): ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($feedbackMessage); ?></div>
        <?php endif; ?>

        <?php if ($isAdmin): ?>
            <h2>All User Feedback</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Message</th>
                        <th>Reply</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($feedbacks as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['user_Id']); ?></td>
                            <td><?php echo htmlspecialchars($row['message']); ?></td>
                            <td>
                                <?php if (!empty($row['reply'])): ?>
                                    <strong><?php echo htmlspecialchars($row['reply']); ?></strong>
                                <?php else: ?>
                                    <form method="post" action="">
                                        <input type="hidden" name="feedback_Id" value="<?php echo $row['feedback_Id']; ?>">
                                        <input type="text" name="reply" required>
                                        <button type="submit" class="btn btn-primary btn-sm">Send Reply</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif (isset($_SESSION["user_id"])): ?>
            <h2>Send Your Feedback</h2>
            <form method="post" action="feedback.php">
                <div class="form-group">
                    <label for="message">Your Feedback</label>
                    <textarea name="message" id="message" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Send Feedback</button>
            </form>
        <?php else: ?>
            <div class="alert alert-warning">Please <a href="login.php">log in</a> to send feedback.</div>
        <?php endif; ?>
    </div>
</section>

</body>
</html>
