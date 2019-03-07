<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php

$model = null;
$color = null;
$builtYear= null;

if(isset($_GET["model"])){
  $model = $_GET["model"];
}
if(isset($_GET["color"])){
  $color = $_GET["color"];
}
if(isset($_GET["builtYear"])){
  $builtYear = $_GET["builtYear"];
}


include_once "../modeles/model_cars.php";
include_once "fonction.php";
$array_pictures = determineCarsByModel($model);

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
echo $builtYear; echo $color;
function createTable($array_pictures,$color,$builtYear){
  foreach($array_pictures as $key => $value){
    $imageSrc = $array_pictures[$key]["imageSrc"];
    $miniSrc = $array_pictures[$key]["miniSrc"];
    $nameMini = $array_pictures[$key]["nameMini"];
    if($array_pictures[$key]["color1"] == $color || $array_pictures[$key]["color2"] == $color || $color == null){
      if($array_pictures[$key]["builtYear"] == $builtYear || $builtYear == null){
        echo "<div class=\"row\" id=\"carDisplayRow\">";
        echo "<div class=\"col-3\">";
        echo createMiniPhoto($imageSrc,$miniSrc,$nameMini) . "</div>";
        echo "<div class=\"col-4\">" .
              "<p class=\"carDescriptionTitle\">Année de fabrication : </p>" . $array_pictures[$key]["builtYear"]. "<br>".
              "<p class=\"carDescriptionTitle\"> Couleur(s) disponible(s) : </p>" . $array_pictures[$key]["color1"];
        if ($array_pictures[$key]["color2"] != null){
          echo ", " . $array_pictures[$key]["color2"];
        }
        echo "<br>" .
              "<p class=\"carDescriptionTitle\"> Autres informations : </p>" . $array_pictures[$key]["description"] .
              " </div>";
        echo "<div class=\"col-5\">" . "<a href=\"../controleurs/controller_financing?model=" . $array_pictures[$key]["model"] . "&pic=" . $array_pictures[$key]["miniSrc"] . "&price=" . $array_pictures[$key]["price"] . "\">" . $array_pictures[$key]["price"] . "</a> </div>";
        echo "</div>";
      }
    }
  }
}

include_once '../vues/banner.php';
include_once "../vues/selection.php";
include_once '../vues/footer.php';



?>
