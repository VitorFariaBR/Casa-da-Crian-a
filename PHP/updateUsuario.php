<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Editar Professor</title>
</head>
<body class="azul">

        <h1 class="Cadastro_professor">Editar Professor</h1>

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
                        <input type="text" name="ENDERECO_COMPLETO" placeholder="Digite seu endereço">
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
                onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/listCrianca.php'">Confirmar</button>
            <button type="button" class="cancel-button"
                onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/painelCrianca.php'">Cancelar</button>
        </div>
</body>
</html>