<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php

// TODO: Ajouter km et État

$array_brandAndModel = [
  "Volkswagen" => ["Beetle","Jetta","Golf"],
  "Pontiac" => ["Sunfire", "GTO","Firebird"],
  "Ssangyong" => ["Korando","Musso","Rexton"],
  "Lada" => ["Niva", "Granta", "Largus"],
];
 ksort($array_brandAndModel);
 foreach($array_brandAndModel as $key => $value){
   asort($array_brandAndModel[$key]);
 }



/*-----Lada-----*/

//Granta
$array_ladaGranta = [
  "car1" => ["imageSrc" => "../images/lada/granta/granta2017.jpeg","miniSrc" =>"../images/lada/granta/mini-granta2017.jpeg", "nameMini" => "mini-granta2017","brand" =>"lada", "model" =>"granta", "builtYear"=> "2017", "color1"=>"Rouge", "color2" =>"Noire", "description" => "Attention ne pas dire non à l'homme au volant", "price" => "999999.99$", ],
  "car2" => ["imageSrc" => "../images/lada/granta/granta2018.jpg","miniSrc" =>"../images/lada/granta/mini-granta2018.jpg", "nameMini" => "mini-granta2018","brand" =>"lada", "model" =>"granta", "builtYear"=>"2018", "color1"=>"Rouge", "color2" =>"Verte","description" =>"Même couleur que l'année précédente", "price" => "29999.90$", ],
  "car3" => ["imageSrc" => "../images/lada/granta/granta2019.jpg","miniSrc" =>"../images/lada/granta/mini-granta2019.jpg", "nameMini" => "mini-granta2019","brand" =>"lada", "model" =>"granta", "builtYear" => "2019", "color1"=>"Rouge", "color2" => null, "description" =>"Encore bourgogne, car seule couleur de la compagnie." , "price" => "10000.99$", ],
];

//Largus
$array_ladaLargus = [
  "car1" => ["imageSrc" => "../images/lada/largus/largus01.jpg","miniSrc" =>"../images/lada/largus/mini-largus01.jpg", "nameMini" => "mini-largus01","brand" =>"lada", "model" =>"largus", "builtYear" => "1999", "color1"=>"Blanche", "color2" =>"Grise", "description" =>"Aucune donnée, à part le fais que tout est carré.", "price" => "1575.50$", ],
  "car2" => ["imageSrc" => "../images/lada/largus/largus03.jpg","miniSrc" =>"../images/lada/largus/mini-largus03.jpg", "nameMini" => "mini-largus03","brand" =>"lada", "model" =>"largus", "builtYear" => "1996", "color1"=>"Grise", "color2" =>"Bleue","description" =>"Aucune donnée à partager comme dans le temps du Pacte de Varsovie.", "price" => "25500.30$", ],
  "car3" => ["imageSrc" => "../images/lada/largus/largus2017.jpg","miniSrc" =>"../images/lada/largus/mini-largus2017.jpg", "nameMini" => "mini-largus2017","brand" =>"lada", "model" =>"largus", "builtYear" => "2017","color1"=>"Blanche", "color2" =>"Noire","description" =>"Mais pas les chars à l'arrière..." , "price" => "85501.99$", ],
];

//Niva
$array_ladaNiva = [
  "car1" => ["imageSrc" => "../images/lada/niva/niva1981.jpg","miniSrc" =>"../images/lada/niva/mini-niva1981.jpg", "nameMini" => "mini-niva1981","brand" =>"lada", "model" =>"niva", "builtYear" => "1981", "color1"=>"Rouge", "color2" =>"Grise", "description" =>" À vu de meilleurs jours.", "price" => "100.00$", ],
  "car2" => ["imageSrc" => "../images/lada/niva/niva1992.jpg","miniSrc" =>"../images/lada/niva/mini-niva1992.jpg", "nameMini" => "mini-niva1992","brand" =>"lada", "model" =>"niva", "builtYear" => "1992","color1"=>"Grise", "color2" => null,"description" =>" Pour les nostalgique de la Perostroïka", "price" => "0.01$", ],
  "car3" => ["imageSrc" => "../images/lada/niva/niva1997.jpg","miniSrc" =>"../images/lada/niva/mini-niva1997.jpg", "nameMini" => "mini-niva1997","brand" =>"lada", "model" =>"niva", "builtYear" => "1997", "color1"=>"Blanche", "color2" => null,"description" =>"Le meilleur du Jet Set moskovite.", "price" => "1000.00$", ],
];


/*-----Pontiac-----*/

//Firebird
$array_pontiacFirebird = [
  "car1" => ["imageSrc" => "../images/pontiac/firebird/firebird1974.jpg","miniSrc" =>"../images/pontiac/firebird/mini-firebird1974.jpg", "nameMini" => "mini-firebird1974","brand" =>"pontiac", "model" =>"firebird", "builtYear"=> "1974", "color1"=>"Cuivre", "color2" =>"Noire", "description" =>" Brun choix de couleur intéressant", "price" => "5555.25$", ],
  "car2" => ["imageSrc" => "../images/pontiac/firebird/firebird1978.jpg","miniSrc" =>"../images/pontiac/firebird/mini-firebird1978.jpg", "nameMini" => "mini-firebird1978","brand" =>"pontiac", "model" =>"firebird", "builtYear"=> "1978", "color1"=>"Noire", "color2" =>"Bleue","description" =>"Pour les accros du rétro", "price" => "29999.90$", ],
  "car3" => ["imageSrc" => "../images/pontiac/firebird/firebird1999.jpg","miniSrc" =>"../images/pontiac/firebird/mini-firebird1999.jpg", "nameMini" => "mini-firebird1999","brand" =>"pontiac", "model" =>"firebird", "builtYear"=> "1999","color1"=>"Noire", "color2" =>"Verte","description" =>"Coupe longueil prérequis" , "price" => "10000.99$", ],
];

//GTO
$array_pontiacGTO = [
  "car1" => ["imageSrc" => "../images/pontiac/gto/gto1966.jpg","miniSrc" =>"../images/pontiac/gto/mini-gto1966.jpg", "nameMini" => "mini-gto1966","brand" =>"pontiac", "model" =>"GTO", "builtYear"=> "1966","color1"=>"Noire", "color2" =>"Bleue","description" =>"LowRider style.", "price" => "1575.50$", ],
  "car2" => ["imageSrc" => "../images/pontiac/gto/gto1967.jpg","miniSrc" =>"../images/pontiac/gto/mini-gto1967.jpg", "nameMini" => "mini-gto1967","brand" =>"pontiac", "model" =>"GTO", "builtYear"=> "1967","color1"=>"Rouge", "color2" =>"Jaune","description" =>"Rouge pour faire tourner toutes les têtes.", "price" => "25500.30$", ],
  "car3" => ["imageSrc" => "../images/pontiac/gto/gto1968.jpg","miniSrc" =>"../images/pontiac/gto/mini-gto1968.jpg", "nameMini" => "mini-gto1968","brand" =>"pontiac", "model" =>"GTO", "builtYear"=> "1968","color1"=>"Orange", "color2" => null,"description" =>"Le plus jeune de la lignée et clairement le moins mature d'entre-eux." , "price" => "85501.99$", ],
];

//Sunfire
$array_pontiacSunfire = [
  "car1" => ["imageSrc" => "../images/pontiac/sunfire/sunfire2005.jpg","miniSrc" =>"../images/pontiac/sunfire/mini-sunfire2005.jpg", "nameMini" => "mini-sunfire2005","brand" =>"pontiac", "model" =>"sunfire", "builtYear"=> "2005","color1"=>"Bleue", "color2" =>"Noire","description" =>"Bleu comme le ciel.", "price" => "5000.00$", ],
  "car2" => ["imageSrc" => "../images/pontiac/sunfire/sunfire1996.jpg","miniSrc" =>"../images/pontiac/sunfire/mini-sunfire1996.jpg", "nameMini" => "mini-sunfire1996","brand" =>"pontiac", "model" =>"sunfire", "builtYear"=> "1996","color1"=>"Noire", "color2" =>"Blanche","description" =>"Bleu comme l'eau abreuvant les arbres.", "price" => "2000.0$", ],
  "car3" => ["imageSrc" => "../images/pontiac/sunfire/sunfire1999.jpg","miniSrc" =>"../images/pontiac/sunfire/mini-sunfire1999.jpg", "nameMini" => "mini-sunfire1999","brand" =>"pontiac", "model" =>"sunfire", "builtYear"=> "1999","color1"=>"Bleue", "color2" => null,"description" =>"Un char sport pour ceux qui ont pas d'argent.", "price" => "4000.0$", ],
];


/*-----Ssangyong-----*/

//Korando
$array_ssangyongKorando = [
  "car1" => ["imageSrc" => "../images/ssangyong/korando/korando2000.jpg","miniSrc" =>"../images/ssangyong/korando/mini-korando2000.jpg", "nameMini" => "mini-korando2000","brand" =>"ssangyong", "model" =>"korando", "builtYear"=> "2000", "color1"=>"Blanche", "color2" =>"Orange","description" =>" A subi les bugs en même temps", "price" => "5555.25$", ],
  "car2" => ["imageSrc" => "../images/ssangyong/korando/korando2012.jpg","miniSrc" =>"../images/ssangyong/korando/mini-korando2012.jpg", "nameMini" => "mini-korando2012","brand" =>"ssangyong", "model" =>"korando", "builtYear"=> "2012", "color1"=>"Blanche", "color2" => null, "description" =>" Pour la hausse", "price" => "29999.90$", ],
  "car3" => ["imageSrc" => "../images/ssangyong/korando/korando2018.jpg","miniSrc" =>"../images/ssangyong/korando/mini-korando2018.jpg", "nameMini" => "mini-korando2018","brand" =>"ssangyong", "model" =>"korando", "builtYear"=> "2018", "color1"=>"Blanche", "color2" =>"Grise","description" =>"Pour brûler de l'essence et réchauffer sa cours" , "price" => "10000.99$", ],
];

//Musso
$array_ssangyongMusso = [
  "car1" => ["imageSrc" => "../images/ssangyong/musso/musso2007.jpg","miniSrc" =>"../images/ssangyong/musso/mini-musso2007.jpg", "nameMini" => "mini-musso2007","brand" =>"ssangyong", "model" =>"musso", "builtYear"=> "2007", "color1"=>"Bleue", "color2" =>"Verte","description" =>"Carré comme une boite à savon", "price" => "1575.50$", ],
  "car2" => ["imageSrc" => "../images/ssangyong/musso/musso2016.jpg","miniSrc" =>"../images/ssangyong/musso/mini-musso2016.jpg", "nameMini" => "mini-musso2016","brand" =>"ssangyong", "model" =>"musso", "builtYear"=> "2016","color1"=>"Rouge", "color2" =>"Grise","description" =>"Cette fois juste le cul carré", "price" => "25500.30$", ],
  "car3" => ["imageSrc" => "../images/ssangyong/musso/musso2018.jpg","miniSrc" =>"../images/ssangyong/musso/mini-musso2018.jpg", "nameMini" => "mini-musso2018","brand" =>"ssangyong", "model" =>"musso", "builtYear"=> "2018","color1"=>"Bleue", "color2" => null,"description" =>"Pour tous les redneck assoiffé de libarté" , "price" => "85501.99$", ],
];

//Rexton
$array_ssangyongRexton = [
  "car1" => ["imageSrc" => "../images/ssangyong/rexton/rexton2010.jpg","miniSrc" =>"../images/ssangyong/rexton/mini-rexton2010.jpg", "nameMini" => "mini-rexton2010","brand" =>"ssangyong", "model" =>"rexton", "builtYear"=> "2010", "color1"=>"Noire", "color2" =>"Blanche","description" =>"Fenêtre teinté. Idéal pour vampires ou gens louches.", "price" => "125000.00$", ],
  "car2" => ["imageSrc" => "../images/ssangyong/rexton/rexton2018.jpg","miniSrc" =>"../images/ssangyong/rexton/mini-rexton2018.jpg", "nameMini" => "mini-rexton2018","brand" =>"ssangyong", "model" =>"rexton", "builtYear"=> "2018", "color1"=>"Grise", "color2" =>"Rouge","description" =>"Modèle viril. Idéal pour le déplacement de lycan ou gens velus.", "price" => "250000.0$", ],
];


/*-----Volkswagen-----*/

//Beetle
$array_volkswagenBeetle = [
  "car1" => ["imageSrc" => "../images/volkswagen/beetle/beetle1.jpg","miniSrc" =>"../images/volkswagen/beetle/mini-beetle1.jpg", "nameMini" => "mini-beetle1","brand" =>"volkswagen", "model" =>"beetle", "builtYear"=> "2003", "color1"=>"Variée", "color2" =>"Blanche", "description" =>"Cils et décal", "price" => "1055.00$", ],
  "car2" => ["imageSrc" => "../images/volkswagen/beetle/beetle2.jpg","miniSrc" =>"../images/volkswagen/beetle/mini-beetle2.jpg", "nameMini" => "mini-beetle2","brand" =>"volkswagen", "model" =>"beetle", "builtYear"=> "2008", "color1"=>"Noire", "color2" =>"Rouge","description" =>"Bumper à l'épreuve des piétons", "price" => "9999.90$", ],
  "car3" => ["imageSrc" => "../images/volkswagen/beetle/beetle3.jpg","miniSrc" =>"../images/volkswagen/beetle/mini-beetle3.jpg", "nameMini" => "mini-beetle3","brand" =>"volkswagen", "model" =>"beetle", "builtYear"=> "1970", "color1"=>"Grise", "color2" =>null ,"description" =>"Plein de rouilles" , "price" => "1.99$", ],
];

//Golf
$array_volkswagenGolf = [
  "car1" => ["imageSrc" => "../images/volkswagen/golf/golf2.jpg","miniSrc" =>"../images/volkswagen/golf/mini-golf2.jpg", "nameMini" => "mini-golf2","brand" =>"volkswagen", "model" =>"golf", "builtYear"=> "1972", "color1"=>"Bleue", "color2" => null, "description" =>"Bleu et moche", "price" => "175.50$", ],
  "car2" => ["imageSrc" => "../images/volkswagen/golf/golf2018.jpg","miniSrc" =>"../images/volkswagen/golf/mini-golf2018.jpg", "nameMini" => "mini-golf2018","brand" =>"volkswagen", "model" =>"golf", "builtYear"=> "2018", "color1"=>"Bleue", "color2" =>"blanche", "description" =>"Une voiture trop top!", "price" => "12500.00$", ],
  "car3" => ["imageSrc" => "../images/volkswagen/golf/golfGTI.jpg","miniSrc" =>"../images/volkswagen/golf/mini-golfGTI.jpg", "nameMini" => "mini-golfGTI","brand" =>"volkswagen", "model" =>"golf", "builtYear"=> "1989","color1"=>"Grise", "color2" =>"verte","description" =>"À mettre aux vidanges" , "price" => "5501.99$", ],
];

//Jetta
$array_volkswagenJetta = [
  "car1" => ["imageSrc" => "../images/volkswagen/jetta/jetta1992.jpg","miniSrc" =>"../images/volkswagen/jetta/mini-jetta1992.jpg", "nameMini" => "mini-jetta1992","brand" =>"volkswagen", "model" =>"jetta", "builtYear"=> "1992", "color1"=>"Blanche", "color2" =>"Grise", "description" =>"Lorsque la fabrication de boîte à savon était le moment le plus heureux de ton enfance.", "price" => "15.00$", ],
  "car2" => ["imageSrc" => "../images/volkswagen/jetta/jetta2018.jpg","miniSrc" =>"../images/volkswagen/jetta/mini-jetta2018.jpg", "nameMini" => "mini-jetta2018","brand" =>"volkswagen", "model" =>"jetta", "builtYear"=> "2018", "color1"=>"Grise", "color2" =>"Orange","description" =>"Warp tours, bière et Monster est inclu dans ce starterPack.", "price" => "2500.00$", ],
  "car3" => ["imageSrc" => "../images/volkswagen/jetta/jetta2019.jpg","miniSrc" =>"../images/volkswagen/jetta/mini-jetta2019.jpg", "nameMini" => "mini-jetta2019","brand" =>"volkswagen", "model" =>"jetta", "builtYear"=> "2019", "color1"=>"Rouge","color2" => "Noire","description" =>"Bientôt disponible avec des néons en-dessous du véhicule." , "price" => "2501.99$", ],
];

$array_randomPictures = [
"images/lada/granta/granta2017.jpeg",
"images/lada/granta/granta2018.jpg",
"images/lada/granta/granta2019.jpg",
"images/lada/largus/largus01.jpg",
"images/lada/largus/largus2017.jpg",
"images/lada/largus/largus03.jpg",
"images/volkswagen/jetta/jetta2019.jpg",
"images/volkswagen/jetta/jetta2018.jpg",
"images/volkswagen/jetta/jetta1992.jpg",
"images/volkswagen/golf/golfGTI.jpg",
"images/volkswagen/golf/golf2018.jpg",
"images/volkswagen/golf/golf2.jpg",
"images/volkswagen/beetle/beetle3.jpg",
"images/volkswagen/beetle/beetle2.jpg",
"images/volkswagen/beetle/beetle1.jpg",
"images/ssangyong/rexton/rexton2018.jpg",
"images/ssangyong/rexton/rexton2010.jpg",
"images/ssangyong/musso/musso2018.jpg",
"images/ssangyong/musso/musso2016.jpg",
"images/ssangyong/musso/musso2007.jpg",
"images/ssangyong/korando/korando2018.jpg",
"images/ssangyong/korando/korando2012.jpg",
"images/ssangyong/korando/korando2000.jpg",
"images/pontiac/sunfire/sunfire1999.jpg",
"images/pontiac/sunfire/sunfire1996.jpg",
"images/pontiac/sunfire/sunfire2005.jpg",
"images/pontiac/gto/gto1968.jpg",
"images/pontiac/gto/gto1967.jpg",
"images/pontiac/gto/gto1966.jpg",
"images/pontiac/firebird/firebird1999.jpg",
"images/pontiac/firebird/firebird1978.jpg",
"images/pontiac/firebird/firebird1974.jpg",
"images/lada/niva/niva1997.jpg",
"images/lada/niva/niva1992.jpg",
"images/lada/niva/niva1981.jpg"
];

?>
