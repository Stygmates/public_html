<?php
	session_start();
	$connecte = isset($_SESSION[login]);
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Consultation de vos agendas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<?php require("header.php"); ?>
<h1>Creation de l'agenda</h1>
<?php
	if($connecte)
	{
		$connexion = oci_connect("ttruong","mercilaius1","osr-oracle.unistra.fr:1521/osr") or die("Une erreur de connexion s'est produite.\n");
		$requete="INSERT INTO AGENDA VALUES(seq_agenda.nextval,'$_POST[nomAgenda]',sysdate,$_POST[chevauchement],$_SESSION[id])";
		$stid=oci_parse($connexion,$requete);
		$validation=oci_execute($stid);
		if($validation)
		{
			echo "Nouvel agenda créé!";
		}
		else
		{
			$erreur=oci_error($stid);
			echo "Erreur lors de la création de l'agenda:";
			echo $erreur[message];
		}
		oci_free_statement($stid);
		oci_close($connexion);
	}
	else
	{
		echo "Vous devez être connecté pour accéder à cette page!";
	}
?>
<?php require("footer.php");?>

</body>
</html>