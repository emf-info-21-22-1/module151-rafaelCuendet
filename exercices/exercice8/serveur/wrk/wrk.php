<?php
header("Access-Control-Allow-Origin: *");

require('wrkDBConnection.php');

class wrk
{
    private $pdo; // Adding a property for the PDO object

    // Constructor to initialize the database connection
    public function __construct(){
        $dbConnection = new wrkDBConnection(); /
        $this->pdo = $dbConnection->getConnection();
    }

    public function getEquipesFromDB(){
        if(dbConnectionTest()){ 
            $query = $this->pdo->prepare('SELECT * FROM t_equipe');
            $query->execute();
            $equipes = $query->fetchAll(PDO::FETCH_ASSOC);
            return $equipes;
        }
    }

    public function getJoueursFromDB($teamID){
        if((dbConnectionTest()) && ($teamID != null)){ 
            $query = $this->pdo->prepare("SELECT * FROM t_joueur WHERE FK_equipe = :teamID");
            $query->bindParam(':teamID', $teamID, PDO::PARAM_INT);
            $query->execute();
            $joueurs = $query->fetchAll(PDO::FETCH_ASSOC);
            return $joueurs;
        }
    }   
}

?>
