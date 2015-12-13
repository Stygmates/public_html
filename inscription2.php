<?php
$login=$_POST['login'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse=$_POST['adresse'];

$connexion=oci_connect('ttruong','mercilaius1');
if(!$connexion)
{
	echo 'Echec connexion a la base de donnees';
	exit;
}
$requete='SELECT COUNT(*) FROM UTILISATEUR WHERE login="'.login.'"';
$sql_result = oci_parse($connexion,$requete);
?>