<?php
    include("connexion.php");
    global $db;

    $filtresConnexion = array(
        'mail' => FILTER_VALIDATE_EMAIL,
        'mot-de-passe' => FILTER_SANITIZE_STRING
    );

    $identifiants = filter_input_array(INPUT_POST, $filtresConnexion);

    $SQL_UTILISATEUR = "SELECT * FROM utilisateur WHERE mail = :mail";

    $requeteUtilisateur = $db->prepare($SQL_UTILISATEUR);
    $requeteUtilisateur->bindParam(':mail', $identifiants['mail'], PDO::PARAM_STR);
    $requeteUtilisateur->execute();
    $utilisateur = $requeteUtilisateur->fetch();

    $motDePasseCorrect = password_verify($identifiants['mot-de-passe'], trim($utilisateur['mot_de_passe']));



    if (!$utilisateur)
    {
        header("Location: ../pages/formulaire-connexion.php?erreur-mail=l'adresse mail n'est pas valide");;
    }
    else
    {
        if ($motDePasseCorrect)
        {
            session_start();
            $_SESSION['id'] = $utilisateur['id_utilisateur'];
            $_SESSION['prenom'] = $utilisateur['prenom'];
            $_SESSION['nom'] = $utilisateur['nom'];
            $_SESSION['mail'] = $utilisateur['mail'];
            $_SESSION['statut'] = $utilisateur['statut'];
            $_SESSION['questionnaire_charge'] = 0;
            if (isset($_SESSION['id']))
		    {
			    echo '<a href="profil.php">Mon profil</a>';
		    }
		    else
		    {
			    echo '<a href="formulaire-connexion.php">Connexion</a>';
		    }
            header("Location: ../pages/accueil.php");
        }
        else
        {
            header("Location: ../pages/formulaire-connexion.php?erreur-mot-de-passe=Le mot de passe n'est pas correct");;
        }
    }


?>