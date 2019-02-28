<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if(empty($_GET["model"])) {
        echo "<img src=\"images/banner.jpg\" alt=\"Belle auto citron.\">";
      }
      else {
        echo "<img src=\"../images/banner.jpg\" alt=\"Belle auto citron.\">";
      }
     ?>
    <h1>Voiture @Variée</h1>
      <h2>La plus grande sélection de citrons provenant de tous les continents, sauf de l'Afrique...</h2>
  </body>
</html>

<?php
 ?>
