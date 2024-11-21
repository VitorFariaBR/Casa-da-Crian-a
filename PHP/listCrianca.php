<?php
    session_start();

        if(!isset($_SESSION) || ($_SESSION["loggedin"] == false)){
            header("Location: painel.php");
        }

    include 'conect.php';  
    $sql = 'select * from aluno';
    $con = conect::conectar();
    $listCrianca = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="assets2/css/Usuario.css";
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho-titulo">
            <h1>LISTA CRIANÇA</h1>
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
        <div class="linha"></div>
        <nav class="main-home-navegacao">
            <div>
                <h2>Lista de Alunos</h2>
            </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Matrícula</th>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>DD/MM/AA</th>
                        <th>Cidade</th>
                        <th>Endereço</th>
                        <th>Bairro</th>
                        <th>Telefone</th>
                    </tr>
                        <?php 
                            foreach($listCrianca as $aluno){
                                echo'<tr>
                                        <td>'. $aluno['ID_ALUNO'] .'</td>
                                        <td>'. $aluno['MATRICULA'] .'</td>
                                        <td>'. $aluno['CPF_ALUNO'] .'</td>
                                        <td>'. $aluno['NOME'] .'</td>
                                        <td>'. $aluno['DATA_NASC'] .'</td> 
                                        <td>'. $aluno['CIDADE'] .'</td> 
                                        <td>'. $aluno['ENDERECO_COMPLETO'] .'</td> 
                                        <td>'. $aluno['BAIRRO'] .'</td> 
                                        <td>'. $aluno['TELEFONE'] .'</td>    
                                    </tr>';
                            }
                        ?>
                </table>
        </nav>
    </main>
</body>
</html>