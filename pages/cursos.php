<?php
    include '../includes/dbConnect.php';
    include '../templates/header.php';
    include '../includes/auth.php';
    checklogin();
?>
    <link rel="stylesheet" href="../css/style.css">
    <h1>Cursos</h1>
<?php
include '../templates/footer.php';
?>