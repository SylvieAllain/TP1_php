<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\wamp64\vendor\autoload.php';
require 'C:\wamp64\vendor\phpmailer\phpmailer\src\PHPMailer.php';

include_once "../modeles/model_cars.php";
include_once "../modeles/model_financing.php";
include "controller_function.php";

/*---Fonctions---*/

//Pour le traitement de la page
$isIndex = false;
$needHref = false;
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

//Pour création tableau contenant les variables nécessaires pour l'Affichage de la descriptions
//Plutôt utiliser la fonction createTable???
function getCarArrayByKey($model, $carKey) {
  $arrayModel = determineCarsByModel(ucfirst($model),false);
  $arrayCar = $arrayModel[$carKey];
  return $arrayCar;
}


//Pour envoyer un courriel contenant le résumé du financment
//Librairie disponible et exemple tiré de : https://github.com/PHPMailer/PHPMailer
function sendEmail($to, $model, $priceInDisplay, $deposit, $taxes, $priceInDisplayWithTaxes, $sumToFinance, $interest, $totalWithInterest, $monthlyPayment) {
  try{
    $mail = new PHPMailer(TRUE);
    $mail->setFrom('voiture.a.variee@gmail.com', utf8_decode('Voiture AVariée'));
    $mail->addAddress($to);
    $mail->Subject = 'Votre soumission automobile ' . $model;
    $body= "
     <html>
     <body>
     <p>" . strtoupper($model) . "</p>
     <table>
      <tr>
        <th>Détails</th>
        <th>Montant</th>
      </tr>
      <tr>
        <td>Prix de vente affiché: </td>
        <td>$priceInDisplay</td>
      </tr>
      <tr>
        <td>Acompte: </td>
        <td>$deposit</td>
      </tr>
      <tr>
        <td>Taxes: </td>
        <td>$taxes</td>
      </tr>
      <tr>
        <td>Prix total: </td>
        <td>$priceInDisplayWithTaxes</td>
      </tr>
      <tr>
        <td>Montant à financer: </td>
        <td>$sumToFinance</td>
      </tr>
      <tr>
        <td>Intérêts: </td>
        <td>$interest</td>
      </tr>
      <tr>
        <td>Montant avec intérêts: </td>
        <td>$totalWithInterest</td>
      </tr>
      <tr>
        <td>Paiement mensuel: </td>
        <td>$monthlyPayment</td>
      </tr>
    </table>
    </body>
    </html>
     ";

    $mail->Body = $body;
    $mail->IsHTML(true);

    //Server settings
     $mail->isSMTP();
     $mail->Host = 'smtp.gmail.com';
     $mail->SMTPAuth = TRUE;
     $mail->SMTPSecure = 'tsl';
     $mail->Port = 587;
     $mail->Username = 'voiture.a.variee@gmail.com';
     $mail->Password = '123456789abcD';

     // Send mail
     $mail->send();
   }
   catch (Exception $e) {
    echo "Le courriel n'a pu être envoyé en raison que PHPMailer n'a pas été installé ou l'authentification SMTP est mal configuré.";
  }
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

function validatePrice($price, $model,$isIndex){
  if (!is_Numeric($price)){
    throw new Exception ("Bravo! Tu as mis des lettres dans l'URL du prix");
  }

  $carsInModel = determineCarsByModel(ucfirst($model),$isIndex);
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

function validateEmail ($email) {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new Exception("Un courriel valide doit être entré<br>");
	}
}

//Pour affichage des variables dans un tableau résumant le financement
function displayFinancingResume($priceInDisplay, $deposit, $taxes, $priceInDisplayWithTaxes, $sumToFinance, $interest, $totalWithInterest, $monthlyPayment) {
  echo "
  <div class=\"container containerFinancing2\">
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
  <div id=\"carToEmailForm\" class=\"row\">
  <div class=\"col-10 offset-2\">
  <h2>Envoyer votre soumission via courriel!</h2>
    <form class=\"\" action=\"\" method=\"post\">
      <label for=\"carToEmail\">Courriel: </label>
      <input type=\"email\" name=\"carToEmail\" value=\"\" class=\"input-group-text\" id=\"inputGroup-sizing-default\">
      <input type=\"submit\" name=\"sumbitCarToEmail\" class=\"btn btn-success\" value=\"Envoyer\">
    </form>
    </div>
  </div>
</div>
  ";
}
//Fonction principale appelant toutes les autres
function createFinancingResume($priceInDisplay, $carKey, $model,  $deposit, $isIndex) {
  global $term;
  validatePrice($priceInDisplay, $model, $isIndex);
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
$carKey = $_GET["carKey"];
$model = $_GET["model"];
$arrayCar = getCarArrayByKey($model, $carKey);
$term = null;
$imageSrc = $arrayCar["imageSrc"];
$miniSrc = $arrayCar["miniSrc"];
$nameMini = $arrayCar["nameMini"];

$priceInDisplay = round((float)$arrayCar["price"],2);

$submitFinancing = (isset($_POST["termsButton"])) ? ($_POST["termsButton"]) : null;
$deposit = (isset($_POST["depositInput"])) ? round(trim($_POST["depositInput"]),2) : (float)0.00;

$email = (isset($_POST["carToEmail"])) ? ($_POST["carToEmail"]) : null;
$submitCarToEmail = (isset($_POST["sumbitCarToEmail"])) ? ($_POST["sumbitCarToEmail"]) : null;


//Affichages des différentes vues
$pageTitle = "Financement";
include_once '../vues/banner.php';
include_once "../vues/financing.php";



if (!empty($submitFinancing)) {
  try{
    createFinancingResume($priceInDisplay, $carKey, $model, $deposit, $isIndex);

  }
  catch (Exception $e) {
    echo "Message : ",  $e->getMessage(), "\n";
  }
}

if(!empty($submitCarToEmail)) {
  try{
    validateEmail($email);

    $interestRate = determineInterestRate($priceInDisplay,$term);
    $taxes = round(determineTaxes($priceInDisplay),2);
    $priceInDisplayWithTaxes = determinePriceInDisplayWithTaxes($priceInDisplay, $taxes);
    $sumToFinance = round(determineSumToFinance($deposit, $priceInDisplayWithTaxes),2);
    $interest = round(determineInterest($sumToFinance, $interestRate),2);
    $totalWithInterest = determineTotalWithInterest($sumToFinance, $interest);
    $monthlyPayment = round(determineMonthlyPayment($totalWithInterest, $term),2);

    sendEmail($email, $model, $priceInDisplay, $deposit, $taxes, $priceInDisplayWithTaxes, $sumToFinance, $interest, $totalWithInterest, $monthlyPayment);
  }
  catch (Exception $e) {
    echo "Message : ",  $e->getMessage(), "\n";
  }
}


include_once '../vues/footer.php';

 ?>
