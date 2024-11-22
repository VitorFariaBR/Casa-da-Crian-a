<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';  
$sql = 'SELECT * FROM professor';
$con = conect::conectar();
$listProfessor = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets4/style.css">
    <title>Listar Professores</title>
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
            <h2>Lista de Professores</h2>
        </div>
            
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>NOME</th>
                    <th>Data de Nascimento</th>
                    <th>CIDADE</th>
                    <th>ENDEREÇO</th>
                    <th>BAIRRO</th>
                    <th>TELEFONE</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($listProfessor as $professor) {
                    echo '<tr>
                        <td>'. $professor['ID_USER'] .'</td>
                        <td>'. $professor['CPF_PROFESSOR'] .'</td>
                        <td>'. $professor['NOME'] .'</td>
                        <td>'. $professor['DATA_NASC'] .'</td> 
                        <td>'. $professor['CIDADE'] .'</td> 
                        <td>'. $professor['ENDERECO'] .'</td> 
                        <td>'. $professor['BAIRRO'] .'</td> 
                        <td>'. $professor['TELEFONE'] .'</td> 
                        <td> 
                            <a href="deleteProfessor.php?ID_USER='. $professor['ID_USER'] .'"> 
                                <img src="./foto/lixeira.png" alt="Lixeira"> 
                            </a> 
                            <a href="updateProfessor.php?id='. $professor['ID_USER'] .'"> 
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
