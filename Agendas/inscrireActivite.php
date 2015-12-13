<?php
	session_start();
	$connecte = isset($_SESSION[login]);
?>

<!doctype html>
<html>
</html>
<head>
	<meta charset="UTF-8">
	<title>Lier une activité à un agenda</title>
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
		<h2>Liste des activités enregistrées</h2>

		<?php
		$connexion = oci_connect("ttruong","mercilaius1","osr-oracle.unistra.fr:1521/osr") or die("Une erreur de connexion s'est produite.\n");
		$requete = oci_parse($connexion,"SELECT idActivite,nomActivite,descriptif,localisation,TO_CHAR(datedebut,'DD-MON-YYYY HH:MI:SS') as datedebut,TO_CHAR(datefin,'DD-MON-YYYY HH:MI:SS') as datefin,TO_CHAR(dateinitiale,'DD-MON-YYYY HH:MI:SS') as dateinitiale,TO_CHAR(dateeffective,'DD-MON-YYYY HH:MI:SS') as dateeffective FROM ACTIVITE");
		oci_execute($requete);
		$ncols = oci_num_fields($requete);
		?>
		<table border=1 class="table table-striped">
		<?php
		for ($i = 1; $i <= $ncols; $i++)
		{
			$column_name  = oci_field_name($requete, $i);
			echo "<th>".strtolower($column_name)."</th>";
		}
		while (($row = oci_fetch_array($requete, OCI_BOTH)) != false)
		{
			echo "<tr>";
			for ($i = 0; $i < $ncols; $i++)
			{
				echo "<td>$row[$i]</td>";
			}
			echo "</tr>";
		}
		?>
		</table>

		<h2>Liste de vos agendas</h2>

		<?php
		$requete = oci_parse($connexion,"SELECT idAgenda,nomAgenda,TO_CHAR(lastModifAgenda,'DD-MON-YYYY HH:MI:SS') AS lastModifAgenda, chevauchement FROM AGENDA WHERE idUtilisateur=$_SESSION[id]");
		oci_execute($requete);
		$ncols = oci_num_fields($requete);
		?>
		<table border=1 class="table table-striped">
		<?php
		for ($i = 1; $i <= $ncols; $i++)
		{
			$column_name  = oci_field_name($requete, $i);
			echo "<th>".strtolower($column_name)."</th>";
		}
		while (($row = oci_fetch_array($requete, OCI_BOTH)) != false)
		{
			echo "<tr>";
			for ($i = 0; $i < $ncols; $i++)
			{
				echo "<td>$row[$i]</td>";
			}
			echo "</tr>";
		}
		oci_free_statement($requete);
		oci_close($connexion);
		?>
		</table>
		
		<fieldset>
			<legend>S'inscrire à une activité</legend>
		<form action="inscriptionActivite.php" method="post">
			<label for="idActivite_id">Identifiant de l'activité:</label>
			<input type="text" name="idActivite" id="idActivite_id" required="required">

			<label for="idAgenda_id">Identifiant de votre agenda:</label>
			<input type="text" name="idAgenda" id="idAgenda_id" required="required">
			
			<input type="submit" value="Inscription à l'activité">
		</fieldset>
		</form>
	<?php	}	?>
	</div>
	<?php require("footer.php") ?>
</body>	