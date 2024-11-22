<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';  
$sql = 'SELECT * FROM aluno';
$con = conect::conectar();
$listCrianca = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets4/style.css">
    <title>Listar Crianças</title>
</head>

<body>
    <header class="cabecalho">
        <div class="cabecalho-titulo">
            <h1>CASA DA CRIANÇA</h1>
        </div>

        <div class="botoes-acao">
            <button type="button" onclick="location.href = 'painelCrianca.php'">
                <p>Voltar</p>
            </button>
            <button type="button" onclick="location.href = 'login.php'">
                <p>Sair</p>
            </button>
        </div>
    </header>

    <main>

        <div class="lista">
            <h2>Lista de Alunos</h2>
        </div>
            
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>RA</th>
                    <th>NOME</th>
                    <th>CPF</th>
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
                foreach($listCrianca as $aluno){
                    echo '<tr>
                        <td>'. $aluno['ID_ALUNO'] .'</td>
                        <td>'. $aluno['MATRICULA'] .'</td>
                        <td>'. $aluno['NOME'] .'</td>
                        <td>'. $aluno['CPF_ALUNO'] .'</td>
                        <td>'. $aluno['DATA_NASC'] .'</td> 
                        <td>'. $aluno['CIDADE'] .'</td> 
                        <td>'. $aluno['ENDERECO_COMPLETO'] .'</td> 
                        <td>'. $aluno['BAIRRO'] .'</td> 
                        <td>'. $aluno['TELEFONE'] .'</td> 
                        <td> 
                            <a href="deleteCrianca.php?ID_ALUNO='. $aluno['ID_ALUNO'] .'"> 
                                <img src="./foto/lixeira.png" alt="Lixeira"> 
                            </a> 
                            <a href="updateCrianca.php?id='. $aluno['ID_ALUNO'] .'"> 
                                <img src="./foto/lapis.png" alt="Lapis"> 
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
