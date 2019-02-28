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
    <img src="<?php echo $_GET['pic']; ?>" alt="automobile">
    <p>C'est le temps de passer aux choses sérieuses!</p>
    <p>Avec nous, soyez assurer que nous ferons tout en notre possible pour vous offrir le prix le plus en notre faveur !</p>
    <form class="" action="" method="post">
      <label for="termsSelect">Durée: </label>
      <select name="termsSelect" required>
        <?php  createTermsSelector(); ?>
      </select>
      <label for="$depositInput">Accompte (facultatif): </label>
      <input type="number" name="depositInput" value="">
      <input type="submit" name="termsButton" value="envoyer">Valider</input>
    </form>

    <footer>
      <p class="footerFont"><span class="underline">Aucuns retours ou garanties possibles après achat</span> <br>
        Copyright © Sylvie Allain et Cyrice Paradis <br>
        2019
      </p>
    </footer>
  </body>
</html>
