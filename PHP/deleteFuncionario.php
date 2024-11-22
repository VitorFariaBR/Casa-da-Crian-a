<?php 
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';

if (isset($_GET['ID_USER'])) {
    $idFuncionario = $_GET['ID_USER'];
    $con = conect::conectar();

    try {
        $stmt = $con->prepare('DELETE FROM secretario WHERE ID_USER = :id');
        $stmt->execute([':id' => $idFuncionario]);
        
        if ($stmt->rowCount() > 0) {
            header("Location: listFuncionario.php");
            exit;
        } else {
            echo "Nenhum funcionário encontrado com esse ID.";
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
} else {
    echo "Funcionário não identificado.";
}
?>
