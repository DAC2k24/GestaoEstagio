<?php
$base_url = '/';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Notas</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="main-header">
        <div class="header-container">
            <h1 class="text-logo">
                <a href="/gestaoEstagio/index.php">
                    <img src="/gestaoEstagio/images/logo.png" alt="SMaravilha" class="logo">
                    <span>Gestao de Estagio</span>
                </a>
            </h1>
            <nav class="main-nav">
                <ul>
                    <li><a href="<?= $base_url?>gestaoEstagio/pages/turmas.php">Turmas</a></li>
                    <li><a href="<?= $base_url?>gestaoEstagio/pages/estudantes.php">Estudantes</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Classes</a>
                        <div class="dropdown-content">
                            <a href="#">11a Classe</a>
                            <a href="#">12a Classe</a>
                            <a href="#">13a Classe</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Cursos</a>
                        <div class="dropdown-content">
                            <a href="#">Enfermagem</a>
                            <a href="#">A. Clínicas</a>
                            <a href="#">Farmácia</a>
                            <a href="#">Fisioterapia</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Add Novo</a>
                        <div class="dropdown-content">
                            <a href="#">Aluno</a>
                            <a href="/gestaoEstagio/pages/turmas.php" id="addNewTurmaBtn" class="btn-add">Turma</a>
                            <a href="#">Professor</a>
                            <a href="#">Instituição</a>
                        </div>
                    </li>
                    <li><a href="<?= $base_url?>gestaoEstagio/pages/logout.php"><i class="fas fa-search"></i></a></li>
                    <li><a href="<?= $base_url?>gestaoEstagio/pages/logout.php"><i class="fas fa-sign-out-alt" id="logout"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>
