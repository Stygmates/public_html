<header>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div>
			<ul class="nav navbar-nav navbar-right">
			<?php
			if($connecte)
			{ ?>
				<li><a href="#">Bonjour <?php echo "$_SESSION[login]"?></a></li>
				<li><a href="consultation.php">Consulter vos agendas</a></li>
				<li><a href="creerAgenda.php">Créer un agenda</a></li>
				<li><a href="creerActivite.php">Créer une activité</a></li>
				<li><a href="inscrireActivite.php">S'inscrire à une activité</a></li>
				<li><a href="index.php?logout=yes">Déconnexion</a></li>
				<?php	}else{	?>
				<li><a href="login.php">Connexion</a></li>
				<li><a href="inscription.php">Inscription</a></li>
				<?php	}	?>
			</ul>
		</div>

	</div>
</header>
