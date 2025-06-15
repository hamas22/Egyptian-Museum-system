<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: index_admin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_Id = $_POST['user_Id'] ?? null;
    $type = $_POST['type'] ?? null;

    if ($user_Id && $type) {
        $conn = new mysqli("localhost", "root", "", "museum");
        if (!$conn->connect_error) {
            $stmt = $conn->prepare("DELETE FROM membership WHERE user_Id = ? AND type_of_membership = ?");
            $stmt->bind_param("is", $user_Id, $type);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
    }
}
header("Location: membership_admin.php");
exit;