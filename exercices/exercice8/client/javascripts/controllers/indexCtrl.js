/*
 * Contrôleur de la vue "index.html"
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 20-SEP-2013
 */

/**
 * Méthode appelée lors du retour avec succès du résultat des équipes
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 */
function chargerTeamSuccess(data, text, jqXHR) {
    var cmbEquipes = document.getElementById("cmbEquipes");
    cmbEquipes.options.length = 0;
    $(data).find("equipe").each(function() {
        var equipe = new Equipe();
        equipe.setPk($(this).find("id").text());
        equipe.setNom($(this).find("nom").text());
		cmbEquipes.options[cmbEquipes.options.length] = new Option(equipe.getNom(), equipe.getPk());
    });
}

/**
 * Méthode appelée lors du retour avec succès du résultat des joueurs
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 */
function chargerPlayerSuccess(data, text, jqXHR) {
    var cmbJoueurs = document.getElementById("cmbJoueurs");
    cmbJoueurs.options.length = 0;	
    $(data).find("joueur").each(function() {
        var joueur = new Joueur();
        joueur.setPoints($(this).find("points").text());
        joueur.setNom($(this).find("nom").text());
		cmbJoueurs.options[cmbJoueurs.options.length] = new Option(joueur.getNom(), joueur.getPoints());
    });
}

/**
 * Méthode appelée en cas d'erreur lors de la lecture du webservice
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 */
function chargerTeamError(request, status, error) {
    alert("erreur : " + error + ", request: " + request + ", status: " + status);
}

/**
 * Méthode appelée en cas d'erreur lors de la lecture du webservice
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 */
function chargerPlayerError(request, status, error) {
    alert("erreur : " + error + ", request: " + request + ", status: " + status);
}

/**
 * Méthode "start" appelée après le chargement complet de la page
 */
$(document).ready(function() {
    var butLoad = $("#displayTeams");
    var cmbEquipes = $("#cmbEquipes");
    var cmbJoueurs = $("#cmbJoueurs");
    var equipe = '';
    var joueur = '';
    $.getScript("javascripts/beans/equipe.js", function() {
        console.log("equipe.js chargé !");
    });
    $.getScript("javascripts/beans/joueur.js", function() {
        console.log("joueur.js chargé !");
    });
    $.getScript("javascripts/services/servicesHttp.js", function() {
        console.log("servicesHttp.js chargé !");
        chargerTeam(chargerTeamSuccess, chargerTeamError);
    });

    cmbEquipes.change(function(event) {
        var selectedIndex = this.selectedIndex;
        if (selectedIndex !== -1) {
            var equipe = this.options[selectedIndex].value;
            try {
                var equipeData = JSON.parse(equipe);
                
                    chargerPlayers(equipeData, chargerPlayerSuccess, chargerPlayerError);
                
            } catch (error) {
                // Handle JSON parsing error
                console.error('Error parsing JSON:', error);
            }
        } else {
            // Handle case where no option is selected
            console.error('No option selected.');
        }
    });
    
    cmbJoueurs.change(function(event) {
        var selectedIndex = this.selectedIndex;
        if (selectedIndex !== -1) {
            var joueur = this.options[selectedIndex].value;
            try {
                var joueurData = JSON.parse(joueur);
                if (joueurData && joueurData.nom && joueurData.points) {
                    alert(joueurData.nom + ": " + joueurData.points + " points");
                } else {
                    // Handle case where JSON data or required properties are missing
                    console.error('Invalid JSON data or missing required properties.');
                }
            } catch (error) {
                // Handle JSON parsing error
                console.error('Error parsing JSON:', error);
            }
        } else {
            // Handle case where no option is selected
            console.error('No option selected.');
        }
    });
    
});
