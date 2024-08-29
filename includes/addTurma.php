<?php
include 'dbConnect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = uniqid('TURMA_');
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    $turma = $_POST['turma'];
    $classe = $_POST['classe'];
    $nSala = $_POST['nSala'];
    $anoLectivo = $_POST['anoLectivo'];
    $numeroMaxAlunos = $_POST['numeroMaxAlunos'];
    $periodo = $_POST['periodo'];
    $descricao = $_POST['descricao'];

    $query="SELECT * FROM turmas";
    $result=$conn->query($query);
    $row = $result->fetch_assoc();
    if($row['nome']==$nome){
        header("Location: /gestaoEstagio/pages/turmas.php?nome_existente");
    }else{
        if($row['turma']==$turma && $row['classe']==$classe){
            header("Location: /gestaoEstagio/pages/turmas.php?ja_existe_uma_turma_desta_classe");
        }else if($row['nSala']==$nSala){
            header("Location: /gestaoEstagio/pages/turmas.php?a_presente_sala_esta_ocupada");
        }else{
            $query = "INSERT INTO turmas (id, nome, curso, turma, classe, nSala, anoLectivo, numeroMaxAlunos, periodo, descricao) VALUES 
                ('$id','$nome','$curso', '$turma', '$classe', '$nSala', '$anoLectivo', '$numeroMaxAlunos', '$periodo', '$descricao')";
    
            if ($conn->query($query) === TRUE) {
                header("Location: /gestaoEstagio/pages/turmas.php?sucess");
            } else {
                echo "Erro: " . $conn->error;
            }
            $conn->close();
        }
    }
}
?>