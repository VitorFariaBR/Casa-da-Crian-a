<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = conect::conectar();
    $idDisciplina = $_POST['ID_DISCIPLINA'];
    $stmtDisciplina = $con->prepare('SELECT ID_DISCIPLINA FROM disciplina WHERE ID_DISCIPLINA = :idDisciplina');
    $stmtDisciplina->execute([':idDisciplina' => $idDisciplina]);

    if ($stmtDisciplina->rowCount() > 0) {
        $dadosTurma = [
            ':CPF_PROFESSOR' => $_POST['CPF_PROFESSOR'],
            ':ID_DISCIPLINA' => $idDisciplina,
            ':QTD_MAX_ALUNOS' => $_POST['QTD_MAX_ALUNOS'],
            ':QTD_AULAS_SEMANAIS' => $_POST['QTD_AULAS_SEMANAIS']
        ];

        try {
            $stmt = $con->prepare('INSERT INTO turma (CPF_PROFESSOR, ID_DISCIPLINA, QTD_MAX_ALUNOS, QTD_AULAS_SEMANAIS) 
            VALUES (:CPF_PROFESSOR, :ID_DISCIPLINA, :QTD_MAX_ALUNOS, :QTD_AULAS_SEMANAIS)');

            $stmt->execute($dadosTurma);

            if ($stmt->rowCount() > 0) {
                header("Location: listTurma.php");
                exit;
            }
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    } else {
        echo 'Erro: A disciplina com ID ' . $idDisciplina . ' não existe.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets8/style.css">
    <title>Adicionar Turmas</title>
</head>
<body class="azul">

    <h1 class="Cadastro_professor">Cadastrar Turma</h1>

    <form action="createTurma.php" method="post">
        <div class="form-container">
            <div class="form-row">
                <div>
                    <h3>CPF do Professor:</h3>
                    <input type="text" name="CPF_PROFESSOR" placeholder="CPF" required>
                </div>
                <div>
                    <h3>Disciplina:</h3>
                    <input type="text" name="ID_DISCIPLINA" placeholder="Digite o ID da Disciplina" required>
                </div>
                <div>
                    <h3>Quant. Max Alunos:</h3>
                    <input type="number" name="QTD_MAX_ALUNOS" placeholder="Digite a quantidade máxima de alunos" required>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Quant. Aulas Semanais:</h3>
                    <input type="number" name="QTD_AULAS_SEMANAIS" placeholder="Digite a quantidade de aulas semanais" required>
                </div>
            </div>

            <div class="button-container">
                <button type="submit" class="confirm-button">Confirmar</button>
                <button type="button" class="cancel-button" onclick="location.href = 'painelTurmas.php'">Cancelar</button>
            </div>
        </div>
    </form>
</body>
</html>
