<?php
	$connexion = oci_connect('ttruong','mercilaius1',codd:1521/ROSA);
	if(!$connexion)
	{
		$erreur=oci_error();
		echo 'Impossible de se connecter a la base de donnees:'.$erreur['message'];
		exit;
	}
	else
	{
		echo 'Connexion a la base reussie';
	}
?>