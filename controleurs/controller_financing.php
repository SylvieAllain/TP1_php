<?php

// TODO: - fiabilité des fonctions de financing
// TODO: - réparer le menu déroulant (tjs le plus petit)
// TODO: - choisir quoi faire avec footer
// TODO: - Faire beau et intégrer le CSS

include_once "../modeles/model_cars.php";
include_once "../modeles/model_financing.php";
include_once '../vues/banner.php';
include_once "../vues/financing.php";

/*---Fonctions---*/

//Pour le traitement de la page

function determineInterestRate($price, $value) {
  if ($price >= MIN_FOR_BEST_RATE) {
    $interestRate = $value[BEST_RATE_INDEX];
  }
  else {
    $interestRate = $value[HIGHER_RATE_INDEX];
  }
  return $interestRate;
}

function createTermsSelector($priceInDisplay) {
  foreach (FINANCING_RATE_INTEREST as $key => $value) {
      $interestRate = determineInterestRate ($price, $value);
      if ($key == DEFAULT_MONTHLY_RATE_ONLOAD) {
        echo "<option value=\"$key\" selected>" . $key . " mois - " . $interestRate . "%</option>";
      }
      else {
        echo "<option value=\"$key\">" . $key . " mois - " . $interestRate . "%</option>";
      }
    }
}

//Pour calculer du financement

function determineTerms(){
  $terms_array = $_POST["termsSelect"];
}

function determineTaxes($priceInDisplay) {
  return $priceInDisplay * (FED_TAXE/100) + $priceInDisplay * (PROV_TAXE/100);
}

function deteriminePriceInDisplayWithTaxes($priceInDisplayWithTaxes, $taxes) {
  return $priceInDisplayWithTaxes + $taxes;
}

function determineSumToFinance($deposit, $priceInDisplayWithTaxes) {
  return $priceInDisplayWithTaxes - $deposit;
}

function determineMonthlyPayment($sumToFinance, $interestRate, $term) {
  return ($sumToFinance / $term) * $interestRate;
}

function determineTotalWithInterest($monthlyPayment, $term) {
  return $monthlyPayment * $term;
}

function determineInterest($sumToFinance, $totalWithInterest) {
  return $totalWithInterest - $sumToFinance;
}

//Pour affichage
function displayFinancingResume($priceInDisplay, $deposit, $taxes, $priceInDisplayWithTaxes, $sumToFinance, $interest, $totalWithInterest, $monthlyPayment) {
  echo "
  <div id=\"resumeFinancing\">
    <div class=\"row\">
      <div class=\"col\">
        <strong>Détails</strong>
      </div>
      <div class=\"col\">
        <strong>Montant</strong>
      </div>
    </div>
    <div class=\"row\">
      <div class=\"col\">
        <p>Prix de vente affiché: </p>
      </div>
      <div class=\"col\">
        <p>$priceInDisplay</p>
      </div>
    </div>
    <div class=\"row\">
      <div class=\"col\">
        <p>Acompte: </p>
      </div>
      <div class=\"col\">
        <p>$deposit</p>
      </div>
    </div>
    <div class=\"row\">
      <div class=\"col\">
        <p>Taxes: </p>
      </div>
      <div class=\"col\">
        <p>$taxes</p>
      </div>
    </div>
    <div class=\"row\">
      <div class=\"col\">
        <p>Prix total: </p>
      </div>
      <div class=\"col\">
        <p>$priceInDisplayWithTaxes</p>
      </div>
    </div>
    <div class=\"row\">
      <div class=\"col\">
        <p>Montant à financer: </p>
      </div>
      <div class=\"col\">
        <p>$sumToFinance</p>
      </div>
  </div>
  <div class=\"row\">
    <div class=\"col\">
      <p>Intérêts: </p>
    </div>
    <div class=\"col\">
      <p>$interest</p>
    </div>
  </div>
  <div class=\"row\">
    <div class=\"col\">
      <p>Montant avec intérêts: </p>
    </div>
    <div class=\"col\">
      <p>$totalWithInterest</p>
    </div>
  </div>
  <div class=\"row\">
    <div class=\"col\">
      <p>Paiement mensuel: </p>
    </div>
    <div class=\"col\">
      <p>$monthlyPayment</p>
    </div>
  </div>
</div>


  ";
}



//Variables POST
$priceInDisplay = (float)$_GET["price"];
$submit = (isset($_POST["termsButton"])) ? ($_POST["termsButton"]) : null;

//Variables globale pour traitement des fonctions
function createFinancingResume($priceInDisplay, $deposit) {
  $term = $_POST["termsSelect"];
  $interestRate = determineInterestRate($priceInDisplay,FINANCING_RATE_INTEREST[$term]);

  $taxes = round(determineTaxes($priceInDisplay),2);
  $priceInDisplayWithTaxes = deteriminepriceInDisplayWithTaxes($priceInDisplay, $taxes);

  $sumToFinance = determineSumToFinance($deposit, $priceInDisplayWithTaxes);
  $monthlyPayment = round(determineMonthlyPayment($sumToFinance, $interestRate, $term),2);
  $totalWithInterest = determineTotalWithInterest($monthlyPayment, $term);
  $interest = determineInterest($sumToFinance, $totalWithInterest);

displayFinancingResume($priceInDisplay, $deposit, $taxes, $priceInDisplayWithTaxes, $sumToFinance, $interest, $totalWithInterest, $monthlyPayment);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  createFinancingResume($priceInDisplay, $deposit);
}

include_once '../vues/footer.php';

 ?>
