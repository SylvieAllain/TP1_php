<?php $deposit = (isset($_POST["depositInput"])) ? ($_POST["depositInput"]) : (float)0.00; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/financing.css">
    <title></title>
  </head>
  <body>
    <h1>C'est le temps de passer aux choses sérieuses!</h1>
      <h2>Avec nous, soyez assurer que nous ferons tout en notre possible pour vous offrir le prix le plus en notre faveur !</h2>
      <div class="row" id="carDisplayRowFinancing">
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
          <?php  createTermsSelector($priceInDisplay); ?>
        </select>
        <label for="$depositInput">Accompte (facultatif): $</label>
        <input type="number" name="depositInput" value="<?php echo $deposit; ?>" step="any">
        <input type="submit" name="termsButton" value="Calculer"></input>
      </form>
<!--
    <footer>
      <p class="footerFont"><span class="underline">Aucuns retours ou garanties possibles après achat</span> <br>
        Copyright © Sylvie Allain et Cyrice Paradis <br>
        2019
      </p>
    </footer>
  -->
  </body>
</html>
