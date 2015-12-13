<?php
session_start();
$connecte = isset($_SESSION[login]);
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Agendas - Connexion</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<?php include("header.php"); ?>
	<div class="container">
	<?php
	if($connecte)
	{
		echo "Vous êtes connecté en tant que ";
		echo $_SESSION[login];
	}
	else
	{	?>
		<form method="POST" action="connect.php">
			<fieldset>
				<legend>Connexion</legend>
				<label for="login_id">Login:</label>
				<input type="text" name="login" id="login_id" required="required" value="johnny">
				<label for="password_id">Mot de passe:</label>
				<input type="password" name="password" id="password_id" required="required" value="123456">
				<input type="submit" value="Connexion">
			</fieldset>
		</form>
	<?php	}	?>
	</div>
	<?php include("footer.php"); ?>
</body>
</html>