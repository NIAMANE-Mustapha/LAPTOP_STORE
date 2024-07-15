<?php
require('connexion.php');

$idv=$_POST['idv'];
$email=$_POST['email'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$tel=$_POST['tel'];
$password=$_POST['password'];

try{
    $req="INSERT INTO vendeur values(:id,:email,:nom,:prenom,:tel,:password)";
    $stat=$con->prepare($req);
    $stat->bindParam(':id',$idv);
    $stat->bindParam(':email',$email);
    $stat->bindParam(':nom',$nom);
    $stat->bindParam(':prenom',$prenom);
    $stat->bindParam(':tel',$tel);
    $stat->bindParam(':password',$password);
    $stat->execute();
    header('location: Accueil.php');

}

catch(PDOException $e){
    echo $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="inscriptionVendeur.php" method="post">
        <input type="text" name="idv" placeholder="Vendeur ID" >
        <input type="text" name="email" placeholder="Email" >
        <input type="text" name="nom" placeholder="Nom" >
        <input type="text" name="prenom" placeholder="Prenom" >
        <input type="text" name="tel" placeholder="Telephone" >
        <input type="password" name="password" placeholder="password" >
        <input type="submit" value="Ajouter" name="Ajouter">
    </form>
</body>
</html>