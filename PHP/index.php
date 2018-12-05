<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Pizzeria</title>
        <script type="text/javascript" src="JS/lesFonctions.js"></script>
        <script type="text/javascript" src="JQuery/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    </head>

    <body>
        <?php
            include 'cnx.php';

            $sql = $bdd->prepare("select * from clients,livreurs,commandes");
            $sql->execute();
            echo"<table>";
            echo"<tr>";
                    echo"<th>Numéros de la commande</th>";
                    echo"<th>choix du livreur</th>";
                    echo"<th>choix du client</th>";
                echo"</tr>";
            foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
            {   
                echo"<tr>";
                    echo"<th>".$ligne['numCde']."</th>";
                    echo"<th>".$ligne['nomLiv']."</th>";
                    echo"<th>".$ligne['nomCli']."</th>";
                echo"</tr>";
            }
            echo"</table>"
        ?>
    </body>
</html>