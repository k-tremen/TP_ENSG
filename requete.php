<?php
	include_once 'cnx.php';

	$requete = $bdd->query("SELECT * FROM coordonnees");

	$coordonnees = $requete->fetch();

?>