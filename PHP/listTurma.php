<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';  
$sql = 'SELECT * FROM turma';
$con = conect::conectar();
$listTurma = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets4/style.css">
    <title>Listar Turmas</title>
</head>

<body>
    <header class="cabecalho">
        <div class="cabecalho-titulo">
            <h1>CASA DA CRIANÇA</h1>
        </div>

        <div class="botoes-acao">
            <button type="button" onclick="location.href = 'painelTurmas.php'">
                <p>Voltar</p>
            </button>
            <button type="button" onclick="location.href = 'login.php'">
                <p>Sair</p>
            </button>
        </div>
    </header>

    <main>

        <div class="lista">
            <h2>Lista de Turmas</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>ID - Disciplina</th>
                    <th>Quantidade máxima de Alunos</th>
                    <th>Quantidade de Aulas Semanais</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($listTurma as $turma) {
                    echo '<tr>
                        <td>'. $turma['CPF_PROFESSOR'] .'</td>
                        <td>'. $turma['ID_DISCIPLINA'] .'</td>
                        <td>'. $turma['QTD_MAX_ALUNOS'] .'</td>
                        <td>'. $turma['QTD_AULAS_SEMANAIS'] .'</td>
                        <td> 
                            <a href="deleteTurma.php?ID_TURMA='. $turma['ID_TURMA'] .'"> 
                                <img src="./foto/lixeira.png" alt="Lixeira"> 
                            </a> 
                            <a href="updateTurma.php?id='. $turma['ID_TURMA'] .'"> 
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
