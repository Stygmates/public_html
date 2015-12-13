<?php
if(isset($_POST['login']) && isset($_POST[password]))
{
	$connexion=oci_connect('ttruong','mercilaius1');
	if(!$connexion)
	{
		echo 'Echec ouverture de session';
		exit;
	}
	$login=$_POST['login'];
	$requete='SELECT password FROM Utilisateur WHERE nom="'.$login.'"';
	$sql_result=oci_parse($connexion,$requete);
	oci_execute($sql_result);
}
?>