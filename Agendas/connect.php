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
	<?php include("header.php");?>
	<div class="container">
	<?php
	$connexion = oci_connect("ttruong","mercilaius1","osr-oracle.unistra.fr:1521/osr") or die("Une erreur de connexion s'est produite.\n");
	$requete = ociparse($connexion,"SELECT idUtilisateur,password FROM UTILISATEUR WHERE login LIKE '$_POST[login]'");
	oci_execute($requete,OCI_DEFAULT);
	oci_fetch($requete);
	$id=oci_result($requete,1);
	$pwd=oci_result($requete,2);
	if ($pwd == sha1($_POST["password"]))
	{
		session_start();
		$_SESSION[login]=$_POST[login];
		$_SESSION[id]=$id;
		echo "Connexion reussie, votre id est $_SESSION[id]";
	}
	else
	{
		echo "Login ou mot de passe errone";
	}
	oci_free_statement($requete);
	oci_close($connexion);
	?>
	</div>
	<?php include "footer.php"; ?>
</body>
</html>