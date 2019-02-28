<?php

include_once "../modeles/model_cars.php";
include_once "../modeles/model_financing.php";
include_once '../vues/banner.php';

/*---Fonctions---*/

//Pour le traitement de la page

function createTermsSelector() {
  foreach (FINANCING_RATE_INTEREST as $key => $value) {
    echo "<option value=\"$key\">$key</option>";
  }

}

//Pour calculer du financement

function determineTaxes($priceInDisplay) {
  return $priceInDisplay * (FED_TAXE/100) + $priceInDisplay * (PROV_TAXE/100);
}

function deteriminePriceInDisplayWithTaxes($priceInDisplayWithTaxes, $taxes) {
  return $priceInDisplayWithTaxes + $taxes;
}

function determineSumToFinance($deposit, $priceInDisplayWithTaxes, $term, $interestRate) {
  return $priceInDisplayWithTaxes - $deposit;
}

function determineTotalWithInterest($sumToFinance, $term, $interestRate) {
  return $sumToFinance * (1+$interestRate/PERIODICITY/100) ** ($term * PERIODICITY);
}

function determineInterest($sumToFinance, $totalWithInterest) {
  return $totalWithInterest - $sumToFinance;
}

//Variables POST
$model = $_GET["model"];
$priceInDisplay = (float)$_GET["price"];
$term = (isset($_POST["termsSelect"])) ? ($_POST["termsSelect"]) : null;
$deposit = (isset($_POST["depositInput"])) ? ($_POST["depositInput"]) : 0;
$submit = (isset($_POST["termsButton"])) ? ($_POST["termsButton"]) : null;
$interestRate = 0;

//Variables globale pour traitement des fonctions
function createFinancingResume() {

  $taxes = determineTaxes($priceInDisplay);
  $priceInDisplayWithTaxes = deteriminepriceInDisplayWithTaxes($priceInDisplay, $taxes);

  $sumToFinance = determineSumToFinance($priceInDisplayWithTaxes, $taxes);
  $totalWithInterest = determineTotalWithInterest($sumToFinance, $term, $interestRate);
  $interest = determineInterest($sumToFinance, $totalWithInterest);
}
echo "QQchose";

if(!empty($_POST["termsButton"])) {

  echo "Ça fonctionne!";
  //createFinancingResume();
}

include_once "../vues/financing.php";

 ?>
