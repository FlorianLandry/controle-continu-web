<header style="overflow-y: hidden;">
   	<a href="accueil.php">
       	<img id="image-accueil" src="../decoration/accueil.png" alt="Icone accueil" title="Accueil">
	</a>
	


	<?php
		session_start();
		if (isset($_SESSION['id']))
		{
			echo '<a class="lien-navigation" href="profil.php">Mon profil</a>';
			echo '<a class="lien-navigation" href="../scripts/reponse-deconnexion.php">Déconnexion</a>';
		}
		else
		{
			echo '<a class="lien-navigation" href="formulaire-connexion.php">Connexion</a>';
			echo '<a class="lien-navigation" href="inscription.php">Inscription</a>';
		}
	?>

</header>