<?php
header("Access-Control-Allow-Origin: *");

// Include necessary controller files
include_once('ctrl/EquipeCtrl.php');
include_once('ctrl/JoueurCtrl.php');

// Validate input and handle requests
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'equipe':
            $equipes = new EquipeCtrl();
            echo $equipes->getEquipesXML();
            break;
        case 'joueur':
            if (isset($_GET['equipeId'])) {
                $joueurs = new JoueurCtrl();
                echo $joueurs->getJoueursXML($_GET['equipeId']);
            } else {
                echo "Missing equipeId parameter";
            }
            break;
        default:
            echo "Invalid action";
            break;
    }
} else {
    echo "Action parameter not specified";
}
?>
