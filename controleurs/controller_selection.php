
<?php

$model = "patate";

if(isset($_GET["model"])){
  $model = $_GET["model"];
}


include_once "../modeles/model_cars.php";
$array_pictures = [];

switch ($model){
  case "Granta":
    foreach($array_ladaGranta as $key => $value){
      $array_pictures[$key] = $value;
      }
  break;
  case "Largus":
    foreach($array_ladaLargus as $key => $value){
      $array_pictures[$key] = $value;
      }
    break;
  case "Niva":
    foreach($array_ladaNiva as $key => $value){
      $array_pictures[$key] = $value;
      }
  break;
  case "Firebird":
    foreach($array_pontiacFirebird as $key => $value){
      $array_pictures[$key] = $value;
      }
  break;
  case "GTO":
    foreach($array_pontiacGTO as $key => $value){
      $array_pictures[$key] = $value;
      }
  break;
  case "Sunfire":
    foreach($array_pontiacSunfire as $key => $value){
      $array_pictures[$key] = $value;
      }
    break;
  case "Korando":
    foreach($array_ssangyongKorando as $key => $value){
      $array_pictures[$key] = $value;
      }
    break;
  case "Musso":
    foreach($array_ssangyongMusso as $key => $value){
      $array_pictures[$key] = $value;
      }
  break;
  case "Rexton":
    foreach($array_ssangyongRexton as $key => $value){
      $array_pictures[$key] = $value;
      }
    break;
  case "Beetle":
    foreach($array_volkswagenBeetle as $key => $value){
      $array_pictures[$key] = $value;
      }
    break;
  case "Golf":
    foreach($array_volkswagenGolf as $key => $value){
      $array_pictures[$key] = $value;
      }
    break;
  case "Jetta":
    foreach($array_volkswagenJetta as $key => $value){
      $array_pictures[$key] = $value;
      }
    break;
}

function createMiniPhoto($imageSrc,$miniSrc,$nameMini){
  $img_source = imagecreatefromjpeg($imageSrc);
  $img_destination = imagecreatetruecolor(180,120);

  $largeur_src = imagesx($img_source);
  $hauteur_src = imagesy($img_source);
  $largeur_destination = 180;
  $hauteur_destination = 120;

  //créer la miniature
  imagecopyresampled($img_destination,$img_source,0,0,0,0,$largeur_destination,$hauteur_destination,$largeur_src,$hauteur_src);

  //enregistrement
  imagejpeg($img_destination,$miniSrc);
  echo "<div>";
  echo "<div ><a href=\"$imageSrc\"> <img class=\"picture\" src=\"$miniSrc\" name=\"$nameMini\" /></a></div>";
  echo "</div>";
  imagedestroy($img_source);
  imagedestroy($img_destination);
}

function createTable($array_pictures){
  foreach($array_pictures as $key => $value){
    echo "<div class=\"row\" id=\"carDisplayRow\">";
    $imageSrc = $array_pictures[$key]["imageSrc"];
    $miniSrc = $array_pictures[$key]["miniSrc"];
    $nameMini = $array_pictures[$key]["nameMini"];
    echo "<div class=\"col-2\">";
    echo createMiniPhoto($imageSrc,$miniSrc,$nameMini) . "</div>";
    echo "<div class=\"col-5\">" . $array_pictures[$key]["description"]. " </div>";
    echo "<div class=\"col-5\">" . "<a href=\"../controleurs/controller_financing?model=" . $array_pictures[$key]["model"] . "&pic=" . $array_pictures[$key]["miniSrc"] . "\"" . ">" . $array_pictures[$key]["price"]. "</a> </div>";
    echo "</div>";
  }
}

include_once '../vues/banner.php';
include_once "../vues/selection.php";




?>
