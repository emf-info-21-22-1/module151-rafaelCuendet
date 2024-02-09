<?php
require_once('Connexion.php');
require_once('bean/Equipe.php');

class EquipesDBManager {
    private $connexion;
    
    public function __construct() {
        $this->connexion = connexion::getInstance();
    }
    
    public function getEquipes() {
        // Pass an empty array instead of null
        $query = $this->connexion->selectQuery("select pk_equipe, nom from t_equipe;", []);
        
        $result = array();
        foreach ($query as $row) {
            $equipe = new Equipe($row['pk_equipe'], $row['nom']);
            $result[] = $equipe;
        }
        
        return $result;
    }
}

?>
