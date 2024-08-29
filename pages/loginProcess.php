<?php
session_start();
include '../includes/dbConnect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $email;
    header("Location: ../index.php");
} else {
    echo "Usuário ou senha incorretos.";
}

$stmt->close();
$conn->close();
?>
