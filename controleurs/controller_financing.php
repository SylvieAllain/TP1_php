<?php

include_once "../modeles/model_cars.php";
include_once "../modeles/model_financing.php";
include_once '../vues/banner.php';
include_once "../vues/financing.php";

/*---Fonctions---*/

//Pour le traitement de la page

function createTermsSelector() {
  print_r(FINANCING_RATE_INTEREST);
  foreach (FINANCING_RATE_INTEREST as $key) {
    echo $key;
  }
  /*
  foreach (FINANCING_RATE_INTEREST as $key) {
    echo "<option value=\"" . $key . ">" . $key . "</option>";
  }
  */
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
$deposit = 0;
$priceInDisplay = (float)$_GET["price"];
$term = 0;
$interestRate = 0;

//Variables globale pour traitement des fonctions
$taxes = determineTaxes($priceInDisplay);
$priceInDisplayWithTaxes = deteriminepriceInDisplayWithTaxes($priceInDisplay, $taxes);
$sumToFinance = determineSumToFinance($priceInDisplayWithTaxes, $taxes);
$totalWithInterest = determineTotalWithInterest($sumToFinance, $term, $interestRate);
$interest = determineInterest($sumToFinance, $totalWithInterest);


 ?>
