var colonnes = {};

//Définition de l'index des colonnes

$("#table thead th").each(function(index, th) {
    colonnes[index] = $(th).text();
});
 
// faire la recherche dans le tableau à la saisie de l'utilisateur

$("#myInput").keyup(function() {
    var mots = $(this).val().toLowerCase().split(" ");

    $("#table tbody tr").each(function(index, tr) {
        if (mots[0].length > 0) $(tr).hide(); else $(tr).show(); //Cache les lignes ne correspondant pas à la saisie

        $("td", tr).each(function(index, td) { 
            if (colonnes[index] in {'Nom':true, 'Prénom':true}) { //Recherche les lignes en fonction des colonnes d'index Nom et Prénom
                for (mot in mots) {
                    if (mots[mot].length > 0 && $(td).text().toLowerCase().indexOf(mots[mot]) >= 0) {
                        $(tr).show();
                        return false;
                    }
                }
            }
        });
    });
});