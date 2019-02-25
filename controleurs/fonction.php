<?php
//Il s'agit des fonctions qui prennent se trouvent dans l'index.
$cat_aliment = (!empty($_POST['catAliment'])) ? ($_POST['catAliment']) : null;
$submit_cat = (!empty($_POST['submit_cat'])) ? ($_POST['submit_cat']) : null;
$aliment = (!empty($_POST['aliment'])) ? ($_POST['aliment']) : null;
$submit = (!empty($_POST['submit'])) ? ($_POST['submit']) : null;

  function createMenu($array_aliments, $cat_aliment){
    echo '<select name='.'"'.'catAliment'.'"'.'>';
    foreach($array_aliments as $key=>$value){
      if ($cat_aliment == $key){
        echo "<option selected value="."\""."$key"."\"".">" . "$key" . "</option>";
      }
      else{
        echo "<option value="."\""."$key"."\"".">" . "$key" . "</option>";
      }
    }
    echo "</select>";
    echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit_cat" . "\"". "value=" . "\"" . "envoyer". "\"". ">";
  }
  $arrayLength = count($array_aliments[$cat_aliment]);

  function selectedFood($array_aliments,$cat_aliment,$aliment){
    echo '<select name='.'"'.'aliment'.'"'.'>';
    foreach($array_aliments[$cat_aliment] as $key=> $value){
      if($array_aliments[$cat_aliment][$key] == $aliment){
        echo "<option selected value="."\""."$value"."\"".">" . "$value" . "</option>";
      }
      else{
        echo "<option value="."\""."$value"."\"".">" . "$value" . "</option>";
      }
    }
    echo "</select>";
    echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit" . "\"". "value=" . "\"" . "envoyer". "\"". ">";
  }

  function validate_cat_aliment($cat_aliment){
    if(empty($cat_aliment)){
      throw new Exception ("Vous devez sélectionner une catégorie d'aliment");
    }
  }

  function validate_aliment($aliment){
    if(empty($aliment)){
      throw new Exception ("Vous devez sélectionner un aliment");
    }
  }

  //createMenu($array_aliments,$cat_aliment);

  include_once 'vues/accueil.php';

  if(!empty($submit_cat)){
    try{
      validate_cat_aliment($cat_aliment);
    }
    catch(Exception $e){
      echo "Erreur : " . $e->getMessage();
    }
  }

  if(!empty($submit)){
    try{
      validate_aliment($aliment);
      //include_once "vues/manger.php";
      header("location:vues/manger.php?aliment=$aliment");

    }
    catch(Exception $e){
      echo "Erreur : " . $e->getMessage();
    }
  }
//Il s'agit des fonctions se retrouvant dans le contrôleur de selection.php
$array_temp = $array_aubergine;
print_r ($array_temp);
//global $aliment,$array_aubergine;
$arrayToGet = [
  "photo1" => ["source" => null, "description" => null, "prix" => null, "hrefMini" => null, "nameMini" => null],
  "photo2" => ["source" => null, "description" => null, "prix" => null, "hrefMini" => null, "nameMini" => null],
  "photo3" => ["source" => null, "description" => null, "prix" => null, "hrefMini" => null, "nameMini" => null]
];

function getFood($aliment,$arrayToGet,$array_temp){
  //global $aliment,$arrayToGet,$array_aubergine;
   switch ($aliment){
     case "aubergine":
      foreach($array_aubergine as $key1 => $value1){
        $arrayToGet[$key1] = $value1;
      }
      break;
   }
}

function createMiniPhoto($image,$hrefMini,$nameMini){
  $img_source = imagecreatefromjpeg($image);
  $img_destination = imagecreatetruecolor(120,120);

  $largeur_src = imagesx($img_source);
  $hauteur_src = imagesy($img_source);
  $largeur_destination = 120;
  $hauteur_destination = 120;

  //créer la miniature
  imagecopyresampled($img_destination,$img_source,0,0,0,0,$largeur_destination,$hauteur_destination,$largeur_src,$hauteur_src);

  //enregistrement
  imagejpeg($img_destination,$hrefMini);
  echo "<div>";
  echo "<div ><a href=\"$image\"> <img class=\"picture\" src=\"$hrefMini\" name=\"$nameMini\" /></a></div>";
  echo "J'aime les patates";
  echo "</div>";
  imagedestroy($img_source);
  imagedestroy($img_destination);
}

function createTable(){
  global $aliment,$arrayToGet;
  getFood($aliment,$arrayToGet,$array_temp);
  foreach($arrayToGet as $key => $value){
    echo "<div class=\"main\">";
    $image = $arrayToGet[$key]["source"];
    $hrefMini = $arrayToGet[$key]["hrefMini"];
    $nameMini = $arrayToGet[$key]["nameMini"];
    // echo $hrefMini. " " . $nameMini . " <br>";
    echo "<div>". createMiniPhoto($image,$hrefMini,$nameMini). "</div>";
    echo "<span class=\"description\">" . $arrayToGet[$key]["description"]. " ";
    echo $arrayToGet[$key]["prix"]. "</span>";
    echo "</div>";
  }
}
?>
