<!doctype html>
<html>
  <header>
    <link rel="stylesheet" type="text/css" href="stylesheets/main.css" />
</header>
  <body>
    <div id="conteneur">
      <h1>Les équipes de National League</h1>    
      <table border= "1">
      <tr>
        <td>ID</td>
        <td>Club</td>
      </tr>
      <?php
        require('ctrl.php');

        $equipes = getEquipes();
        $length = count($equipes);
        
        for ($i = 0; $i < $length; $i++) {
          $numLigne = $i + 1;
          echo "<tr>";
          echo "<td>".$numLigne."</td>";
          echo "<td>".$equipes[$i]."</td>";
          echo "</tr>";
          
      }

        
      ?>
      </table>
    </div>
  </body>
</html>