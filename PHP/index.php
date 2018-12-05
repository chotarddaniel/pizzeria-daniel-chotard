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

            $sql = $bdd->prepare("select * from clients");
            $sql->execute();
            $sql2 = $bdd->prepare("select * from livreurs");
            $sql2->execute();
           
            echo"<table>";
            echo"<tr>";
                    echo"<th>Numéros de la commande</th>";
                    echo"<th>choix du livreur</th>";
                    echo"<th>choix du client</th>";
            echo"</tr>";
            echo"<tr>";
                echo "<th><input type='text' name='lname' disabled></th>";
                echo "<th><select id=client onchange='AfficherLesClients()'>";
                foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
                {  
                    echo "<option value='".$ligne['numCli']."'>".$ligne['nomCli']."</option>";
                }
                echo "</select></th>";

                echo "<th><select id=livreurs onchange='AfficherLesLivreurs()'>";
                foreach($sql2->fetchAll(PDO::FETCH_ASSOC) as $ligne)
                {  
                    echo "<option value='".$ligne['numLiv']."'>".$ligne['nomLiv']."</option>";
                }
                echo "</select></th>";
            echo"</tr>";
            
            echo"</table>"
        ?>
    </body>
</html>