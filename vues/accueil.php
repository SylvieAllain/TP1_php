<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form name="formulaire" action="" method="post">
      <label for="brand"></span>Marque: </label> <?php createSelectCategory($array_brandAndModel, $brand);?>
      <label for="model">Modèle: </label><?php selectedCarModel($array_brandAndModel,$brand,$model)?>
      <br><br>
      <label for="searchBar">Rechercher: </label>
      <input type="text" name="searchBar" value="">

    </form>

  </body>
</html>
