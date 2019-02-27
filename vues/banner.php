<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if(empty($_GET["car"])) {
        echo "<img src=\"images/banner.jpg\" alt=\"Bel auto citron.\">";
      }
      else {
        echo "<img src=\"../images/banner.jpg\" alt=\"Bel auto citron.\">";
      }
     ?>
    <h1>Voiture @Variée</h1>
      <h2>La plus grande sélection de citrons provenant de tous les continents, sauf l'Afrique...</h2>
  </body>
</html>

<?php
 ?>
