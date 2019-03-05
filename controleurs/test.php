<?php
include_once("controller_financing.php");
// TODO: Faire un shitload de test

//Test de la fonction determineInterestRate
/*
determineInterestRate($priceInDisplay,FINANCING_RATE_INTEREST[$term]);

$taxes = round(determineTaxes($priceInDisplay),2);
$priceInDisplayWithTaxes = deteriminepriceInDisplayWithTaxes($priceInDisplay, $taxes);
validateDeposit($priceInDisplayWithTaxes, $deposit);

$sumToFinance = round(determineSumToFinance($deposit, $priceInDisplayWithTaxes),2);
$interest = round(determineInterest($sumToFinance, $interestRate),2);
$totalWithInterest = determineTotalWithInterest($sumToFinance, $interest);
$monthlyPayment = round(determineMonthlyPayment($totalWithInterest),2);
*/

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page de test</title>
  </head>
  <body>
    <h1>Test de validation des fonctions</h1>

    <h2>Fonction determineInterestRate($price, $value) **À faire</h2>
    <table border="1px solid black">
      <tr>
        <th>No. de test</th>
        <th>Valeurs en entrée</th>
        <th>Résultat attendu</th>
        <th>Résultat obtenu</th>
      </tr>
      <tr>
        <td>1</td>
        <td>10000, </td>
        <td>1.4975</td>
        <td><?php echo determineTaxes(10.00); ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>100.00</td>
        <td>14.975</td>
        <td><?php echo determineTaxes(100.00); ?></td>
      </tr>
    </table>
    <br>

    <h2>Fonction determineTaxes($priceInDisplay)</h2>
    <table border="1px solid black">
      <tr>
        <th>No. de test</th>
        <th>Valeurs en entrée</th>
        <th>Résultat attendu</th>
        <th>Résultat obtenu</th>
      </tr>
      <tr>
        <td>1</td>
        <td>10.00</td>
        <td>1.4975</td>
        <td><?php echo determineTaxes(10.00); ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>100.00</td>
        <td>14.975</td>
        <td><?php echo determineTaxes(100.00); ?></td>
      </tr>
    </table>
    <br>

    <h2>Fonction deteriminepriceInDisplayWithTaxes($priceInDisplay, $taxes)</h2>
    <table border="1px solid black">
      <tr>
        <th>No. de test</th>
        <th>Valeurs en entrée</th>
        <th>Résultat attendu</th>
        <th>Résultat obtenu</th>
      </tr>
      <tr>
        <td>1</td>
        <td>(10.00,1.4975)</td>
        <td>11.4975</td>
        <td><?php echo deteriminepriceInDisplayWithTaxes(10.00,1.4975); ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>(100.00,14.975)</td>
        <td>114.975</td>
        <td><?php echo deteriminepriceInDisplayWithTaxes(100.00,14.975); ?></td>
      </tr>
    </table>
    <br>

    <h2>Fonction determineSumToFinance($deposit, $priceInDisplayWithTaxes)</h2>
    <table border="1px solid black">
      <tr>
        <th>No. de test</th>
        <th>Valeurs en entrée</th>
        <th>Résultat attendu</th>
        <th>Résultat obtenu</th>
      </tr>
      <tr>
        <td>1</td>
        <td>(100000.00,200.00)</td>
        <td>99800.00</td>
        <td><?php echo deteriminepriceInDisplayWithTaxes(100000.00,200.00); ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>(100.00,14.975)</td>
        <td>114.975</td>
        <td><?php echo deteriminepriceInDisplayWithTaxes(100.00,14.975); ?></td>
      </tr>
    </table>
    <br>

  </body>
</html>
