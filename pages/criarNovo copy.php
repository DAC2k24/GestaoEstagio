<?php
    include '../includes/dbConnect.php';
    include '../templates/header.php';
    include '../includes/auth.php';
    checklogin();

    $sqlCursos = $conn->query("SELECT * FROM cursos");
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    $query = "SELECT * FROM turmas";
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
                <li><a href="#" onclick="filterClasses('11ªClasse')">Aluno</a></li>
                <li><a href="#" onclick="filterClasses('11ªClasse')">Turma</a></li>
                <li><a href="#" onclick="filterClasses('12ªClasse')">Professor</a></li>
                <li><a href="#" onclick="filterClasses('13ªClasse')">Instituição</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <h1>Adicionar novo(a) Turma</h1>
            <form id="addTurmaForm" class="formCreate" method="POST" action="/gestaoEstagio/includes/addTurma.php">
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
                        
                <label for="periodo" classe="periodo">
                    <label for="manha">Manhã <input type="radio" id="manha" name="periodo" value="manha" required></label>
                    <label for="tarde">Tarde <input type="radio" id="tarde" name="periodo" value="tarde" required></label>
                </label><br>

                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" required>
                        
                <button type="submit" class="btn-add">Adicionar</button>
            </form>
        </main>
    </div>
</div>
<script>    
    
</script>
<?php
include '../templates/footer.php';
?>
