<?php
session_start();

if (!isset($_SESSION) || ($_SESSION["loggedin"] == false)) {
    header("Location: painel.php");
}

include 'conect.php';
if (isset($_POST['NOME'])) {
    $NOME = $_POST['NOME'];
    $con = conect::conectar();
    try {
        $stmt = $con->prepare('INSERT INTO aluno(NOME) VALUES(:v1)');

        $stmt->execute(array(
            ':v1' => $NOME
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

    <h1 class="Cadastro_aluno">Cadastrar Aluno</h1>
    <h1 class="Cadastro">Aluno</h1>

    <div class="form-container">
        <form action="#">
            <div class="form-row">
                <div>
                    <h3>Nome do Aluno:</h3>
                    <input type="text" name="NOME">
                </div>
                <div>
                    <h3>CPF:</h3>
                    <input type="text" name="CPF_ALUNO">
                </div>
                <div>
                    <h3>Data de Nascimento:</h3>
                    <input type="text" name="DATA_NASC">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Endereço:</h3>
                    <input type="text" name="ENDERECO_COMPLETO">
                </div>
                <div>
                    <h3>Bairro:</h3>
                    <input type="text" name="BAIRRO">
                </div>
                <div>
                    <h3>Cidade:</h3>
                    <input type="text" name="CIDADE">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Telefone:</h3>
                    <input type="text" name="TELEFONE">
                </div>
            </div>
        </form>
    </div>

    <h1 class="Cadastro">Responsável</h1>

    <div class="form-container">
        <form action="#">
            <div class="form-row">
                <div>
                    <h3>Nome:</h3>
                    <input type="text" name="nome_familiar">
                </div>
                <div>
                    <h3>CPF:</h3>
                    <input type="text" name="cpf">
                </div>
                <div>
                    <h3>Telefone:</h3>
                    <input type="text" name="telefone">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Profissão:</h3>
                    <input type="text" name="profissao">
                </div>
                <div>
                    <h3>Local de Trabalho:</h3>
                    <input type="text" name="local_trabalho">
                </div>
                <div>
                    <h3>Renda Mensal:</h3>
                    <input type="text" name="renda_mensal">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Total de Membros Familiares:</h3>
                    <input type="text" name="total_familiares">
                </div>
                <div>
                    <h3>Renda Familiar Total:</h3>
                    <input type="text" name="renda_familiares">
                </div>
                <div>
                    <h3>Renda Familiar Por Capital:</h3>
                    <input type="text" name="Renda_capital">
                </div>
            </div>
        </form>
    </div>

    <h1 class="Cadastro"> Bens da Família </h1>

    <div class="form-container">
        <form action="#">
            <div class="form-row">
                <div>
                    <h3>Possui Imóvel:</h3>
                    <input type="text" name="possui_imovel">
                </div>
                <div>
                    <h3>Possui Veículo:</h3>
                    <input type="text" name="possui_veiculo">
                </div>
                <div>
                    <h3>Descrição Veículo:</h3>
                    <input type="text" name="descricao_veiculo">
                </div>
            </div>
        </form>
    </div>

    <h1 class="Cadastro"> Despesas </h1>

    <div class="form-container">
        <form action="#">
            <div class="form-row">
            <div>
                    <h3>Moradia:</h3>
                    <input type="text" name="moradia">
                </div>
                <div>
                    <h3>Luz:</h3>
                    <input type="text" name="luz">
                </div>
                <div>
                    <h3>Água:</h3>
                    <input type="text" name="agua">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Alimentação:</h3>
                    <input type="text" name="alimentacao">
                </div>
                <div>
                    <h3>Transporte:</h3>
                    <input type="text" name="transporte">
                </div>
                <div>
                    <h3>Saúde:</h3>
                    <input type="text" name="saúde">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Educação:</h3>
                    <input type="text" name="educacao">
                </div>
                <div>
                    <h3>Outros:</h3>
                    <input type="text" name="outros">
                </div>
                <div>
                    <h3>Total de Despesas:</h3>
                    <input type="text" name="total_despesas">
                </div>
            </div>
        </form>
    </div>

    <h1 class="Cadastro">Benefícios</h1>
    <input class="beneficios" type="text" name="beneficios">

    <h1 class="Cadastro">Observações</h1>
    <input class="beneficios" type="text" name="observações">

    <div class="button-container">
                <button type="submit" class="confirm-button"
                    onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/listCrianca.php'">Confirmar</button>
                <button type="button" class="cancel-button"
                    onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/painelCrianca.php'">Cancelar</button>
            </div>

</body>

</html>