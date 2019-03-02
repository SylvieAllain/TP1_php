

<?php
define("FED_TAXE", 5);
define("PROV_TAXE", 9.75);

define("PERIODICITY", 12); //12 mois dans une année

/*----Constantes et tableau des taux d'intérêts----*/

//Montant minimum à atteindre pour obtenir le meilleur taux
define('MIN_FOR_BEST_RATE', 10000);

//Index des taux
define('BEST_RATE_INDEX', 0);
define('HIGHER_RATE_INDEX', 1);
define('DEFAULT_MONTHLY_RATE_ONLOAD', 60);

//mois  <= 10 000 >
define('FINANCING_RATE_INTEREST', [
  12 => [6.95, 7.25],
  24 => [6.95, 7.25],
  36 => [6.25, 6.30],
  48 => [6.10, 6.30],
  60 => [6.00, 5.85],
]);


 ?>
