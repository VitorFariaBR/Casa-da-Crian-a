<?php
    session_start();

        if(!isset($_SESSION) || ($_SESSION["loggedin"] == false)){
            header("Location: painel.php");
        }

    include 'conect.php';  
    $sql = 'select * from crianca';
    $con = conect::conectar();
    $listCrianca = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa da Criança</title>
</head>
<body>
   

    <h3>
        <?php 
            echo "CASA DA CRIANÇA";
        ?>
    </h3>


    <p>
        Listagem de Alunos - Casa da Criança
    </p>

    <button type="button" onclick="location.href = '/PHP/createCrianca.php'">Adicionar Criança</button><br><br>

    <table>

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ações</th>
        
    </tr>
        <?php 
            foreach($listCrianca as $crianca){
                echo'<tr>
                        <td>'. $crianca['id'] .'</td>
                        <td>'. $crianca['nome'] .'</td>  
                    </tr>';
            }
        ?>
    </table>


</body>
</html>