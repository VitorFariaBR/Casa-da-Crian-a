<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dadosTurma = [
        ':CPF_PROFESSOR' => $_POST['CPF_PROFESSOR'],
        ':ID_DISCIPLINA' => $_POST['ID_DISCIPLINA'],
        ':QTD_MAX_ALUNOS' => $_POST['QTD_MAX_ALUNOS'],
        ':QTD_AULAS_SEMANAIS' => $_POST['QTD_AULAS_SEMANAIS']
    ];

    $con = conect::conectar();

    try {
        $stmt = $con->prepare('INSERT INTO turma (CPF_PROFESSOR, ID_DISCIPLINA, QTD_MAX_ALUNOS, QTD_AULAS_SEMANAIS) 
        VALUES (:CPF_PROFESSOR, :ID_DISCIPLINA, :QTD_MAX_ALUNOS, :QTD_AULAS_SEMANAIS) ');

        $stmt->execute($dadosTurma);

        if ($stmt->rowCount() > 0) {
            header("Location: listCrianca.php");
            exit;
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets8/style.css">
    <title>Adicionar Turmas</title>
</head>
<body class="azul">

        
    <h1 class="Cadastro_professor">Cadastrar Turma</h1>

    <div class="form-container">
            <div class="form-row">
                <div>
                    <h3>CPF do Professor:</h3>
                    <input type="text" name="CPF_PROFESSOR" placeholder="CPF">
                </div>
                <div>
                    <h3>Disciplina:</h3>
                    <input type="text" name="ID_DISCIPLINA" placeholder="Digite o ID">
                </div>
                <div>
                    <h3>Quant. Max Alunos:</h3>
                    <input type="text" name="QTD_MAX_ALUNOS" placeholder="Digite a quant. máxima de alunos">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Quant. Aulas Semanais:</h3>
                    <input type="text" name="QTD_AULAS_SEMANAIS" placeholder="Digite a quant. de aulas semanais">
                </div>
            </div>
    
        <div class="button-container">
            <button type="submit" class="confirm-button"
                onclick="location.href = 'listTurma.php'">Confirmar</button>
            <button type="button" class="cancel-button"
                onclick="location.href = 'painelTurmas.php'">Cancelar</button>
        </div>
</body>
</html>

