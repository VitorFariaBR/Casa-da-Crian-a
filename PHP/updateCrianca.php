<?php
    session_start();

    if(!isset($_SESSION) || ($_SESSION["loggedin"] == false)){
        header("Location: painel.php");
    }

    include 'conect.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $con = conect::conectar();
        $stmt = $con->prepare('SELECT nome FROM crianca WHERE id = :v1');
        $stmt->execute(array(
            ':v1' => $id
        ));
        if($stmt->rowCount() > 0){
            $crianca = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Criança não encontrada!";
        }
    }

    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $con = conect::conectar();
        try {
            $stmt = $con->prepare('UPDATE crianca SET nome = :v2 WHERE id = :v1');
            $stmt->execute(array(
                ':v2' => $nome,
                ':v1' => $id
            ));
            if($stmt->rowCount() > 0){
                header("Location: listCrianca.php"); 
            } else {
                echo "Nenhuma alteração realizada!";
            }

        } catch(PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Criança</title>
</head>
<body>
    <h3>
        <?php 
            echo "CASA DA CRIANÇA";
        ?>
    </h3>
    <p>
            Editar criança
    </p>

    <p>====== LISTA ======</p>
    <form action="" method="post">
        <input type="text" name="nome"><br><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>