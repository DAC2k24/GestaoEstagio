<link rel="stylesheet" href="../css/style.css">
<?php
    include '../includes/dbConnect.php';
    include '../templates/header.php';
    include '../includes/auth.php';
    checklogin();

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    $query = "SELECT id, nome, curso, classeActual, turma, classeActual,notaAcessoEstagio, dataInicioEstagio, instituicaoSaude, primeiraAvaliacao, dataPrimeiraAvaliacao, mediaFinal FROM estudantes";
    $result = $conn->query($query);
    
    if (!$result) {
        die("Erro na consulta SQL: " . $conn->error);
    }
?>  
    <div class="container">
    <h1>Estudantes</h1>

    <table class="turmas-table">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Nome</th>
                <th>Curso</th>
                <th>Turma</th>
                <!-- <th>Classe</th> -->
                <th>Nota de Acesso</th>
                <!-- <th>Intuituição de Saúde</th> -->
                <th>Data.Inicio</th>
                <th>D1ªA</th>
                <th>N1ªA</th>
                <th>Média</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    // echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['curso'] . "</td>";
                    echo "<td>" . $row['turma'] . "</td>";
                    // echo "<td>" . $row['classeActual'] . "</td>";
                    echo "<td>" . $row['notaAcessoEstagio'] . "</td>";
                    // echo "<td>" . $row['instituicaoSaude'] . "</td>";
                    echo "<td>" . $row['dataInicioEstagio'] . "</td>";
                    echo "<td>" . $row['dataPrimeiraAvaliacao'] . "</td>";
                    echo "<td>" . $row['primeiraAvaliacao'] . "</td>";
                    echo "<td>" . $row['mediaFinal'] . "</td>";
                    // echo "<td>" . $row['numeroAlunos'] . "</td>";
                    echo "<td><a href='editarTurma.php?id=" . $row['id'] . "'>Editar</a> | <a href='excluirTurma.php?id=" . $row['id'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhuma turma encontrada</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
<?php
include '../templates/footer.php';
?>