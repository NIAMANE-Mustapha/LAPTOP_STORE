<?php
require('connexion.php');
$marque=$_POST['marque'];
$ram=$_POST['ram'];
$stockage=$_POST['stockage'];
$image=$_POST['image'];
$Prix=$_POST['Prix'];
$idvendeur=$_POST['idvendeur'];
if(isset($_POST['Ajouter_PC'])){
    try{
        $req = "INSERT INTO pc (marque, ram, stockage, prix, photo) VALUES (:marque, :ram, :stockage, :prix, :image)";       
        $stat=$con->prepare($req);
        $stat->bindParam(':marque',$marque);
        $stat->bindParam(':ram',$ram);
        $stat->bindParam(':stockage',$stockage);
        $stat->bindParam(':image',$image);
        $stat->bindParam(':prix',$Prix);
        $stat->execute();
        header("location: Accueil.php");

    }
    catch(PDOException $e){
        echo $e->getMessage();
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
            body, nav, a {
        margin: 0;
        padding: 0;
        }

        nav {
            background-color: #333;
            display: flex;
            overflow: hidden;
            display: flex;
            justify-content:center;
            margin-bottom:20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        nav a:hover {
            background-color: #575757;
            color: #FFD700;
        }

        nav a.active {
            background-color: #4CAF50;
            color: white;
        }
        main{
            margin:0,auto ;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            
        }


        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

</style>
</head>
<body>
    <nav>
        <a href="Accueil.php">Back</a>
        <a href="front.php">Front</a>
        <a href="addPC.php">Add PC</a>
    </nav>
    <main>
        <form action="addPC.php" method="post">
            <input type="text" name="marque" placeholder="marque">
            <input type="text" name="ram" placeholder="ram">
            <input type="text" name="stockage" placeholder="stockage">
            <input type="text" name="Prix" placeholder="Prix">
            <input type="file" name="image" placeholder="image">
            <input type="submit" value="ajouter_PC" name="Ajouter_PC">
        </form>
    </main>
</body>
</html>