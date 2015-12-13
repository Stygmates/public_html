<!doctype html>
<head>
	<title>Agendas - Connexion</title>
	<meta charset="UTF-8">
</head>
<body>
	<?php include("header.php");?>
	
	<form action="login.php" method="post"></form>

	<label for="login_id">Login:</label>
	<input type="text" name="login" id="login_id">
	
	<label for="password_id">Mot de passe</label>
	<input type="password" name="password" id="password_id" >

	<input type="submit" value="Connexion">
	</form>

	<?php include("footer.php");?>
</body>