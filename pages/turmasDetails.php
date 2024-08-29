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
<link rel="stylesheet" href="../css/style.css">

<!-- Modal para adicionar nova turma -->
<div id="addTurmaModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Adicionar Nova Turma</h2>
        <form id="addTurmaForm" method="POST" action="/gestaoEstagio/includes/addTurma.php">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        
            <label for="curso">Curso:</label>
            <select name="curso" id="curso">
                <option value="">Selecione o curso</option>
                <?php
                    if($sqlCursos->num_rows>0){
                        while($row = $sqlCursos->fetch_assoc()){
                            echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                        };
                        
                    }else{
                        echo "<option value=''>Nenhum curso disponível</option>";
                    }
                ?>
            </select>
            
            <label for="turma">Turma:</label>
            <input type="text" id="turma" name="turma" required>
            
            <label for="classe">Classe:</label>
            <select name="classe" id="classe">
                <option value="11ªClasse">11ªClasse</option>
                <option value="12ªClasse">12ªClasse</option>
                <option value="13ªClasse">13ªClasse</option>
            </select>
            
            
            <label for="nSala">Número da Sala:</label>
            <input type="number" id="nSala" name="nSala" required>
            
            <label for="anoLectivo">Ano Letivo:</label>
            <input type="text" id="anoLectivo" name="anoLectivo" required>
            
            <label for="numeroMaxAlunos">Número Maximo de Alunos:</label>
            <input type="number" id="numeroMaxAlunos" name="numeroMaxAlunos" required>
            
            <label for="periodo">Período:</label>
                <div>
                    <input type="radio" id="manha" name="periodo" value="manha" required>
                    <label for="matutino">Manhã</label>
                </div>
                <div>
                    <input type="radio" id="tarde" name="periodo" value="tarde" required>
                    <label for="vespertino">Tarde</label>
                </div>
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>
            
            <button type="submit" class="btn-add">Adicionar</button>
        </form>
    </div>
</div>


<div class="container">
    <h1>Turmas</h1>

    <div class="content-wrapper">
        <!-- Barra lateral -->
        <aside class="sidebar">
            <h2 class="classes">Classes</h2>
            <ul>
                <li><a href="#" onclick="filterClasses('11ªClasse')">11ª Classe</a></li>
                <li><a href="#" onclick="filterClasses('12ªClasse')">12ª Classe</a></li>
                <li><a href="#" onclick="filterClasses('13ªClasse')">13ª Classe</a></li>
            </ul>
        </aside>

        <!-- Conteúdo principal -->
        <main class="main-content">
            <table class="turmas-table">
                <thead>
                    <tr>
                        <th>ID</th>
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
                            echo "<tr class='turma-row' data-classe='" . $row['classe'] . "'>";
                            echo "<td>" . $row['id'] . "</td>";
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
