<?php

include_once "../modeles/model_cars.php";
include_once "../modeles/model_financing.php";

// TODO: - fiabilité des fonctions de financing
// TODO: - Faire beau et intégrer le CSS
// TODO: - Valider si prix et model corresponde

/*---Fonctions---*/

//Pour le traitement de la page

function determineInterestRate($price, $value) {
  if ($price <= MIN_FOR_BEST_RATE) {
    $interestRate = $value[BEST_RATE_INDEX];
  }
  else {
    $interestRate = $value[HIGHER_RATE_INDEX];
  }
  return $interestRate;
}

function createTermsSelector($priceInDisplay) {
  foreach (FINANCING_RATE_INTEREST as $key => $value) {
      $interestRate = determineInterestRate ($priceInDisplay, $value);
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

function determineInterest($sumToFinance, $interestRate) {
  return $sumToFinance * ($interestRate/100);
}

function determineTotalWithInterest($sumToFinance, $interest) {
  return $sumToFinance + $interest;
}

function determineMonthlyPayment($totalWithInterest) {
  return $totalWithInterest/PERIODICITY;
}

//De validation

function validateDeposit($priceInDisplayWithTaxes, $deposit) {
  if ($deposit > $priceInDisplayWithTaxes) {
    throw new Exception("L'accompte est supérieur au montant du véhicule. Nous comme toutefois ouverts à augmenter le prix de vente si vous vous voulez payer plus.");
  }
  if ($deposit < 0) {
    throw new Exception("Pas question qu'on paye pour vous l'accompte !");
  }
}

//Pour affichage des variables dans un tableau responsive
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

//Fonction principale appelant toutes les autres
function createFinancingResume($priceInDisplay, $deposit) {
  $term = $_POST["termsSelect"];
  $interestRate = determineInterestRate($priceInDisplay,FINANCING_RATE_INTEREST[$term]);

  $taxes = round(determineTaxes($priceInDisplay),2);
  $priceInDisplayWithTaxes = deteriminepriceInDisplayWithTaxes($priceInDisplay, $taxes);
  validateDeposit($priceInDisplayWithTaxes, $deposit);

  $sumToFinance = round(determineSumToFinance($deposit, $priceInDisplayWithTaxes),2);
  $interest = round(determineInterest($sumToFinance, $interestRate),2);
  $totalWithInterest = determineTotalWithInterest($sumToFinance, $interest);
  $monthlyPayment = round(determineMonthlyPayment($totalWithInterest),2);

displayFinancingResume($priceInDisplay, $deposit, $taxes, $priceInDisplayWithTaxes, $sumToFinance, $interest, $totalWithInterest, $monthlyPayment);
}

/*---Affichage---*/

//Variables POST
$priceInDisplay = (float)$_GET["price"];
$submit = (isset($_POST["termsButton"])) ? ($_POST["termsButton"]) : null;
$deposit = (isset($_POST["depositInput"])) ? round(trim($_POST["depositInput"]),2) : (float)0.00;

//Affichages des différentes vues
include_once '../vues/banner.php';
include_once "../vues/financing.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  try{
    createFinancingResume($priceInDisplay, $deposit);
  }
  catch (Exception $e) {
    echo "Message : ",  $e->getMessage(), "\n";
  }
}

include_once '../vues/footer.php';

 ?>
