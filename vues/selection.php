<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

    <div id="almostBody">
    <h1 id="firstTitle">Nos voitures</h1>
      <h2 id="secondTitle">Faites votre choix</h2>
        <h3 id="thirdTitle">Nos modèles sont exempts de toutes garanties et viennent avec les meilleurs lots de problèmes de toute l'industrie !</h3>
        <div class="container">
          <div class="row">
            <div class="col-3">
              <h4 class="columnTitles"> Photos </h4>
            </div>
            <div class="col-6">
              <h4 class="columnTitles"> Description <h4>
            </div>
            <div class="col-3">
              <h4 class="columnTitles"> Prix <h4>
            </div>
          </div>
        <?php
        if(isset($_GET["model"]) && isset($_GET["color"]) && isset($_GET["builtYear"]) && isset($_GET["mileage"]) && isset($_GET["state"])){
        createTable($array_pictures,$color,$builtYear,$mileage,$state,$isIndex);
      }
        ?>
      </div>
    </div>

<?php



 ?>
