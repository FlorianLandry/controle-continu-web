<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/theme.css">
        <link rel="stylesheet" type="text/css" href="../css/accueil.css">
        <link rel="stylesheet" href="../css/index.css">
        <base target="_parent">
        <title>I-U-Training</title>

    </head>
    <body>
        <?php include("header.php"); ?>
        <hr/>
        <h1>I-U-Training</h1>
        <p>Bienvenue sur le site d'entraînement I-U-Training !</p>
        <hr/>

        </div>

        <?php
        if(isset($_SESSION['id'])){
            if($_SESSION['statut'] == 'etudiant'){
                echo "connecté en tant qu'étudiant";
            }
            elseif ($_SESSION['statut'] == 'prof'){
                echo "connecté en tant que prof";
            }
            elseif ($_SESSION['statut'] == 'admin'){
                echo "no PAIN no GAIN";
            }
            else {
                echo "connecté en tant que admin";
            }
        }
        else {
            echo "<h1>Veuillez d'abord vous connecter svp</h1>";
        }
        ?>

        <!--<h1>Nos destinations les plus visitées</h1>
        --><?php
/*            include('../scripts/recuperer-destinations.php');
            foreach (recupererDestinations() as $tab){
                if($tab["sur_accueil"]){
                    $html = "<a href=\"./infos-achat-offre.php?id=".$tab['id_offre']."\"/>";
                    $html .= "<div class=\"div-destination\">";
                    $html .= "<img src=\"".$tab["url_image"]."\" class=\"img-destination\" alt=\"Image représentant la destination\"/>";
                    $html .= "<div>";
                    $html .= "<p>".$tab["description"]."</p>";
                    $html .= "<p>Prix : ".$tab["prix"]." €</p>";
                    $html .= "</div></div></a>";
                    echo $html;
                }
            }
        */?>
        <hr/>

    </body>
</html>