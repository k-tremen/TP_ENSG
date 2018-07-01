<?php
	//Connexion à la BDD
	include('/php/cnx.php');

	//Récupération des données dans la variable $datas
	$datas = $bdd->query("SELECT * FROM coordonnees");
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>TP_ENSG</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style2.css">

		<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	</head>

	<body>

		<!-- DEBUT HEADER -->

		<div>
			<img src="images/ensg.jpg" class="header">
		</div>

		<!-- FIN HEADER -->

		<!-- DEBUT NAVIGATION -->

		<nav class="navbar navbar-expand-md navbar-light sticky-top">
			<a class="navbar-brand" href="#"><img src="images/logo.PNG"></a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="presentation.php">Présentation</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#">Données</a>
					</li>
				</ul>
			</div>

		</nav>

		<!-- FIN NAVIGATION -->

		<!-- DEBUT CONTENU -->

		<div class="container-fluid padding" id="gray">
			<div class="row welcome text-center">
				<div class="col-12">
					<h1 class="display-4">Récupération et recherche des données</h1>
				</div>

				<hr>

				<div class="col-12">
					<p class="lead">Saisissez un nom ou un prénom pour effectuer une recherche</p>
				</div>

			
				<div class="container">
					<!-- Barre de recherche -->
  					<input class="form-control" id="myInput" type="text" placeholder="Recherche...">

  					<br>

  					<!-- Tableau des données -->
  					<table class="table-bordered" id="table">

    					<thead>
      						<tr>
        						<th>Nom</th>
        						<th>Prénom</th>
        						<th>Courriel</th>
        						<th>Téléphone</th>
        						<th>Adresse</th>
        						<th>Descriptif</th>
      						</tr>
    					</thead>

    					<tbody>

    					<?php
    						//Parcours des résultats de notre query
    						while($coordonnees = $datas->fetch()) {
    					?>

    					<!-- Chaque résultat de notre query correspond à une ligne du tableau -->

    					<tr>
    						<td><?php echo $coordonnees['nom']; ?></td>
    						<td><?php echo $coordonnees['prenom']; ?></td>
    						<td><?php echo $coordonnees['courriel']; ?></td>
    						<td><?php echo $coordonnees['telephone']; ?></td>
    						<td><?php echo $coordonnees['voie'] . ', ' .$coordonnees['code_postal'].', '.$coordonnees['ville']; ?></td>
    						<td><?php echo $coordonnees['descriptif']; ?></td>
    					</tr>

    					<?php
    						}
    					?>

    					</tbody>
    				</table>
    			</div>
			</div> 
		</div>

		<!-- FIN CONTENU -->
	
    	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script src="js/app.js"></script>

	</body>
</html>