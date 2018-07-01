<?php
	try {
		$bdd = new PDO("mysql:host=localhost;dbname=TP_ENSG;charset=utf8", "root", "");
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>