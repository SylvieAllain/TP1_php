<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->
<div id="financingDescription">
  <?php $array_cars = determineCarsByModel(ucfirst($model),$isIndex);?>
  <h1>C'est le temps de passer aux choses sérieuses!</h1>
    <h2>Avec nous, soyez assurer que nous ferons tout en notre possible pour vous offrir le prix le plus en notre faveur !</h2>
</div>
  <div class="container containerFinancing">
    <?php createTable ($array_cars,$carKey,$imageSrc,$miniSrc,$nameMini,$needHref)?>
  <form class="" action="" method="post" id="termSelector">
    <div class="row" id=termRow>
      <div class="col-4 termCol">
        <label for="termsSelect">Intérêt: </label>
        <select name="termsSelect" required>
          <?php $termsSelect = (!empty($_POST["termsSelect"]))? $_POST["termsSelect"] : null; ?>
          <?php  createTermsSelector($priceInDisplay,$termsSelect); ?>
        </select>
      </div>
      <div class="col-5 termCol">
        <label for="$depositInput">Acompte (facultatif): $</label>
        <input type="number" name="depositInput" value="<?php echo $deposit; ?>" step="0.01">
      </div>
      <div class="col-1 termCol">
        <input type="submit" class="btn btn-success" name="termsButton" value="Calculer"></input>
      </div>
    </div>
  </div>
</form>
