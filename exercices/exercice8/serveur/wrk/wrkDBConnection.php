<?php
header("Access-Control-Allow-Origin: *");
require('wrkDBconfig.php');

class wrkDBConnection
{
    private $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO(DB_TYPE . ':host='. DB_HOST .';dbname=' . DB_NAME, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            // In case of connection error during PDO initialization, 
            // throw an exception for centralized error handling.
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    //This method dbConnectionTest() checks if the PDO database connection $this->pdo is valid. 
    //It returns true if the connection is established, otherwise false.
    public function dbConnectionTest(){
        return ($this->pdo instanceof PDO);
    }

    public function getEquipesFromDB(){
        if($this->dbConnectionTest()){
            $query = $this->pdo->prepare('SELECT * FROM t_equipe');
            $query->execute();
            $equipes = $query->fetchAll(PDO::FETCH_ASSOC);
            return $equipes;
        }
    }

    public function getJoueursFromDB($teamID){
        if(($this->dbConnectionTest()) && ($teamID != null)){
            $query = $this->pdo->prepare("SELECT * FROM t_joueur WHERE FK_equipe = :teamID");
            $query->bindParam(':teamID', $teamID, PDO::PARAM_INT);
            $query->execute();
            $joueurs = $query->fetchAll(PDO::FETCH_ASSOC);
            return $joueurs;
        }
    }
}

?>
