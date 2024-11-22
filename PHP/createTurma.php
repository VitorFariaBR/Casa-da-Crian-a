<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets8/style.css">
    <title>Adicionar Turmas</title>
</head>
<body class="azul">

        
    <h1 class="Cadastro_professor">Cadastrar Turma</h1>

    <div class="form-container">
            <div class="form-row">
                <div>
                    <h3>Professor:</h3>
                    <input type="text" name="NOME" placeholder="Digite seu nome">
                </div>
                <div>
                    <h3>Disciplina:</h3>
                    <input type="text" name="DISCIPLINA" placeholder="Digite a disciplina">
                </div>
                <div>
                    <h3>Quant. Max Alunos:</h3>
                    <input type="text" name="QUANT_MAX_ALUNO" placeholder="Digite a quant. máxima de alunos">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <h3>Quant. Aulas Semanais:</h3>
                    <input type="text" name="QUANT_AULAS_SEMANAIS" placeholder="Digite a quant. de aulas semanais">
                </div>
            </div>
    
        <div class="button-container">
            <button type="submit" class="confirm-button"
                onclick="location.href = 'listTurma.php'">Confirmar</button>
            <button type="button" class="cancel-button"
                onclick="location.href = 'painelTurmas.php'">Cancelar</button>
        </div>
</body>
</html>

