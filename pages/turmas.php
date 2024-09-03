<?php
    include '../includes/dbConnect.php';
    include '../templates/header.php';
    include '../includes/auth.php';
    checklogin();

    $sqlCursos = $conn->query("SELECT * FROM cursos");
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    $query = "SELECT id, nome, curso, turma, classe, numeroAlunos, nSala, anoLectivo FROM turmas";
    $result = $conn->query($query);
    
    if (!$result) {
        die("Erro na consulta SQL: " . $conn->error);
    }
?>
<link rel="stylesheet" href="/gestaoestagio/css/style.css">
<div class="container">
    
    <div class="content-wrapper">
        <aside class="sidebar">
            <h2 class="classes">Classes</h2>
            <ul>
                <li><a href="#" onclick="filterClasses('11ªClasse')">11ª Classe</a></li>
                <li><a href="#" onclick="filterClasses('12ªClasse')">12ª Classe</a></li>
                <li><a href="#" onclick="filterClasses('13ªClasse')">13ª Classe</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <h1>Turmas</h1>
            <table class="turmas-table">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Classe</th>
                        <th>Turma</th>
                        <th>Sala</th>
                        <th>Ano Lectivo</th>
                        <th>Numero Alunos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="turmas-tbody">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            
                            echo "<tr class='turma-row' data-classe='" . $row['classe'] . "'onclick=\"window.location.href='turmasDetalhes.php?id=".$row['id']."'\">";
                            // echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['curso'] . "</td>";
                            echo "<td>" . $row['classe'] . "</td>";
                            echo "<td>" . $row['turma'] . "</td>";
                            echo "<td>" . $row['nSala'] . "</td>";
                            echo "<td>" . $row['anoLectivo'] . "</td>";
                            echo "<td>" . $row['numeroAlunos'] . "</td>";
                            echo "<td><a href='editarTurma.php?id=" . $row['id'] . "'>Editar</a> | <a href='excluirTurma.php?id=" . $row['id'] . "'>Excluir</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Nenhuma turma encontrada</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</div>
<script>    
    var modal = document.getElementById("addTurmaModal");
    var btn = document.getElementById("addNewTurmaBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        console.log("Botão clicado");
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    function filterClasses(classe) {
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
