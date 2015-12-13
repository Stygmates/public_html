<?php
	session_start();
	$connecte = isset($_SESSION[login]);
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administrasion</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<?php require("header.php"); ?>
<h1>Mise a jour du mot de passe administrateur</h1>
<?php

		$connexion = oci_connect("ttruong","mercilaius1","osr-oracle.unistra.fr:1521/osr") or die("Une erreur de connexion s'est produite.\n");
		$pwd=sha1('password');
		$requete="UPDATE UTILISATEUR SET password='$pwd' WHERE login like 'admin'";
		$stid=oci_parse($connexion,$requete);
		$validation=oci_execute($stid);
		if($validation)
		{
			echo "Mise a jour reussie!";
		}
		else
		{
			$erreur=oci_error($stid);
			echo "Erreur lors de la mise a jour du mot de passe admin:";
			echo $erreur[message];
		}
		oci_free_statement($stid);
		oci_close($connexion);
?>
<?php require("footer.php");?>

</body>
</html>