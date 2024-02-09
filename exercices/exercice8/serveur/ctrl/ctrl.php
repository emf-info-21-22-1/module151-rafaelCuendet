<?php
header("Access-Control-Allow-Origin: *");

require('wrk.php');
require('joueur.php');
require('equipe.php');

class ctrl {
    private $wrk;

    
    public function __construct() {
        $this->wrk = $wrk;
    }

    public function getEquipes() {
        $equipesList = $this->wrk->getEquipesFromDB();
        $equipes = array();
        foreach ($equipesList as $equipe) {
            $equipeInstance = new equipe($equipe['id'], $equipe['nom']);
            $equipes[] = array(
                'id' => $equipeInstance->getIdEquipe(),
                'nom' => $equipeInstance->getNom()
            );
        }
        $equipesJSON = json_encode($equipes);
        echo $equipesJSON;
    }

    public function getJoueurs($teamID) {
        $joueursList = $this->wrk->getJoueursFromDB($teamID);
        $joueurs = array();
        foreach ($joueursList as $joueurData) {
            $joueurInstance = new joueur($joueurData['PK_joueur'], $joueurData['ID_equipe'], $joueurData['Points'], $joueurData['Nom']);
            $joueurs[] = array(
                'id' => $joueurInstance->getPKJoueur(),
                'equipe_id' => $joueurInstance->getIdEquipe(),
                'points' => $joueurInstance->getPoints(),
                'nom' => $joueurInstance->getNom()
            );
        }
        $joueursJSON = json_encode($joueurs);
        echo $joueursJSON;
    }
}

?>
