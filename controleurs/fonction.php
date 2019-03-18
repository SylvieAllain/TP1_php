<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php

function determineCarsByModel($model,$isIndex){
  if($isIndex){
    include "modeles/model_cars.php";
  }
  else {
    include "../modeles/model_cars.php";
  }

  $array_cars = [];
  switch ($model){
    case "Granta":
      foreach($array_ladaGranta as $key => $value){
        $array_cars[$key] = $value;
        }
    break;
    case "Largus":
      foreach($array_ladaLargus as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Niva":
      foreach($array_ladaNiva as $key => $value){
        $array_cars[$key] = $value;
        }
    break;
    case "Firebird":
      foreach($array_pontiacFirebird as $key => $value){
        $array_cars[$key] = $value;
        }
    break;
    case "GTO":
      foreach($array_pontiacGTO as $key => $value){
        $array_cars[$key] = $value;
        }
    break;
    case "Sunfire":
      foreach($array_pontiacSunfire as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Korando":
      foreach($array_ssangyongKorando as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Musso":
      foreach($array_ssangyongMusso as $key => $value){
        $array_cars[$key] = $value;
        }
    break;
    case "Rexton":
      foreach($array_ssangyongRexton as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Beetle":
      foreach($array_volkswagenBeetle as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Golf":
      foreach($array_volkswagenGolf as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Jetta":
      foreach($array_volkswagenJetta as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    }
  /*
  default:
    throw new Exception("Bravo! Tu as brisé le site...");
    */
  return $array_cars;
}

function determinateRangeMileageForACar ($array_cars,$array_rangeMilageCategory,$keyToGet,$isIndex){
  $textToReturn = "";
  foreach($array_cars[$keyToGet] as $key => $valueMilage){
    if($key == "mileage"){
      foreach ($array_rangeMilageCategory as $key1 => $value1){
        foreach($array_rangeMilageCategory[$key1] as $valueRange){
          if ($valueMilage >= $array_rangeMilageCategory[8]["minRange"]){
            $textToReturn = $array_rangeMilageCategory[8]["textRange"];
          }
          elseif ($valueMilage >= $array_rangeMilageCategory[$key1]["minRange"] && $valueMilage < $array_rangeMilageCategory[$key1]["maxRange"]){
            $textToReturn = $array_rangeMilageCategory[$key1]["textRange"];
          }
        }
      }
    }
  }
  if(!$isIndex){
    $textToReturn = str_replace(" ", "", $textToReturn);
  }
  return $textToReturn;
}

function createMiniPhoto($imageSrc,$miniSrc,$nameMini){
  $img_source = imagecreatefromjpeg($imageSrc);
  $img_destination = imagecreatetruecolor(250,190);

  $largeur_src = imagesx($img_source);
  $hauteur_src = imagesy($img_source);
  $largeur_destination = 250;
  $hauteur_destination = 190;

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

function isPictureBelongToTable($array_cars,$array_usingKey,$keyToGet,$isIndex,$array_rangeMilageCategory){
  $isThisBelong = false;
  foreach($array_cars as $key => $value){
    if($key == $keyToGet){
      if($array_cars[$key]["color1"] == $array_usingKey["color"] || $array_cars[$key]["color2"] == $array_usingKey["color"] || $array_usingKey["color"] == null){
        if($array_cars[$key]["builtYear"] == $array_usingKey["builtYear"] || $array_usingKey["builtYear"] == null){
          $textToCompare = determinateRangeMileageForACar($array_cars,$array_rangeMilageCategory,$key,$isIndex);
          if($textToCompare == $array_usingKey["mileage"] || $array_usingKey["mileage"] == null){
            $stateToCompare = sendTextWithoutWhiteSpaces($array_cars,$key);
            if($stateToCompare == $array_usingKey["state"] || $array_usingKey["state"] == null){
              $isThisBelong = true;
            }
          }
        }
      }
    }
  }
  return $isThisBelong;
}

function createTable ($array_cars,$keyToGet, $imageSrc,$miniSrc,$nameMini, $needHref){
  echo "<div class=\"row\" id=\"carDisplayRow\">";
  echo "<div class=\" col-3 carPicture\">";
  echo createMiniPhoto($imageSrc,$miniSrc,$nameMini) . "</div>";
  echo "<div class=\"col-3\">" .
        "<p class=\"carDescriptionTitle\">Année de fabrication : </p>" . $array_cars[$keyToGet]["builtYear"]. "<br>".
        "<p class=\"carDescriptionTitle\"> Couleur(s) disponible(s) : </p>" . $array_cars[$keyToGet]["color1"];
  if ($array_cars[$keyToGet]["color2"] != null){
    echo ", " . $array_cars[$keyToGet]["color2"];
  }
  echo  "<p class=\"carDescriptionTitle\"> Kilométrage : </p>" . $array_cars[$keyToGet]["mileage"] . " km" .
        "<p class=\"carDescriptionTitle\"> État du véhicule : </p>" . $array_cars[$keyToGet]["state"] .
        "</div>".
        "<div class=\"col-3\">".
        "<p class=\"carDescriptionTitle\"> Autres informations : </p>" . $array_cars[$keyToGet]["description"] .
        " </div>";
  if($needHref){
  echo "<div class=\"col-3 anchorPicture\">" .
        "(Cliquer pour obtenir les détails) <br>".
          "<a href=\"../controleurs/controller_financing?carKey=" . $keyToGet . "&model=" . $array_cars[$keyToGet]["model"] . "\">" . $array_cars[$keyToGet]["price"] . "</a> </div>";
  echo "</div>";
  }
  else{
    echo "<div class=\"col-3\">" .

            "<p class=\"carDescriptionTitle\"> Prix : </p>". $array_cars[$keyToGet]["price"] . "</div>";
    echo "</div>";
  }
}

?>
