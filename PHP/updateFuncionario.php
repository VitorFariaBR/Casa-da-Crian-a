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
    $stmt = $con->prepare('SELECT * FROM secretario WHERE ID_USER = :id');
    $stmt->execute([':id' => $id]);
    if ($stmt->rowCount() > 0) {
        $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Funcionário não encontrado!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ID_USER'])) {
    $dadosFuncionario = [
        ':ID_USER' => $_POST['ID_USER'],
        ':NOME' => $_POST['NOME'],
        ':CPF_SECRETARIO' => $_POST['CPF_SECRETARIO'],
        ':TIPO_USER' => $_POST['TIPO_USER'],
        ':TELEFONE' => $_POST['TELEFONE'],
        ':DATA_NASC' => $_POST['DATA_NASC'],
        ':CIDADE' => $_POST['CIDADE'],
        ':BAIRRO' => $_POST['BAIRRO'],
        ':ENDERECO' => $_POST['ENDERECO']
    ];

    try {
        $stmt = $con->prepare('UPDATE secretario 
                               SET NOME = :NOME, CPF_SECRETARIO = :CPF_SECRETARIO, TIPO_USER = :TIPO_USER, 
                                   TELEFONE = :TELEFONE, DATA_NASC = :DATA_NASC, CIDADE = :CIDADE, 
                                   BAIRRO = :BAIRRO, ENDERECO = :ENDERECO 
                               WHERE ID_USER = :ID_USER');
        $stmt->execute($dadosFuncionario);

        if ($stmt->rowCount() > 0) {
            header("Location: listSecretarios.php");
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
    <link rel="stylesheet" href="./assets7/style.css">
    <title>Editar Funcionário</title>
</head>

<body class="azul">

    <h1 class="Cadastro_professor">Editar Funcionário</h1>
    <form action="updateFuncionario.php?id=<?php echo $funcionario['ID_USER']; ?>" method="post">
        <input type="hidden" name="ID_USER" value="<?php echo $funcionario['ID_USER']; ?>">
        <div class="form-container">
            <div class="form-row">
                <div>
                    <h3>Nome do Funcionário:</h3>
                    <input type="text" name="NOME" value="<?php echo $funcionario['NOME']; ?>" required>
                </div>
                <div>
                    <h3>CPF:</h3>
                    <input type="text" name="CPF_SECRETARIO" value="<?php echo $funcionario['CPF_SECRETARIO']; ?>" required>
                </div>
                <div>
                    <h3>Tipo de Usuário:</h3>
                    <input type="text" name="TIPO_USER" value="<?php echo $funcionario['TIPO_USER']; ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Endereço:</h3>
                    <input type="text" name="ENDERECO" value="<?php echo $funcionario['ENDERECO']; ?>">
                </div>
                <div>
                    <h3>Bairro:</h3>
                    <input type="text" name="BAIRRO" value="<?php echo $funcionario['BAIRRO']; ?>">
                </div>
                <div>
                    <h3>Cidade:</h3>
                    <input type="text" name="CIDADE" value="<?php echo $funcionario['CIDADE']; ?>">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Telefone:</h3>
                    <input type="tel" name="TELEFONE" value="<?php echo $funcionario['TELEFONE']; ?>">
                </div>
                <div>
                    <h3>Data de Nascimento:</h3>
                    <input type="date" name="DATA_NASC" value="<?php echo $funcionario['DATA_NASC']; ?>" required>
                </div>
            </div>
        </div>

        <div class="button-container">
            <button type="submit" class="confirm-button">Confirmar</button>
            <button type="button" class="cancel-button" onclick="location.href = 'listSecretarios.php'">Cancelar</button>
        </div>
    </form>
</body>
</html>
