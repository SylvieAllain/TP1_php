<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <title></title>
  </head>
  <body>
    <form name="formulaire" action="" method="post">
      <label for="brand"></span>Marque: </label> <?php createSelectCategory($array_brandAndModel, $brand);?>
      <label for="model">Modèle: </label><?php selectedCarModel($array_brandAndModel,$brand,$model)?>
      <br><br>
      <label for="searchBar">Rechercher: </label>
      <input type="text" name="searchBar" value="">

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

  </body>
</html>
