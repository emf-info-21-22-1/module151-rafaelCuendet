<?php
header('Access-Control-Allow-Origin: http://localhost:8081');
header('Access-Control-Allow-Credentials: true');
session_start(); // Initialize session at the beginnisng of the script

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "connect") {
            if ($_POST['password'] == 'emf') {
                $_SESSION['logged'] = 'emf';
                echo '<result>true</result>';
            } else {
                session_destroy();
                echo '<result>false</result>';
            }
        } elseif ($_POST['action'] == "disconnect") {
            session_destroy();
            echo '<result>true</result>';
        }
    } else {
        echo '<result>false</result>';
    } 
}

// Handle GET requests
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "getInfos") {
            if (isset($_SESSION['logged']) && $_SESSION['logged'] == 'emf') {
                echo '<users>';
                echo '<user><name>Victor Legros</name><salaire>9876</salaire></user>';
                echo '<user><name>Marinette Lachance</name><salaire>7540</salaire></user>';
                echo '<user><name>Gustave Latuile</name><salaire>4369</salaire></user>';
                echo '<user><name>Basile Ledisciple</name><salaire>2384</salaire></user>';
                echo '</users>';
            } else {
                echo '<message>DROITS INSUFFISANTS</message>';
            }
        }
    } else {
        echo '<message>Action parameter not specified</message>';
    }
}
?>
