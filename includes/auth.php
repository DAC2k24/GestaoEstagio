<?php
session_start();
$max_inative_time = 6000;

if(isset($_SESSION['last_activity'])){
    $inative_time = time() - $_SESSION['last_activity'];

    if($inative_time > $max_inative_time){
        session_unset();
        session_destroy();
        header("Location: /gestaoEstagio/pages/login.php?session_expired=1");
        exit;
    }
}

$_SESSION['last_activity'] = time();

function checkLogin() {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: /gestaoEstagio/pages/login.php");
        exit;
    }
}
?>