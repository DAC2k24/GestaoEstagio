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
                <th>Nº</th>
                <th>Nome</th>
                <th>Turma</th>
                <th>Curso</th>
                <th>Sala</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>1</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['curso'] . "</td>";
                    echo "<td>" . $row['turma'] . "</td>";
                    echo "<td>N/A</td>";
                    echo "<td>N/A</td>";
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