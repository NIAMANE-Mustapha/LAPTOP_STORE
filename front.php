<?php
require('connexion.php');
$req="SELECT * FROM pc";
$res=$con->query($req);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        section{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: start;
            gap: 4em;
            flex-direction: row;
            
        }
        #pci{
            width: 308px;
            height: 260px;
        }
        article{
            text-align: center;
        }
        
        .button-33 {
        background-color: #c2fbd7;
        border-radius: 100px;
        box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
        color:darkslategrey;
        cursor: pointer;
        display: inline-block;
        font-family:Arial, Helvetica, sans-serif;
        font-weight: bold;
        padding: 7px 20px;
        text-align: center;
        margin-bottom:10px;
        text-decoration: none;
        transition: all 250ms;
        border: 0;
        font-size: 16px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-33:hover {
        box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
        transform: scale(1.05) rotate(-1deg);
        }
        p{
            font-family: 'Trebuchet MS', sans-serif;
            
        }
        #price{
            border: 1px,green;
            padding:14px;
            font-weight: bold;
            font-size:20px;
            font-style: italic;
        }
        span{
            color: red;
            font-size: 14px;
            font-weight: bold;
            font-style: italic;
            text-decoration: line-through;

        }

        #pci{
            cursor: pointer;
            transition: 0.5s;
            margin-bottom:10px;
        }
        #pci:hover{
            transform: scale(1.1);
        }
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


    </style>
</head>
<body>

    <nav>
        <a href="Accueil.php">Back</a>
        <a href="front.php">Front</a>
        <a href="addPC.php">Add PC</a>
    </nav>
    <div class="page-wrapper">
        <section>
            <?php foreach($res as $index){  ?>
                <article>
                <img id="pci" src="images/<?php echo htmlspecialchars($index['photo']) ?>" alt="photo">
                <h2><?php echo htmlspecialchars($index['marque'])?></h2>
                <p><?php echo htmlspecialchars($index['ram'])?> de RAM,<?php echo htmlspecialchars($index['stockage'])?> de Stockage</p>
                <p id="price"><span><?php echo htmlspecialchars($index['prix']+1700)?> DH</span> <?php echo htmlspecialchars($index['prix'])?> DH</p>
                <a href="https://www.cdiscount.com/search/10/laptop%20gamer.html#_his_" target="_blank" ><button class="button-33">Commander</button></a>
                </article>
            <?php } ?>
        </section>
       
    </div>
</body>
</html>