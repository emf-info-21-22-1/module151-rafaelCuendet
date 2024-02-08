<?php
header("Access-Control-Allow-Origin: *");

require('ctrl.php');

$controller = new ctrl();

if ($_GET['action'] == "equipe") {
    echo $controller->getEquipes();
} elseif ($_GET['action'] == "joueur") {
    if (isset($_GET['equipeId']) && is_numeric($_GET['equipeId'])) {
        $teamID = $_GET['equipeId'];
        echo $controller->getJoueurs($teamID);
    }
}
?>
