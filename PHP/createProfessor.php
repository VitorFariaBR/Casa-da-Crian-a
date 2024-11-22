<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dadosProfessor = [
        ':CPF_PROFESSOR' => $_POST['CPF_PROFESSOR'],
        ':NOME' => $_POST['NOME'],
        ':TELEFONE' => $_POST['TELEFONE'],
        ':DATA_NASC' => $_POST['DATA_NASC'],
        ':CIDADE' => $_POST['CIDADE'],
        ':BAIRRO' => $_POST['BAIRRO'],
        ':ENDERECO' => $_POST['ENDERECO'],
        ':ID_USER' => $_POST['ID_USER']
    ];

    $con = conect::conectar();

    try {
        $stmt = $con->prepare('INSERT INTO turma (CPF_PROFESSOR, NOME, TELEFONE, DATA_NASC, CIDADE, BAIRRO, ENDERECO, ID_USER) 
        VALUES (:CPF_PROFESSOR, :NOME, :TELEFONE, :DATA_NASC, :CIDADE, :BAIRRO, :ENDERECO, :ID_USER) ');

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
    <link rel="stylesheet" href="./assets7/style.css">
    <title>Adicionar Professor</title>
</head>
<body class="azul">

        <h1 class="Cadastro_professor">Cadastrar Usuário</h1>

        <div class="form-container">
                <div class="form-row">
                    <div>
                        <h3>Nome do Professor:</h3>
                        <input type="text" name="NOME" placeholder="Digite seu nome">
                    </div>
                    <div>
                        <h3>CPF:</h3>
                        <input type="text" name="CPF_PROFESSOR" placeholder="Digite o CPF">
                    </div>
                    <div>
                        <h3>Data de Nascimento:</h3>
                        <input type="text" name="DATA_NASC" placeholder="Digite a data de nascimento">
                    </div>
                </div>
    
                <div class="form-row">
                    <div>
                        <h3>Endereço:</h3>
                        <input type="text" name="ENDERECO" placeholder="Digite seu endereço">
                    </div>
                    <div>
                        <h3>Bairro:</h3>
                        <input type="text" name="BAIRRO" placeholder="Digite seu bairro">
                    </div>
                    <div>
                        <h3>Cidade:</h3>
                        <input type="text" name="CIDADE" placeholder="Digite sua cidade">
                    </div>
                </div>
    
                <div class="form-row">
                    <div>
                        <h3>Telefone:</h3>
                        <input type="text" name="TELEFONE" placeholder="(00) 00000-0000">
                    </div>
                </div>
        </div>
    
        <div class="button-container">
            <button type="submit" class="confirm-button"
                onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/listUsuario.php'">Confirmar</button>
            <button type="button" class="cancel-button"
                onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/painelUsuario.php'">Cancelar</button>
        </div>
</body>
</html>