<?php
    include '../includes/dbConnect.php';
    include '../templates/header.php';
    include '../includes/auth.php';
    checklogin();

    $turmaId = isset($_GET['id'])?$conn->real_escape_string($_GET['id']):'';

    $sqlturma = $conn->query("SELECT * FROM turmas WHERE id = '$turmaId'");
    $turma = $sqlturma->fetch_assoc();

    $sqlalunos = $conn->query("SELECT * FROM estudantes WHERE turma = '$turmaId'");
    
    if (!$sqlturma||!$sqlalunos) {
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
                    $sqlturmas = $conn->query("SELECT * FROM turmas");
                    if($sqlturmas->num_rows >0){
                        while($row=$sqlturmas->fetch_assoc()){ ?>
                            <li><a href="turmasDetalhes.php?id=<?php echo $row['id'];?>"><?php echo $row['nome'];?></a></li> <?php 
                        }
                    } else{
                        echo "<li><a>Sem Turmas</a></li>";
                    }
                ?>
            </ul>
        </aside>
        <main class="main-content">
            <div class="turma-header">
                <?php if($turma): ?>
                    <h2><?php echo $turma['nome']; ?></h2>
                    <p>Curso: <?php echo $turma['curso']; ?></p>
                    <p>Classe: <?php echo $turma['classe']; ?></p>
                    <p>Sala: <?php echo $turma['nSala']; ?></p>
                    <p>Período: <?php echo $turma['periodo']; ?></p>
                    <p>Ano Lectivo: <?php echo $turma['anoLectivo']; ?></p>
                    <p>Número de Alunos: <?php echo $turma['numeroAlunos']; ?></p>
                    <a href="save.php"></a><span>Salvar</span>
                    <a href="baixar.php"></a><span>Baixar Pdf</span>
                <?php else: ?>
                    <p>Nunhuma Turma Encontrada</p>
                <?php endif; ?>
            </div>
            <table class="turmas-table">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Nome</th>
                        <th>NotaAcesso</th>
                        <th>Instituicao</th>
                        <th>DataInic</th>
                        <th>1ºAval</th>
                        <th>2ºAval</th>
                        <th>Media</th>
                        <th>Obs</th>
                    </tr>
                </thead>
                <tbody id="turmas-tbody">
                    <?php
                    if ($sqlalunos->num_rows > 0) {
                        while ($aluno = $sqlalunos->fetch_assoc()) {
                            echo "<tr class='turma-row'>";
                            echo "<td>1</td>";
                            echo "<td>" . $aluno['nome'] . "</td>";
                            echo "<td>" . $aluno['notaAcessoEstagio'] . "</td>";
                            echo "<td>" . $aluno['instituicaoSaude'] . "</td>";
                            echo "<td>" . $aluno['dataInicioEstagio'] . "</td>";
                            echo "<td>" . $aluno['primeiraAvaliacao'] . "</td>";
                            echo "<td>" . $aluno['segundaAvaliacao'] . "</td>";
                            echo "<td>" . $aluno['mediaFinal'] . "</td>";
                            echo "<td>" . $aluno['observacao'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>Sem estudantes cadastrados</td></tr>";
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
