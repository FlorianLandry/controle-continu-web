<?php
    include("connexion.php");
    global $db;

    $filterUtilisateur = array(
        'prenom' => FILTER_SANITIZE_STRING,
        'nom' => FILTER_SANITIZE_STRING,
        'date-naissance' => FILTER_SANITIZE_STRING,
        'mail' => FILTER_SANITIZE_STRING,
        'mot-de-passe' => FILTER_SANITIZE_STRING,
        'validation-mot-de-passe' => FILTER_SANITIZE_STRING,
    );
    $utilisateur = filter_input_array(INPUT_POST, $filterUtilisateur);

    if($utilisateur['mot-de-passe'] == $utilisateur['validation-mot-de-passe']){

        $verificationMail = $db->prepare("SELECT * FROM UTILISATEUR WHERE mail = :mail");
        $verificationMail->bindParam(':mail', $utilisateur['mail'], PDO::PARAM_STR);
        $verificationMail->execute(); 
        $mailUtilisateur = $verificationMail->fetch();

        if (!$mailUtilisateur) { // Le mail n'existe pas dans la base de données

            $utilisateur['mot-de-passe'] = password_hash($utilisateur['mot-de-passe'], PASSWORD_DEFAULT);

            $SQL_AJOUTER_UTILISATEUR = "INSERT INTO UTILISATEUR (prenom, nom, date_naissance, mail, mot_de_passe, statut)
                                            VALUES (:prenom, :nom, :date_naissance, :mail, :mot_de_passe, 'etudiant')";
            
            $ajoutUtilisateur = $db->prepare($SQL_AJOUTER_UTILISATEUR);
            $ajoutUtilisateur->bindParam(':prenom', $utilisateur['prenom'], PDO::PARAM_STR);
            $ajoutUtilisateur->bindParam(':nom', $utilisateur['nom'], PDO::PARAM_STR);
            $ajoutUtilisateur->bindParam(':date_naissance', $utilisateur['date-naissance'], PDO::PARAM_STR);
            $ajoutUtilisateur->bindParam(':mail', $utilisateur['mail'], PDO::PARAM_STR);
            $ajoutUtilisateur->bindParam(':mot_de_passe', $utilisateur['mot-de-passe'], PDO::PARAM_STR);
            $ajoutUtilisateur->execute();

            header("Location: ../pages/formulaire-connexion.php?inscription-valide=Votre compte a bien été créé");
        }
        else{ // Le mail existe dans la base de données
            header("Location: ../pages/inscription.php?erreur-mail=Le mail que vous avez entré est déjà utilisé");
        }
    }
    else{
        header("Location: ../pages/inscription.php?erreur-mot-de-passe=Le mot de passe de validation est différent du mot de passe");
    }
?>
