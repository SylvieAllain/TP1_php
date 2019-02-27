<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/accueil.css">
    <title></title>
  </head>
  <body>
    <img src=""
    <div class="container">
    <form name="formulaire" action="" method="post">
      <div class="row">
        <div class="col-3 offset-3">
        <label for="brand"></span>Marque: </label> <?php createSelectCategory($array_brandAndModel, $brand);?>
      </div>
      <div class="col-6 ">
        <label for="model">Modèle: </label><?php selectedCarModel($array_brandAndModel,$brand,$model)?>
      </div>
    </div>
      <br><br>
      <div class="row">
        <div class="col-8 offset-4">
      <label for="searchBar">Rechercher: </label>
      <input type="text" name="searchBar" value="">
        </div>
      </div>

      <?php
      if(!empty($submit_brand)){
        try{
          validate_cat_car($brand);
        }
        catch(Exception $e){
          echo "Erreur : " . $e->getMessage();
        }
      }

      if(!empty($submit)){
        try{
          validate_car($model);
          include_once "vues/selection.php";
          header("location:controleurs/controller_selection.php?model=$model");

        }
        catch(Exception $e){
          echo "Erreur : " . $e->getMessage();
        }
      }
      ?>

    </form>
  </div>
    <footer>
      <p class="footerFont"><span class="underline">Aucuns retours ou garanties possibles après achat</span> <br>
          Copyright © Sylvie Allain et Cyrice Paradis <br>
          2019
      </p>
    </footer>
  </body>
</html>
