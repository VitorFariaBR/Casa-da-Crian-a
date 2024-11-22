<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $con = conect::conectar();
    $stmt = $con->prepare('SELECT * FROM professor WHERE ID_PROFESSOR = :id');
    $stmt->execute([':id' => $id]);
    if ($stmt->rowCount() > 0) {
        $professor = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Professor não encontrado!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ID_PROFESSOR'])) {
    $dadosProfessor = [
        ':ID_PROFESSOR' => $_POST['ID_PROFESSOR'],
        ':NOME' => $_POST['NOME'],
        ':CPF_PROFESSOR' => $_POST['CPF_PROFESSOR'],
        ':DATA_NASC' => $_POST['DATA_NASC'],
        ':ENDERECO_COMPLETO' => $_POST['ENDERECO_COMPLETO'],
        ':BAIRRO' => $_POST['BAIRRO'],
        ':CIDADE' => $_POST['CIDADE'],
        ':TELEFONE' => $_POST['TELEFONE']
    ];

    try {
        $stmt = $con->prepare('UPDATE professor 
                               SET NOME = :NOME, CPF_PROFESSOR = :CPF_PROFESSOR, DATA_NASC = :DATA_NASC, 
                                   ENDERECO_COMPLETO = :ENDERECO_COMPLETO, BAIRRO = :BAIRRO, 
                                   CIDADE = :CIDADE, TELEFONE = :TELEFONE 
                               WHERE ID_PROFESSOR = :ID_PROFESSOR');
        $stmt->execute($dadosProfessor);

        if ($stmt->rowCount() > 0) {
            header("Location: listProfessor.php");
            exit;
        } else {
            echo "Nenhuma alteração realizada!";
        }

    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets5/style.css">
    <title>Editar Professor</title>
</head>

<body class="azul">

    <h1 class="Cadastro_professor">Editar Professor</h1>
    <form action="updateProfessor.php?id=<?php echo $professor['ID_PROFESSOR']; ?>" method="post">
        <input type="hidden" name="ID_PROFESSOR" value="<?php echo $professor['ID_PROFESSOR']; ?>">
        <div class="form-container">
            <div class="form-row">
                <div>
                    <h3>Nome do Professor:</h3>
                    <input type="text" name="NOME" value="<?php echo $professor['NOME']; ?>" required>
                </div>
                <div>
                    <h3>CPF:</h3>
                    <input type="text" name="CPF_PROFESSOR" value="<?php echo $professor['CPF_PROFESSOR']; ?>" required>
                </div>
                <div>
                    <h3>Data de Nascimento:</h3>
                    <input type="date" name="DATA_NASC" value="<?php echo $professor['DATA_NASC']; ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Endereço:</h3>
                    <input type="text" name="ENDERECO_COMPLETO" value="<?php echo $professor['ENDERECO_COMPLETO']; ?>">
                </div>
                <div>
                    <h3>Bairro:</h3>
                    <input type="text" name="BAIRRO" value="<?php echo $professor['BAIRRO']; ?>">
                </div>
                <div>
                    <h3>Cidade:</h3>
                    <input type="text" name="CIDADE" value="<?php echo $professor['CIDADE']; ?>">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Telefone:</h3>
                    <input type="tel" name="TELEFONE" value="<?php echo $professor['TELEFONE']; ?>">
                </div>
            </div>
        </div>

        <div class="button-container">
            <button type="submit" class="confirm-button">Confirmar</button>
            <button type="button" class="cancel-button" onclick="location.href = 'listProfessor.php'">Cancelar</button>
        </div>
    </form>
</body>
</html>
