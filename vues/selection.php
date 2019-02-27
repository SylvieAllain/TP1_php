<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/selection.css">
    <title></title>
  </head>
  <body>
    <h1 class="chat">Nos voitures</h1>
      <h2>Faites votre choix</h2>
        <h3>Nos modèles sont exempts de toutes garanties et viennent avec les meilleurs lots de problèmes de toute l'industrie !</h3>
        <div class="container">
          <div class="row">
            <div class="col-2">
              <h4> Photos </h4>
            </div>
            <div class="col-5">
              <h4> Description <h4>
            </div>
            <div class="col-5">
              <h4> Prix (cliquer pour obtenir des détails) <h4>
            </div>
          </div>
        <?php
        if(isset($_GET["model"])){
        createTable($array_pictures);
      }
        ?>
      </div>

    <footer>Aucuns retours ou garanties possibles après achat</footer>
  </body>
</html>

<?php



 ?>
