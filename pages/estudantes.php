<?php
    include '../includes/dbConnect.php';
    include '../templates/header.php';
    include '../includes/auth.php';
    checklogin();

    $sqlalunos = $conn->query("SELECT * FROM estudantes");
    $sqlturmas = $conn->query("SELECT nome FROM turmas");
    
    if (!$sqlalunos) {
        die("Erro na consulta SQL: " . $conn->error);
    }
    if (!$sqlturmas) {
        die("Erro na consulta SQL: " . $conn->error);
    }
?>
<link rel="stylesheet" href="/gestaoestagio/css/style.css">
<div class="container">
    
    <div class="content-wrapper">
        <aside class="sidebar">
            <h2 class="classes">Turmas</h2>
            <ul>
                <?php
                    if($sqlturmas->num_rows >0){
                        while($row=$sqlturmas->fetch_assoc()){ ?>
                            <li><a href="#" onclick="filterTurma('<?php $row['nome']?>')"><?php echo $row['nome'];?></a></li> <?php 
                        }
                    } else{
                        echo "<li><a>Sem Turmas</a></li>";
                    }
                ?>
            </ul>
        </aside>
        <main class="main-content">
            <h1>Alunos</h1>
            <table class="turmas-table">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Curso</th>
                        <th>Sala</th>
                        <th>Ano Lectivo</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="turmas-tbody">
                    <?php
                    if ($sqlalunos->num_rows > 0) {
                        while ($row = $sqlalunos->fetch_assoc()) {
                            
                            echo "<tr class='turma-row' data-classe='" . $row['turma'] . "'>";
                            echo "<td>1</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['turma'] . "</td>";
                            echo "<td>" . $row['curso'] . "</td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Nenhum aluno encontrado</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</div>
<script>
    function filterTurma(turma) {
        var rows = document.querySelectorAll('.turma-row');
        rows.forEach(row => {
            if (row.getAttribute('data-classe') === classe) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

</script>
<?php
include '../templates/footer.php';
?>