<?php
	session_start();
	$connecte = isset($_SESSION[login]);
?>

<!doctype html>
<html>
</html>
<head>
	<meta charset="UTF-8">
	<title>Création d'une activité</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<?php require("header.php") ?>
	<div class="container">
	<?php
	if(!$connecte)
	{
		echo "Il faut être connecté pour pouvoir accéder à cette page!";
	}
	else
	{	?>
		<fieldset>
			<legend>Création d'une activité</legend>
		<form action="creationActivite.php" method="post">
			<label for="nomActivite_id">Nom de l'activité:</label>
			<input type="text" name="nomActivite" id="nomActivite_id" required="required">

			<label for="descriptif_id">Descriptif:</label>
			<textarea name="descriptif" id="descriptif_id" rows="3"></textarea>
			
			<label for="localisation_id">Localisation:</label>
			<input type="text" name="localisation" id="localisation_id" required="required">

			<label for="datedebut_id">Date de début de l'activité:</label>
			<input type="text" name="datedebut" id="datedebut_id" placeholder="DD/MM/YYYY HH.MI.SS">
			
			<label for="datefin_id">Date de fin de l'activité:</label>
			<input type="text" name="datefin" id="datefin_id" placeholder="DD/MM/YYYY HH.MI.SS">
			
			<input type="submit" value="Création de l'activité">
		</fieldset>
		</form>
	<?php	}	?>
	</div>
	<?php require("footer.php") ?>
</body>	