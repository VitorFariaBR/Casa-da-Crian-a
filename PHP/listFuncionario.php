<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';  
$sql = 'SELECT * FROM secretario';
$con = conect::conectar();
$listFuncionario = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets4/style.css">
    <title>Listar Funcionário</title>
</head>

<body>
    <header class="cabecalho">
        <div class="cabecalho-titulo">
            <h1>CASA DA CRIANÇA</h1>
        </div>

        <div class="botoes-acao">
            <button type="button" onclick="location.href = 'painelUsuario.php'">
                <p>Voltar</p>
            </button>
            <button type="button" onclick="location.href = 'login.php'">
                <p>Sair</p>
            </button>
        </div>
    </header>

    <main>

        <div class="lista">
            <h2>Lista de Funcionários</h2>
        </div>
            
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>NOME</th>
                    <th>DD/MM/AA</th>
                    <th>CIDADE</th>
                    <th>ENDEREÇO</th>
                    <th>BAIRRO</th>
                    <th>TELEFONE</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($listFuncionario as $secretario) {
                    echo '<tr>
                        <td>'. $secretario['ID_USER'] .'</td>
                        <td>'. $secretario['CPF_SECRETARIO'] .'</td>
                        <td>'. $secretario['NOME'] .'</td>
                        <td>'. $secretario['DATA_NASC'] .'</td> 
                        <td>'. $secretario['CIDADE'] .'</td> 
                        <td>'. $secretario['ENDERECO'] .'</td> 
                        <td>'. $secretario['BAIRRO'] .'</td> 
                        <td>'. $secretario['TELEFONE'] .'</td> 
                        <td> 
                            <a href="deleteFuncionario.php?ID_USER='. $secretario['ID_USER'] .'"> 
                                <img src="./foto/lixeira.png" alt="Lixeira"> 
                            </a> 
                            <a href="updateFuncionario.php?id='. $secretario['ID_USER'] .'"> 
                                <img src="./foto/lapis.png" alt="Lápis"> 
                            </a> 
                        </td>   
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
