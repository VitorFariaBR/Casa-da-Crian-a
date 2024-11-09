<?php
session_start();

if (!isset($_SESSION) || ($_SESSION["loggedin"] == false)) {
    header("Location: painel.php");
}

include 'conect.php';

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $con = conect::conectar();
    try {
        $stmt = $con->prepare('INSERT INTO crianca(nome) VALUES(:v1)');

        $stmt->execute(array(
            ':v1' => $nome
        ));

        if ($stmt->rowCount() > 0) {
            header("Location: listCrianca.php");
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
    <link rel="stylesheet" href="./style.css">
    <title>Adicionar Criança</title>
</head>

<body class="azul">
    <!--<h3>
        <?php
        echo "CASA DA CRIANÇA";
        ?>
    </h3>
    <hr> -->

    <section>
        <section class="local-dos-dados">
            <div>
                <h3>Nome do Aluno</h3>
                <input type="text" name="nome"><br><br>
            </div>

            <div>
                <h3>Nome do Responsável</h3>
                <input type="text" name="nome"><br><br>
            </div>

            <div>
                <h3>CPF do Responsável</h3>
                <input type="text" name="nome"><br><br>
            </div>
        </section>

        <section class="local-dos-dados">
            <div>
            <h3>Data de Nascimento</h3>
            <input type="text" name="nome"><br><br>
            </div>

            <div>
                <h3>Telefone</h3>
                <input type="text" name="nome"><br><br>
            </div>

            <div>
                <h3>CPF do Aluno</h3>
                <input type="text" name="nome"><br><br>
            </div>
        </section>

        <section class="local-dos-dados">
            <div>
                <h3>Endereço</h3>
                <input type="text" name="nome"><br><br>
            </div>

            <div>
                <h3>Bairro</h3>
                <input type="text" name="nome"><br><br>
            </div>

            <div>
                <h3>Cidade</h3>
                <input type="text" name="nome"><br><br>
            </div>
        </section> 
    </section>
    <!--<p>
        Adicionar crianças - Casa da Criança
    </p>

    <p>====== LISTA ======</p>
    <form action="createCrianca.php" method="post">
        <input type="text" name="nome"><br><br>
        <button type="submit">Salvar</button>
    </form> -->
</body>

</html>