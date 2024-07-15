<?php
require('connexion.php');
$idPC=$_GET['id'];
try{
    $req="DELETE FROM pc WHERE idPc=:id";
    $stmt=$con->prepare($req);
    $stmt->bindParam(':id',$idPC);
    $stmt->execute();
    header('location: Accueil.php');
}
catch(PDOException $e){
    echo $e->getMessage();
}



?>
