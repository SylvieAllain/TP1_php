<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php

include_once "../modeles/model_cars.php";
include_once "../modeles/model_financing.php";
include "fonction.php";

/*---Fonctions---*/

//Pour le traitement de la page

function determineInterestRate($price, $term) {
  if ($price <= MIN_FOR_BEST_RATE) {
    $interestRate =  FINANCING_RATE_INTEREST[$term][BEST_RATE_INDEX];
  }
  else {
    $interestRate =  FINANCING_RATE_INTEREST[$term][HIGHER_RATE_INDEX];
  }
  return $interestRate;
}

function createTermsSelector($priceInDisplay,$termsSelect){
  foreach (FINANCING_RATE_INTEREST as $key => $value) {
    $interestRate = determineInterestRate ($priceInDisplay, $key);
    if($termsSelect == null){
      if ($key == DEFAULT_MONTHLY_RATE_ONLOAD) {
        echo "<option value=\"$key\" selected>" . $key . " mois - " . $interestRate . "%</option>";
      }
      else {
        echo "<option value=\"$key\">" . $key . " mois - " . $interestRate . "%</option>";
      }
    }
    else {
      if($termsSelect == $key){
        echo "<option value=\"$key\" selected>" . $key . " mois - " . $interestRate . "%</option>";
      }
      else{
        echo "<option value=\"$key\">" . $key . " mois - " . $interestRate . "%</option>";
      }
    }
  }
}


//Pour envoyer un courriel contenant le résumé du financment
function sendEmail($to, $model) {
	$subject = "Votre soumission automobile!";

	$message = "
	<html>
		<head>
			<title>HTML email</title>
		</head>
		<body>
			<h1>Voiture @Variée : la plus grande sélection de citron !</h1>
				<h2>Votre soummission automobile</h2>
					<h3>Ne réflechissez pas trop longtemps, nous avons le véhicule qu'il vous faut au prix qu'il nous faut. Ne cherchez pas plus longtemps.</h3>
            <table>
							<th><img src=\"\" alt=\"Votre voiture\"></th>
							<th>$model</th>
						</table>
						<h4>Voici le le récapitulatif</h4>
						<table>
							<tr>
								<th>Détail</th>
								<th>Description</th>
							</tr>
							<tr>
								<td>John</td>
								<td>Doe</td>
							</tr>
							<tr>
								<td>John</td>
								<td>Doe</td>
							</tr>
							<tr>
								<td>John</td>
								<td>Doe</td>
							</tr>
							<tr>
								<td>John</td>
								<td>Doe</td>
							</tr>
							<tr>
								<td>John</td>
								<td>Doe</td>
							</tr>
							<tr>
								<td>John</td>
								<td>Doe</td>
							</tr>
							<tr>
								<td>John</td>
								<td>Doe</td>
							</tr>
						</table>
		</body>
	</html>
	";
/*
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <voitureavariee@citron.com>' . "\r\n";
*/
	if(!mail($to,$subject,$message)) {
    echo "Shits failed";
  };
}


//Pour calculer du financement

function determineTerms(){
  $terms_array = $_POST["termsSelect"];
}

function determineTaxes($priceInDisplay) {
  return $priceInDisplay * (FED_TAXE/100) + $priceInDisplay * (PROV_TAXE/100);
}

function determinePriceInDisplayWithTaxes($priceInDisplayWithTaxes, $taxes) {
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

function determineMonthlyPayment($totalWithInterest, $periodicity) {
  return $totalWithInterest/$periodicity;
}

//De validation

function validateDeposit($priceInDisplayWithTaxes, $deposit) {
  if (is_Numeric($deposit)){
    if ($deposit > $priceInDisplayWithTaxes) {
      throw new Exception("L'acompte est supérieur au montant du véhicule. Nous sommes toutefois ouverts à augmenter le prix de vente si vous vous voulez payer plus.");
    }
    if ($deposit < 0) {
      throw new Exception("Pas question qu'on paye pour vous l'accompte !");
    }
  }
  else {
    throw new Exception("Un acompte se compte en chiffre pas en lettre !");
    }
}

function validatePrice($price, $model){
  if (!is_Numeric($price)){
    throw new Exception ("Bravo! Tu as mis des lettres dans l'URL du prix");
  }

  $carsInModel = determineCarsByModel(ucfirst($model));
  $priceCheck = false;
  foreach ($carsInModel as $value => $key) {
    if ($price == $key["price"]) {
      $priceCheck = true;
    }
  }
  if (!$priceCheck){
    throw new Exception ("Tu te prends pour un hacker en modifiant les informations dans l'URL. Fais un retour.");
  }
}

//Pour affichage des variables dans un tableau responsive
function displayFinancingResume($priceInDisplay, $deposit, $taxes, $priceInDisplayWithTaxes, $sumToFinance, $interest, $totalWithInterest, $monthlyPayment) {
  echo "
  <div id=\"resumeFinancing\">
    <div class=\"row align-items-start\">
      <div class=\"col\">
        <strong>Détails</strong>
      </div>
      <div class=\"col\">
        <strong>Montant</strong>
      </div>
    </div>
    <div class=\"row align-items-start\">
      <div class=\"col\">
        <p>Prix de vente affiché: </p>
      </div>
      <div class=\"col\">
        <p>$priceInDisplay</p>
      </div>
    </div>
    <div class=\"row align-items-start\">
      <div class=\"col\">
        <p>Acompte: </p>
      </div>
      <div class=\"col\">
        <p>$deposit</p>
      </div>
    </div>
    <div class=\"row align-items-start\">
      <div class=\"col\">
        <p>Taxes: </p>
      </div>
      <div class=\"col\">
        <p>$taxes</p>
      </div>
    </div>
    <div class=\"row align-items-start\">
      <div class=\"col\">
        <p>Prix total: </p>
      </div>
      <div class=\"col\">
        <p>$priceInDisplayWithTaxes</p>
      </div>
    </div>
    <div class=\"row align-items-start\">
      <div class=\"col\">
        <p>Montant à financer: </p>
      </div>
      <div class=\"col\">
        <p>$sumToFinance</p>
      </div>
  </div>
  <div class=\"row align-items-start\">
    <div class=\"col\">
      <p>Intérêts: </p>
    </div>
    <div class=\"col\">
      <p>$interest</p>
    </div>
  </div>
  <div class=\"row align-items-start\">
    <div class=\"col\">
      <p>Montant avec intérêts: </p>
    </div>
    <div class=\"col\">
      <p>$totalWithInterest</p>
    </div>
  </div>
  <div class=\"row align-items-start\">
    <div class=\"col\">
      <p>Paiement mensuel: </p>
    </div>
    <div class=\"col\">
      <p>$monthlyPayment</p>
    </div>
  </div>
</div>
<h2>Envoyer votre soummission via courriel!</h2>
<label for=\"carToEmail\">Courriel: </label>
<input type=\"email\" name=\"carToEmail\" value=\"\">
<input type=\"submit\" name=\"sumbitCarToEmail\" value=\"Envoyer\">

  ";
}

//Fonction principale appelant toutes les autres
function createFinancingResume($priceInDisplay, $model,  $deposit) {
  validatePrice($priceInDisplay, $model);
  $term = $_POST["termsSelect"];
  $interestRate = determineInterestRate($priceInDisplay,$term);

  $taxes = round(determineTaxes($priceInDisplay),2);
  $priceInDisplayWithTaxes = determinePriceInDisplayWithTaxes($priceInDisplay, $taxes);
  validateDeposit($priceInDisplayWithTaxes, $deposit);

  $sumToFinance = round(determineSumToFinance($deposit, $priceInDisplayWithTaxes),2);
  $interest = round(determineInterest($sumToFinance, $interestRate),2);
  $totalWithInterest = determineTotalWithInterest($sumToFinance, $interest);
  $monthlyPayment = round(determineMonthlyPayment($totalWithInterest, $term),2);

displayFinancingResume($priceInDisplay, $deposit, $taxes, $priceInDisplayWithTaxes, $sumToFinance, $interest, $totalWithInterest, $monthlyPayment);
}

/*---Affichage---*/

//Variables POST
$priceInDisplay = (float)$_GET["price"];
$model = $_GET["model"];
$submit = (isset($_POST["termsButton"])) ? ($_POST["termsButton"]) : null;
$deposit = (isset($_POST["depositInput"])) ? round(trim($_POST["depositInput"]),2) : (float)0.00;

$email = (isset($_POST["carToEmail"])) ? ($_POST["carToEmail"]) : null;
$submitCarToEmail = (isset($_POST["sumbitCarToEmail"])) ? ($_POST["sumbitCarToEmail"]) : null;

//Affichages des différentes vues
include_once '../vues/banner.php';
include_once "../vues/financing.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  try{
    createFinancingResume($priceInDisplay, $model, $deposit);
    //echo $email . 'email';
    echo $submitCarToEmail . 'submit';
  }
  catch (Exception $e) {
    echo "Message : ",  $e->getMessage(), "\n";
  }
}

if(!empty($submitCarToEmail)) {
    echo $submitCarToEmail . 'submit';
  sendEmail('cyrice.paradis@gmail.com', $model);
}


include_once '../vues/footer.php';

 ?>
