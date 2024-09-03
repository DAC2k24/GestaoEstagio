<?php
    include '../includes/dbConnect.php';
    include '../templates/header.php';
    include '../includes/auth.php';
    checklogin();
?>
<link rel="stylesheet" href="/gestaoestagio/css/style.css">
<div class="container">
    <div class="content-wrapper">
        <aside class="sidebar">
            <h2 class="classes">Classes</h2>
            <ul>
                <li><a href="?form=aluno">Aluno</a></li>
                <li><a href="?form=turma">Turma</a></li>
                <li><a href="?form=professor">Professor</a></li>
                <li><a href="?form=instituicao">Instituição</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <!-- <div id="formAluno" class="form-container">
                <h1>Adicionar novo Aluno</h1>
                <form id="addAlunoForm" class="formCreate" method="POST" action="/gestaoEstagio/includes/addAluno.php"> -->
                    <!-- Campos do formulário de Aluno -->
                    <!-- <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                    
                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" required>
                    
                    <label for="curso">Curso:</label>
                    <select name="curso" id="curso">
                        <option value="">Selecione o curso</option>
                        <?php
                            // $sqlCursos = $conn->query("SELECT * FROM cursos");
                            // if($sqlCursos->num_rows>0){
                            //     while($row = $sqlCursos->fetch_assoc()){
                            //         echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                            //     };
                            // }else{
                            //     echo "<option value=''>Nenhum curso disponível</option>";
                            // }
                        ?>
                    </select>

                    <label for="turma">Turma:</label>
                    <input type="text" id="turma" name="turma" required>
                    
                    <button type="submit" class="btn-add">Adicionar</button>
                </form>
            </div> -->

            <div id="formAluno" class="form-container" style="display: none;">
                <h1>Adicionar novo Aluno</h1>
                <form id="addTurmaForm" class="formCreate" method="POST" action="/gestaoEstagio/includes/addTurma.php">
                    <!-- Campos do formulário de Turma -->
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
                    
                    <label for="numeroMaxAlunos">Número Máximo de Alunos:</label>
                    <input type="number" id="numeroMaxAlunos" name="numeroMaxAlunos" required>
                    
                    <button type="submit" class="btn-add">Adicionar</button>
                </form>
            </div>
            <div id="formTurma" class="form-container" style="display: none;">
                <h1>Adicionar nova Turma</h1>
                <form id="addTurmaForm" class="formCreate" method="POST" action="/gestaoEstagio/includes/addTurma.php">
                    <!-- Campos do formulário de Turma -->
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
                    
                    <label for="numeroMaxAlunos">Número Máximo de Alunos:</label>
                    <input type="number" id="numeroMaxAlunos" name="numeroMaxAlunos" required>
                    
                    <button type="submit" class="btn-add">Adicionar</button>
                </form>
            </div>
            <div id="formProfessor" class="form-container" style="display: none;">
                <h1>Adicionar novo Professor</h1>
                <form id="addTurmaForm" class="formCreate" method="POST" action="/gestaoEstagio/includes/addTurma.php">
                    <label for="nome">EM DESENVOLVIMENTO...</label>
                </form>
            </div>
            <div id="formInstituicao" class="form-container" style="display: none;">
                <h1>Adicionar nova Instituicao </h1>
                <form id="addTurmaForm" class="formCreate" method="POST" action="/gestaoEstagio/includes/addTurma.php">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                    
                    <label for="nome">Localização:</label>
                    <input type="text" id="nome" name="nome" required>
                    
                    <label for="especialidade">Tipo:</label>
                    <select name="especialidade" id="classe">
                        <option value="">Hospital Geral</option>
                        <option value="">Maternidade</option>
                        <option value="">Centro Medico</option>
                        <option value="">Outro</option>
                    </select>
                    <button type="submit" class="btn-add">Adicionar</button>
                </form>
                <img src="" alt="IMG CENTRO DE SAUDE">
            </div>
        </main>
    </div>
</div>
<script>
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    function showForm() {
        const form = getQueryParam('form');
        const forms = document.querySelectorAll('.form-container');
        forms.forEach(f => f.style.display = 'none');

        if (form === 'aluno') {
            document.getElementById('formAluno').style.display = 'block';
        } else if (form === 'turma') {
            document.getElementById('formTurma').style.display = 'block';
        } else if (form === 'professor') {
            document.getElementById('formProfessor').style.display = 'block';
        } else if (form === 'instituicao') {
            document.getElementById('formInstituicao').style.display = 'block';
        }
    }

    document.addEventListener('DOMContentLoaded', showForm);
</script>
<?php
include '../templates/footer.php';
?>
