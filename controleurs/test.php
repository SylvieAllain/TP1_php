<?php
//NOTE:Les test vont apparaitre tout en bas de la page du navigateur, soit sous les codes d'erreurs.
include_once("controller_financing.php");

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page de test</title>
  </head>
  <body>
    <h1>Test de validation des fonctions</h1>

    <h2>Fonction determineInterestRate($price, $value)</h2>
    <table border="1px solid black">
      <tr>
        <th>No. de test</th>
        <th>Valeurs en entrée</th>
        <th>Résultat attendu</th>
        <th>Résultat obtenu</th>
      </tr>
      <tr>
        <td>1</td>
        <td>(10000,12)</td>
        <td>6.95</td>
        <td><?php echo determineInterestRate(10000,12); ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>(10001,12)</td>
        <td>7.25</td>
        <td><?php echo determineInterestRate(10001,12); ?></td>
      </tr>
      <tr>
        <td>3</td>
        <td>(9999,12)</td>
        <td>6.95</td>
        <td><?php echo determineInterestRate(9999,12); ?></td>
      </tr>
      <tr>
        <td>4</td>
        <td>(9999,36)</td>
        <td>6.25</td>
        <td><?php echo determineInterestRate(9999,36); ?></td>
      </tr>
      <tr>
        <td>5</td>
        <td>(100000,36)</td>
        <td>6.30</td>
        <td><?php echo determineInterestRate(100000,36); ?></td>
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

    <h2>Fonction validateDeposit($priceInDisplayWithTaxes, $deposit)</h2>
      <h3>Note: cette fonction ne fait que valider le montant avec taxes par rapport à l'accompte. Elle ne fait pas la soustraction.</h3>
    <table border="1px solid black">
      <tr>
        <th>No. de test</th>
        <th>Valeurs en entrée</th>
        <th>Résultat attendu</th>
        <th>Résultat obtenu</th>
      </tr>
      <tr>
        <td>1</td>
        <td>(200.00, 100000.00)</td>
        <td>Exception</td>
        <td><?php try{validateDeposit(200.00, 100000.00);} catch(Exception $e) {echo $e->getMessage();} ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>(100.00,-100000.00)</td>
        <td>Exception</td>
        <td><?php try{validateDeposit(100.00,-100000.00);} catch(Exception $e) {echo $e->getMessage();} ?></td>
      </tr>
      <tr>
        <td>3</td>
        <td>(100000.00,0.00)</td>
        <td>Aucune exception</td>
        <td><?php try{validateDeposit(100000.00,0.00);} catch(Exception $e) {echo $e->getMessage();} ?></td>
      </tr>
      <tr>
        <td>4</td>
        <td>(100000.00,1000.00)</td>
        <td>Aucune exception</td>
        <td><?php try{validateDeposit(100000.00,1000.00);} catch(Exception $e) {echo $e->getMessage();} ?></td>
      </tr>
    </table>
    <br>

    <h2>Fonction determineSumToFinance($deposit, $priceInDisplayWithTaxes)</h2>
      <h3>Note: cette fonction ne fait que la soustraction. Elle ne fait pas la validation.</h3>
    <table border="1px solid black">
      <tr>
        <th>No. de test</th>
        <th>Valeurs en entrée</th>
        <th>Résultat attendu</th>
        <th>Résultat obtenu</th>
      </tr>
      <tr>
        <td>1</td>
        <td>(200.00, 100000.00)</td>
        <td>99800.00</td>
        <td><?php echo determineSumToFinance(200.00, 100000.00); ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>(0,100000.00)</td>
        <td>100000.00</td>
        <td><?php echo determineSumToFinance(0,100000.00); ?></td>
      </tr>
      <tr>
        <td>3</td>
        <td>(100000.00,0.00)</td>
        <td>-100000.00</td>
        <td><?php echo determineSumToFinance(100000.00,0.00); ?></td>
      </tr>
    </table>
    <br>

    <h2>Fonction determineInterest($sumToFinance, $interestRate)</h2>
    <table border="1px solid black">
      <tr>
        <th>No. de test</th>
        <th>Valeurs en entrée</th>
        <th>Résultat attendu</th>
        <th>Résultat obtenu</th>
      </tr>
      <tr>
        <td>1</td>
        <td>(100000.00, 6.0)</td>
        <td>6000.00</td>
        <td><?php echo determineInterest(100000.00, 6.0); ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>(1000.00, 10.0)</td>
        <td>100.00</td>
        <td><?php echo determineInterest(1000.00, 10.0); ?></td>
      </tr>
      <tr>
        <td>3</td>
        <td>(100000.00,0.00)</td>
        <td>0.00</td>
        <td><?php echo determineInterest(100000.00,0.00); ?></td>
      </tr>
    </table>
    <br>

    <h2>Fonction determineTotalWithInterest($sumToFinance, $interest)</h2>
    <table border="1px solid black">
      <tr>
        <th>No. de test</th>
        <th>Valeurs en entrée</th>
        <th>Résultat attendu</th>
        <th>Résultat obtenu</th>
      </tr>
      <tr>
        <td>1</td>
        <td>(100000.00, 600.0)</td>
        <td>10600.00</td>
        <td><?php echo determineTotalWithInterest(100000.00, 600.0); ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>(1000.00, 0.00)</td>
        <td>1000.00</td>
        <td><?php echo determineTotalWithInterest(1000.00, 0.00); ?></td>
      </tr>
    </table>
    <br>

    <h2>Fonction determineMonthlyPayment($totalWithInterest,$term)</h2>
    <table border="1px solid black">
      <tr>
        <th>No. de test</th>
        <th>Valeurs en entrée</th>
        <th>Résultat attendu</th>
        <th>Résultat obtenu</th>
      </tr>
      <tr>
        <td>1</td>
        <td>(100000.00, 60)</td>
        <td>1666.666</td>
        <td><?php echo determineMonthlyPayment(100000.00, 60); ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>(25000.00, 12)</td>
        <td>2083.333</td>
        <td><?php echo determineMonthlyPayment(25000.00, 12); ?></td>
      </tr>
    </table>
    <br>

  </body>
</html>
