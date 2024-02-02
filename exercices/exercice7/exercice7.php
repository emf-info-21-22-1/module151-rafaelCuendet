<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=nomDB', 'root', 'pwd');
    
    // Préparation de la requête SQL
    $reponse = $bdd->prepare('SELECT titre FROM jeux_video');
    
    // Exécution de la requête
    $reponse->execute();
    
    // Récupération des résultats sous forme de tableau associatif
    $titresJeuxVideo = $reponse->fetchAll(PDO::FETCH_ASSOC);
    
    // Parcours des résultats et affichage des titres
    foreach ($titresJeuxVideo as $jeu) {
        echo $jeu['titre'] . "<br>";
    }
    
    // Fermeture du curseur
    $reponse->closeCursor();
} catch (PDOException $e) {
    // En cas d'erreur de connexion ou d'exécution de la requête
    echo "Erreur: " . $e->getMessage();
}
?>