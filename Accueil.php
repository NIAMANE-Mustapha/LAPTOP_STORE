<?php
require('connexion.php');
try{
    $req='select * from pc';
    $res=$con->query($req);
}
catch(Exception $e) {
    echo $e->getMessage();
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
        
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }


    th {
        background-color: #4CAF50; 
        color: white;
        padding: 10px;
        text-align: left;
        border-bottom: 2px solid #ddd;
        text-align: center;
    }


    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
        width:fit-content;
    }


    tr:hover {
        background-color: #f1f1f1;
    }


    tr:nth-child(even) {
        background-color: #f9f9f9;
    }


    td:first-child {
        font-weight: bold;
    }


    table, th, td {
        border: 1px solid #ccc;
    }


    @media screen and (max-width: 600px) {
        table {
            border: 0;
        }
        
        table thead {
            display: none;
        }
        
        table tr {
            margin-bottom: 10px;
            display: block;
            border-bottom: 2px solid #ddd;

        }
        
        table td {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: right;
            border-bottom: 1px dotted #ccc;
            position: relative;
            padding-left: 50%;
        }
        
        table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: bold;
            text-align: left;
        }
    }
    #pci{
        width: auto;
        height: 150px;
        padding: 10px;
        cursor: pointer;
        transition: 0.5s;
    }

    #pci:hover{
        transform: scale(1.1);
    }
    #icon{
        width: auto;
        height: 2em;
        margin-left:2em;
    }



    .button-33 {
    background-color: #c2fbd7;
    border-radius: 100px;
    box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
    color: green;
    margin:30px;
    cursor: pointer;
    display: inline-block;
    font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
    padding: 7px 20px;
    text-align: center;
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

</style>
</head>
<body>
<nav>
        <a href="Accueil.php">Back</a>
        <a href="front.php">Front</a>
        <a href="addPC.php">Add PC</a>
    </nav>
    <a href='addPC.php'><button class="button-33">Add PC</button></a>
    <table border='1'>

        <tr>
            <th>Marque</th>
            <th>Ram</th>
            <th>Stockage</th>
            <th>prix</th>
            <th>photo</th>
            <th>Actions</th>

        </tr>
        <?php    
        foreach($res as $index){
        ?>  
        <tr>
            <td> <?php echo htmlspecialchars($index['marque']) ?></td>
            <td> <?php echo htmlspecialchars($index['ram']) ?> </td>
            <td> <?php echo htmlspecialchars($index['stockage']) ?> </td>
            <td> <?php echo htmlspecialchars($index['prix']) ?> </td>
            <td><img id="pci" src="images/<?php echo htmlspecialchars($index['photo']); ?>"  alt="PC Photo"></td>
            <td><a  onclick="return confirm('Are you sure that you want to delete this row?');" href="Delete.php?id=<?php echo $index["idPc"]; ?>"><img id="icon" src="images/delete-icon.png" alt="delete"></a><a href="modifier.php?id=<?php echo $index["idPc"]; ?>"><img id="icon" src="images/edit.png" alt="Edit"></a></td>
            
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
    