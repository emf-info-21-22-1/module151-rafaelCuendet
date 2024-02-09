<?php
header("Access-Control-Allow-Origin: *");

class equipe{

    private $PK_equipe;
    private $Nom;

    public function __construct($PK_equipe, $Nom){
        $this->PK_equipe = $PK_equipe;
        $this->Nom = $Nom;
    }

    public function getIdEquipe(){
        return $this->PK_equipe;
    }

    public function getNom(){
        return $this->Nom;
    }
}

?>
