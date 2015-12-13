<?php
	session_start();
	$connecte = isset($_SESSION[login]);
?>

<!doctype html>
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
	<div class="container">
	<?php
	if(!$connecte)
	{
		echo "Il faut être connecté pour pouvoir accéder à cette page!";
	}
	else
	{
		?>
		<h1>Activités de vos agendas</h1>
		<?php
		$connexion = oci_connect("ttruong","mercilaius1","osr-oracle.unistra.fr:1521/osr") or die("Une erreur de connexion s'est produite.\n");
		$requete2 = oci_parse($connexion,"SELECT idAgenda,nomAgenda FROM AGENDA WHERE idUtilisateur=$_SESSION[id]");
		oci_execute($requete2);

		while (($row2 = oci_fetch_array($requete2, OCI_BOTH)) != false)
		{
			echo "<h3>Agenda $row2[1] qui a pour id $row2[0]</h3>";
		$requete = oci_parse($connexion,"SELECT APPARTIENT.idAgenda,nomAgenda,APPARTIENT.idActivite,nomActivite,descriptif,priorite,TO_CHAR(dateInitiale,'DD-MON-YYYY HH24:MI:SS') as dateInitiale,TO_CHAR(dateDebut,'DD-MON-YYYY HH24:MI:SS') AS dateDebut,TO_CHAR(dateFin,'DD-MON-YYYY HH24:MI:SS') AS dateFin FROM ACTIVITE,APPARTIENT,AGENDA WHERE ACTIVITE.idActivite=APPARTIENT.idActivite AND AGENDA.idAgenda=APPARTIENT.idAgenda AND AGENDA.idAgenda=$row2[0] ORDER BY AGENDA.idAgenda,dateDebut");
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
		echo "</table>";
		}

		?>
		<h1>Activités des agendas auxquels vous avez accès</h1>

		<?php
		$requete2 = oci_parse($connexion,"SELECT ACCEDE.idAgenda,nomAgenda FROM AGENDA,ACCEDE WHERE AGENDA.idAgenda=ACCEDE.idAgenda AND ACCEDE.idUtilisateur=$_SESSION[id]");
		oci_execute($requete2);
		while (($row2 = oci_fetch_array($requete2, OCI_BOTH)) != false)
		{
			echo "<h3>Agenda $row2[1] qui a pour id $row2[0]</h3>";
			$requete = oci_parse($connexion,"SELECT login as Agenda_de,APPARTIENT.idAgenda,nomAgenda,APPARTIENT.idActivite,nomActivite,descriptif,priorite,TO_CHAR(dateInitiale,'DD-MON-YYYY HH24:MI:SS') AS dateInitiale,TO_CHAR(dateDebut,'DD-MON-YYYY HH24:MI:SS') AS dateDebut,TO_CHAR(dateFin,'DD-MON-YYYY HH24:MI:SS') AS dateFin FROM ACTIVITE,APPARTIENT,AGENDA,ACCEDE,UTILISATEUR WHERE ACTIVITE.idActivite=APPARTIENT.idActivite AND AGENDA.idAgenda=APPARTIENT.idAgenda AND ACCEDE.idAgenda=AGENDA.idAgenda AND AGENDA.idUtilisateur=UTILISATEUR.idUtilisateur AND ACCEDE.idUtilisateur=$_SESSION[id] AND AGENDA.idAgenda=$row2[0] ORDER BY login,AGENDA.idAgenda,dateDebut");
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
		echo "</table>";
		}
		oci_free_statement($requete);
		oci_close($connexion);
	}
	?>
	</div>
	<?php require("footer.php"); ?>
</body>
</html>
