<?php

class joueur{

    private $PK_joueur;
    private $ID_equipe;
    private $Points;
    private $Nom;

    public function __construct($PK_joueur, $ID_equipe, $Points, $Nom){
        $this->PK_joueur = $PK_joueur;
        $this->ID_equipe = $ID_equipe;
        $this->Points = $Points;
        $this->Nom = $Nom;
    }

    public function getPKJoueur(){
        return $this->PK_joueur;
    }

    public function getIdEquipe(){
        return $this->ID_equipe;
    }   

    public function getPoints(){
        return $this->Points;
    }

    public function getNom(){
        return $this->Nom;
    }

}

?>
