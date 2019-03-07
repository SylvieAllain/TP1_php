<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style media="screen">
      body {
            padding: 1em;
            margin-left: 1em;
            background-color: #384F34;
            font-size: 30em;
          }
      h1 {
            font-size: 4em;
      }
    </style>
  </head>
  <body>
    <div class="row" id="carDisplayRowFinancing">
      <div class="col-2">
        <?php
          if(empty($_GET["model"])) {
            echo "<img src=\"images/banner.png\" alt=\"Belle auto citron.\">";
          }
          else {
            echo "<img src=\"../images/banner.png\" alt=\"Belle auto citron.\">";
          }
         ?>
      </div>
      <div class="col">
        <h1>Voiture @Variée</h1>
      </div>
    </div>
      <h2>La plus grande sélection de citrons provenant de tous les continents, sauf de l'Afrique...</h2>
  </body>
</html>
