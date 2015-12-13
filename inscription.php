<!doctype html>
<head>
	<meta charset="UTF-8">
	<title>Site des agendas - Inscription</title>
</head>
<body>
	<?php include("header.php"); ?>
	<fieldset>
		<legend>Inscription</legend>
	<form action="inscription2.php" method="post">
		<fieldset>
		<legend>Identifiants</legend>
		<label for="login_id">Login:</label>
		<input type="text" name="login" id="login_id">
	
		<label for="password_id">Mot de passe</label>
		<input type="password" name="password" id="password_id" >

		<label for="password2_id">Confirmation mot de passe</label>
		<input type="password" name="password2" id="password2_id">
		</fieldset>

		<fieldset>
		<legend>Informations personnelles</legend>
		<label for="nom_id">Nom:</label>
		<input type="text" name="nom" id="nom_id">
	
		<label for="prenom_id">Prénom</label>
		<input type="text" name="prenom" id="prenom_id">

		<label for="adresse_id">Adresse</label>
		<input type="textarea" name="adresse" id="adresse_id" rows="3">
		</fieldset>
	</fieldset>
	<input type="submit" value="Inscription">
	</form>
	<?php include("footer.php");?>
</body>