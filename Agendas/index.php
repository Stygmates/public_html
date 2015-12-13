<?php
session_start();
if(isset($_GET[logout]))
{
	session_unset();
}
$connecte = isset($_SESSION[login]);
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Agendas - Accueil</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body>
	<?php include("header.php");?>
	<div class="container">
	<?php
	if(isset($_GET[logout]))
	{
		echo "Merci de votre visite et à bientôt!<br>";
		?>
		<a href="index.php">Revenir à la page d'accueil</a><br>
		<?php
	}
	else
	{
		echo "<h1>Bienvenue sur votre site d'agendas!</h1>";
	}
	?>
	</div>
	<?php include("footer.php");?>
</body>
</html>