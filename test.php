<?php
	require("cnx.php");

	$requete = $bdd->query("SELECT * FROM coordonnees");
?>
<html>
	<head>
		<title>TP_ENSG</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container mt-3">
  			<h2>Coordonnées ENSG</h2>
  			<p>Tapez quelque chose dans lce champ pour rechercher une donnée du tableau :</p>  
  			<input class="form-control" id="myInput" type="text" placeholder="Recherche...">
  			<br>
  			<table class="table" id="table">
    			<thead>
      				<tr>
        				<th>Nom</th>
        				<th>Prénom</th>
        				<th>Courriel</th>
        				<th>Téléphone</th>
        				<th>Adresse</th>
      				</tr>
    			</thead>
    			<tbody id="myTable">
    			<?php
    			while($coordonnees = $requete->fetch())
    			{
    			?>
    			<tr>
    				<td><?php echo $coordonnees['nom']; ?></td>
    				<td><?php echo $coordonnees['prenom']; ?></td>
    				<td><?php echo $coordonnees['courriel']; ?></td>
    				<td><?php echo $coordonnees['telephone']; ?></td>
    				<td><?php echo $coordonnees['voie'] . ', ' .$coordonnees['code_postal'].', '.$coordonnees['ville']; ?></td>
    			</tr>
    			<?php
    			}
    			?>
    			</tbody>
    		</table>

        <script>
          // déterminer l'index des colonnes
          var colonnes = {};
          $("#table thead th").each(function(index, th) {
            colonnes[index] = $(th).text();
          });
 
          // faire la recherche dans le tableau
          $("#myInput").keyup(function()
          {
          var mots = $(this).val().toLowerCase().split(" ");
          $("#table tbody tr").each(function(index, tr)
          {
          if (mots[0].length > 0) $(tr).hide(); else $(tr).show();
          $("td", tr).each(function(index, td)
          { 
          if (colonnes[index] in {'Nom':true, 'Prénom':true})
          {
          for (mot in mots)
          {
            if (mots[mot].length > 0 && $(td).text().toLowerCase().indexOf(mots[mot]) >= 0)
            {
              $(tr).show();
              return false;
            }
          }
        }
      });
  });
});
        </script>
	</body>
</html>