

<?php
define("FED_TAXE", 5);
define("PROV_TAXE", 9.75);

define("PERIODICITY", 12); //12 mois dans une année

/*----Tableau des taux d'intérêts----*/
//mois  <= 10 000 >
define('FINANCING_RATE_INTEREST', [
  null => [null],
  12 => [6.95, 7.25],
  24 => [6.95, 7.25],
  36 => [6.25, 6.30],
  48 => [6.10, 3.30],
  60 => [6.00, 5.85],
]);

 ?>
