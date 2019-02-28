<?php
include_once "../modeles/model_cars.php";
include_once "../modeles/model_financing.php";
include_once '../vues/banner.php';
include_once "../vues/financing.php";

/*---Fonctions---*/

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


//Variables globale pour traitement des fonctions
$taxes = determineTaxes($priceInDisplay);
$priceInDisplayWithTaxes = deteriminepriceInDisplayWithTaxes($priceInDisplayWithTaxes, $taxes);
$sumToFinance = determineSumToFinance($priceInDisplayWithTaxes, $taxes);
$totalWithInterest = determineTotalWithInterest($sumToFinance, $term, $interestRate);
$interest = determineInterest($sumToFinance, $totalWithInterest);

//Variables POST
$deposit = 0;
$priceInDisplayWithoutTaxes = 0;
$term = 0;
$interestRate = 0;

 ?>
