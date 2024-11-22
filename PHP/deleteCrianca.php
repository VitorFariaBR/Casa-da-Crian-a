<?php 
    session_start();

    if(!isset($_SESSION) || ($_SESSION["loggedin"] == false)){
        header("Location: painel.php");
    }

include 'conect.php';  

if(isset($_GET['ID_ALUNO'])){
    $idCrianca = $_GET['ID_ALUNO'];
    $con = conect::conectar();
    try{
        $stmt = $con->prepare('DELETE FROM aluno WHERE ID_ALUNO = :v1');

        $stmt->execute(array(
            ':v1' => $idCrianca
        ));
        
        if($stmt->rowCount() > 0){
            header("Location: listCrianca.php"); 
        }        
    }catch(PDOException $e){
        echo 'Erro: ' . $e->getMessage();
    }  
}else{
    echo "Criança não identificada";
}

?>