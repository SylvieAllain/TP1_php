<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/accueil.css">
    <title></title>
  </head>
  <body>

    <?php
    $rand_pictures = array_rand($array_randomPictures,3);
    ?>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src=<?php echo $array_randomPictures[$rand_pictures[0]];?> alt="firstSlide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src=<?php echo $array_randomPictures[$rand_pictures[1]];?> alt="secondSlide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src=<?php echo $array_randomPictures[$rand_pictures[2]];?> alt="thirdSlide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="container">
    <form name="formulaire" action="" method="post">
      <div class="row">
        <div class="col-3 offset-3">
        <label for="brand">Marque: </label> <?php createSelectCategory($array_brandAndModel, $brand);?>
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
          //include_once "vues/selection.php"; Pas nécessaire de je crois CP
          header("location:controleurs/controller_selection.php?model=$model");

        }
        catch(Exception $e){
          echo "Erreur : " . $e->getMessage();
        }
      }
      ?>

    </form>
  </div>
  <?php include_once 'footer.php'; ?>
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
