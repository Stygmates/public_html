<?php
	session_start();
	$connecte = isset($_SESSION[login]);
?>

<!doctype html>
<html>
</html>
<head>
	<meta charset="UTF-8">
	<title>Consultation de vos agendas</title>
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
			<legend>Création d'un agenda</legend>
		<form action="creationAgenda.php" method="post">
			<label for="nomAgenda_id">Nom de l'agenda:</label>
			<input type="text" name="nomAgenda" id="nomAgenda_id" required="required" value="Sports">

			<label for="chevauchement_id"><br>Autoriser le chevauchement:</label>
			<input type="radio" name="chevauchement" id="chevauchement_id" value="1" checked>Oui
			<input type="radio" name="chevauchement" id="chevauchement_id" value="0">Non
			<input type="submit" value="Création de l'agenda">
		</fieldset>
		</form>
	<?php	}	?>
	</div>
	<?php require("footer.php") ?>
</body>	