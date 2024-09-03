<?php
session_start();
    if (isset($_GET['session_expired']) && $_GET['session_expired'] == 1) {
        echo ("<script> alert('Sua sessão expirou. Por favor, faça login novamente.');</script> ");
    }
?>
<link rel="stylesheet" href="../css/style.css">
<!-- <img src="../images/logo.png" alt=""> -->
<div class="login-container">
    <h2>Login</h2>
    
    <form action="loginProcess.php" method="post">
        <label for="username">User</label>
        <input type="text" id="username" name="email" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Entrar</button>
    </form>
</div>

<?php
include '../templates/footer.php';
?>
