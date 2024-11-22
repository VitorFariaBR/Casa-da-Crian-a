<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';

if (isset($_GET['id'])) {
    $idTurma = $_GET['id'];
    $con = conect::conectar();
    
    // Carregar dados existentes da turma
    $stmt = $con->prepare('SELECT * FROM turma WHERE ID_TURMA = :id');
    $stmt->execute([':id' => $idTurma]);
    $turma = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$turma) {
        echo 'Turma não encontrada!';
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dadosTurma = [
        ':CPF_PROFESSOR' => $_POST['CPF_PROFESSOR'],
        ':ID_DISCIPLINA' => $_POST['ID_DISCIPLINA'],
        ':QTD_MAX_ALUNOS' => $_POST['QTD_MAX_ALUNOS'],
        ':QTD_AULAS_SEMANAIS' => $_POST['QTD_AULAS_SEMANAIS'],
        ':ID_TURMA' => $_POST['ID_TURMA']
    ];

    $con = conect::conectar();

    try {
        $stmt = $con->prepare('UPDATE turma 
                               SET CPF_PROFESSOR = :CPF_PROFESSOR, ID_DISCIPLINA = :ID_DISCIPLINA, 
                                   QTD_MAX_ALUNOS = :QTD_MAX_ALUNOS, QTD_AULAS_SEMANAIS = :QTD_AULAS_SEMANAIS 
                               WHERE ID_TURMA = :ID_TURMA');

        $stmt->execute($dadosTurma);

        if ($stmt->rowCount() > 0) {
            header("Location: listTurma.php");
            exit;
        } else {
            echo 'Nenhuma alteração foi realizada!';
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets8/style.css">
    <title>Editar Turma</title>
</head>
<body class="azul">

    <h1 class="Cadastro_professor">Editar Turma</h1>

    <form action="updateTurma.php?id=<?php echo $idTurma; ?>" method="post">
        <input type="hidden" name="ID_TURMA" value="<?php echo $turma['ID_TURMA']; ?>">
        <div class="form-container">
            <div class="form-row">
                <div>
                    <h3>CPF do Professor:</h3>
                    <input type="text" name="CPF_PROFESSOR" value="<?php echo $turma['CPF_PROFESSOR']; ?>" required>
                </div>
                <div>
                    <h3>Disciplina:</h3>
                    <input type="text" name="ID_DISCIPLINA" value="<?php echo $turma['ID_DISCIPLINA']; ?>" required>
                </div>
                <div>
                    <h3>Quant. Max Alunos:</h3>
                    <input type="number" name="QTD_MAX_ALUNOS" value="<?php echo $turma['QTD_MAX_ALUNOS']; ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Quant. Aulas Semanais:</h3>
                    <input type="number" name="QTD_AULAS_SEMANAIS" value="<?php echo $turma['QTD_AULAS_SEMANAIS']; ?>" required>
                </div>
            </div>

            <div class="button-container">
                <button type="submit" class="confirm-button">Confirmar</button>
                <button type="button" class="cancel-button" onclick="location.href = 'listTurma.php'">Cancelar</button>
            </div>
        </div>
    </form>
</body>
</html>
