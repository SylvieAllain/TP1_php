<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

    <h1>C'est le temps de passer aux choses sérieuses!</h1>
      <h2>Avec nous, soyez assurer que nous ferons tout en notre possible pour vous offrir le prix le plus en notre faveur !</h2>
      <div class="row">
        <div class="col-2 offset-1">
          <img src="<?php echo $_GET['pic']; ?>" alt="automobile">
        </div>
        <div class="col-4">
          <?php echo strtoupper($_GET['model']); ?>
        </div>
        <div class="col-1">
          <?php echo $_GET['price']; ?>
        </div>
      </div>
      <form class="" action="" method="post">
        <label for="termsSelect">Intérêt: </label>
        <select name="termsSelect" required>
          <?php $termsSelect = (!empty($_POST["termsSelect"]))? $_POST["termsSelect"] : null; ?>
          <?php  createTermsSelector($priceInDisplay,$termsSelect); ?>
        </select>
        <label for="$depositInput">Acompte (facultatif): $</label>
        <input type="number" name="depositInput" value="<?php echo $deposit; ?>" step="0.01">
        <input type="submit" name="termsButton" value="Calculer"></input>
      </form>
