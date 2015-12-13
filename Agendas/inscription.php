<?php
	session_start();
	$connecte = isset($_SESSION[login]);
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Agendas - Inscription</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<?php include("header.php"); ?>
	
	<?php
	if($connecte)
	{
		echo "Vous êtes déjâ connecté en tant que $_SESSION[login]";
	}
	else
	{
	?>
		<fieldset>
			<legend>Inscription</legend>
			<table>
		<form action="creationCompte.php" method="post">
			<fieldset>
			<legend>Identifiants</legend>
			<tr>
			<label for="login_id">Login: </label>
			<input type="text" name="login" id="login_id" required="required" value="johnny" style="display:block">
			</tr>
			
			<tr>
			<label for="email_id">Adresse mail:</label>
			<input type="email" name="email" id="email_id" required="required" value="john@doe.com" style="display:block">
			</tr>

			<tr>
			<label for="password_id">Mot de passe:</label>
			<input type="password" name="password" id="password_id" required="required" value="123456" style="display:block">
			</tr>

			<tr>
			<label for="password2_id">Confirmation mot de passe:</label>
			<input type="password" name="password2" id="password2_id" required="required" value="123456" style="display:block">
			</tr>
			</fieldset>

			<fieldset>
			<legend>Informations personnelles</legend>
			<label for="nom_id">Nom:</label>
			<input type="text" name="nom" id="nom_id" required="required" value="john doe" style="display:block">
	
			<label for="prenom_id">Prénom:</label>
			<input type="text" name="prenom" id="prenom_id" style="display:block">

			<label for="adresse_id">Adresse:</label>
			  <textarea name="adresse" rows="*3" style="display:block"></textarea>
			</fieldset>
		</fieldset>
		<input type="submit" value="Inscription">
		</form>
	</table>
<?php } ?>	
	<?php include("footer.php");?>
</body>
</html>