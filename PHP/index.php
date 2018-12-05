<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Pizzeria</title>
        <script type="text/javascript" src="JS/Fonctions.js"></script>
        <script type="text/javascript" src="JQuery/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    </head>

    <body>
    <form action="index.php" method="post">
        <script type="text/javascript">
        function sliderChange(val)
        {
        document.getElementById('sliderStatus').innerHTML = val;
        }
        </script>
        <?php
            include 'cnx.php';

            $sql = $bdd->prepare("select * from clients");
            $sql->execute();
            $sql2 = $bdd->prepare("select * from livreurs");
            $sql2->execute();
            $sql3 = $bdd->prepare("select * from pizzas");
            $sql3->execute();
            $sql4 = $bdd->prepare("select * from commandes");
            $sql4->execute();
           echo"<section>";
                echo"<table>";
                echo"<tr>";
                    echo"<th>Numéros de la commande</th>";
                    echo"<th>choix du livreur</th>";
                    echo"<th>choix du client</th>";
                echo"</tr>";
                echo"<tr>";
                    echo "<th><input type='text' name='lname' disabled></th>";
                    echo "<th><select id=client '>";
                    foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
                    {  
                        echo "<option value='".$ligne['numCli']."'>".$ligne['nomCli']."</option>";
                    }
                    echo "</select></th>";

                    echo "<th><select id=livreurs '>";
                    foreach($sql2->fetchAll(PDO::FETCH_ASSOC) as $ligne)
                    {  
                        echo "<option value='".$ligne['numLiv']."'>".$ligne['nomLiv']."</option>";
                    }
                    echo "</select></th>";
                echo"</tr>";
                
                echo"</table>";
            echo "</section>";
            echo"</div>";
            echo"<section>";
                    echo "<p>choix des pizzas</p>";
                    echo "<div>";
                        echo"<table>";
                            echo"<tr>";
                                echo"<th>Nom Pizza</th>";
                                echo"<th>Nombres de personnes</th>";
                                echo"<th>Prix</th>";
                                echo"<th>Quantité</th>";
                            echo"</tr>";
                            
                            foreach($sql3->fetchAll(PDO::FETCH_ASSOC) as $ligne)
                            {  
                                echo"<tr>";
                                echo"<th><p>".$ligne['nomPiz']."</p></th>";
                                echo"<th><p>".$ligne['nbPers']."</p></th>";
                                echo"<th><p>".$ligne['prix']."</p></th>";
                                echo"<th><input type='range' min='1' max='5' value='0' onChange='sliderChange(this.value)'><span id='sliderStatus'></span></th>";
                            }
                            
                        echo"</table>";
                    echo"</div>";
            echo"</section>";
            echo"<section id'financement'>";
                echo"<input class='textValue' type='text' value='10'>";
                echo "<input style='width: 100%' type='submit' value='Envoyer' name='btnEnvoyer'>";
                              
        ?>
    </form>
    </body>
</html>