<?php
require("connexion.php");
$idpc=$_GET['id'];
$marque=$_POST['marque'];
$ram=$_POST['ram'];
$stockage=$_POST['stockage'];
$prix=$_POST['prix'];
$photo=$_POST['photo'];
if(isset($_POST['Modifier'])){
    try{
        $req="UPDATE pc set marque=:marque,ram=:ram,stockage=:stockage,prix=:prix,photo=:photo where idPc=:id";
        $stat=$con->prepare($req);
        $stat->bindParam(':id',$idpc);
        $stat->bindParam(':marque',$marque);
        $stat->bindParam(':ram',$ram);
        $stat->bindParam(':stockage',$stockage);
        $stat->bindParam(':prix',$prix);
        $stat->bindParam(':photo',$photo);
        $stat->execute();
        header("location: Accueil.php");
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
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
    <form action="modifier.php?id=<?php echo $_GET['id']; ?>" method="post">
        <input type="text" name="marque" placeholder="marque" >
        <input type="text" name="ram" placeholder="ram" >
        <input type="text" name="stockage" placeholder="stockage" >
        <input type="text" name="prix" placeholder="prix" >
        <input type="file" name="photo" placeholder="photo" >
        <input type="submit" value="Modifier" name="Modifier">
    </form>
</body>
</html>