<?php

// TODO: -Faire couleur, km, État
// TODO:  -Séparer année et description
//// TODO: Faire sort et par défaut
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
  "car1" => ["imageSrc" => "../images/lada/granta/granta2017.jpeg","miniSrc" =>"../images/lada/granta/mini-granta2017.jpeg", "nameMini" => "mini-granta2017","brand" =>"lada", "model" =>"granta", "description" =>"2017. Attention ne pas dire non à l'homme au volant", "price" => "999999.99$", ],
  "car2" => ["imageSrc" => "../images/lada/granta/granta2018.jpg","miniSrc" =>"../images/lada/granta/mini-granta2018.jpg", "nameMini" => "mini-granta2018","brand" =>"lada", "model" =>"granta", "description" =>"2018. Même couleur que l'année précédente", "price" => "29999.90$", ],
  "car3" => ["imageSrc" => "../images/lada/granta/granta2019.jpg","miniSrc" =>"../images/lada/granta/mini-granta2019.jpg", "nameMini" => "mini-granta2019","brand" =>"lada", "model" =>"granta", "description" =>"2019. Encore bourgogne, car seule couleur de la compagnie." , "price" => "10000.99$", ],
];

//Largus
$array_ladaLargus = [
  "car1" => ["imageSrc" => "../images/lada/largus/largus01.jpg","miniSrc" =>"../images/lada/largus/mini-largus01.jpg", "nameMini" => "mini-largus01","brand" =>"lada", "model" =>"largus", "description" =>"Aucune donnée, à part le fais que tout est carré.", "price" => "1575.50$", ],
  "car2" => ["imageSrc" => "../images/lada/largus/largus03.jpg","miniSrc" =>"../images/lada/largus/mini-largus03.jpg", "nameMini" => "mini-largus03","brand" =>"lada", "model" =>"largus", "description" =>"Acune donnée à partager comme dans le temps du Pacte de Varsovie.", "price" => "25500.30$", ],
  "car3" => ["imageSrc" => "../images/lada/largus/largus2017.jpg","miniSrc" =>"../images/lada/largus/mini-largus2017.jpg", "nameMini" => "mini-largus2017","brand" =>"lada", "model" =>"largus", "description" =>"2017, mais pas les chars à l'arrière..." , "price" => "85501.99$", ],
];

//Niva
$array_ladaNiva = [
  "car1" => ["imageSrc" => "../images/lada/niva/niva1981.jpg","miniSrc" =>"../images/lada/niva/mini-niva1981.jpg", "nameMini" => "mini-niva1981","brand" =>"lada", "model" =>"niva", "description" =>"1981. À vu de meilleurs jours.", "price" => "100.00$", ],
  "car2" => ["imageSrc" => "../images/lada/niva/niva1992.jpg","miniSrc" =>"../images/lada/niva/mini-niva1992.jpg", "nameMini" => "mini-niva1992","brand" =>"lada", "model" =>"niva", "description" =>"1992. Pour les nostalgique de la Perostroïka", "price" => "0.01$", ],
  "car3" => ["imageSrc" => "../images/lada/niva/niva1997.jpg","miniSrc" =>"../images/lada/niva/mini-niva1997.jpg", "nameMini" => "mini-niva1997","brand" =>"lada", "model" =>"niva", "description" =>"1997. Le meilleur du Jet Set moskovite.", "price" => "1000.00$", ],
];


/*-----Pontiac-----*/

//Firebird
$array_pontiacFirebird = [
  "car1" => ["imageSrc" => "../images/pontiac/firebird/firebird1974.jpg","miniSrc" =>"../images/pontiac/firebird/mini-firebird1974.jpg", "nameMini" => "mini-firebird1974","brand" =>"pontiac", "model" =>"firebird", "description" =>"1974. Brun choix de couleur intéressant", "price" => "5555.25$", ],
  "car2" => ["imageSrc" => "../images/pontiac/firebird/firebird1978.jpg","miniSrc" =>"../images/pontiac/firebird/mini-firebird1978.jpg", "nameMini" => "mini-firebird1978","brand" =>"pontiac", "model" =>"firebird", "description" =>"1978. Pour les accros du rétro", "price" => "29999.90$", ],
  "car3" => ["imageSrc" => "../images/pontiac/firebird/firebird1999.jpg","miniSrc" =>"../images/pontiac/firebird/mini-firebird1999.jpg", "nameMini" => "mini-firebird1999","brand" =>"pontiac", "model" =>"firebird", "description" =>"1999. Coupe longueil prérequis" , "price" => "10000.99$", ],
];

//GTO
$array_pontiacGTO = [
  "car1" => ["imageSrc" => "../images/pontiac/gto/gto1966.jpg","miniSrc" =>"../images/pontiac/gto/mini-gto1966.jpg", "nameMini" => "mini-gto1966","brand" =>"pontiac", "model" =>"GTO", "description" =>"1966. LowRider style.", "price" => "1575.50$", ],
  "car2" => ["imageSrc" => "../images/pontiac/gto/gto1967.jpg","miniSrc" =>"../images/pontiac/gto/mini-gto1967.jpg", "nameMini" => "mini-gto1967","brand" =>"pontiac", "model" =>"GTO", "description" =>"1967. Rouge pour faire tourner toutes les têtes.", "price" => "25500.30$", ],
  "car3" => ["imageSrc" => "../images/pontiac/gto/gto1968.jpg","miniSrc" =>"../images/pontiac/gto/mini-gto1968.jpg", "nameMini" => "mini-gto1968","brand" =>"pontiac", "model" =>"GTO", "description" =>"1968. Le plus jeune de la lignée et clairement le moins mature d'entre-eux." , "price" => "85501.99$", ],
];

//Sunfire
$array_pontiacSunfire = [
  "car1" => ["imageSrc" => "../images/pontiac/sunfire/sunfire2005.jpg","miniSrc" =>"../images/pontiac/sunfire/mini-sunfire2005.jpg", "nameMini" => "mini-sunfire2005","brand" =>"pontiac", "model" =>"sunfire", "description" =>"2005. Bleu comme le ciel.", "price" => "5000.00$", ],
  "car2" => ["imageSrc" => "../images/pontiac/sunfire/sunfire1996.jpg","miniSrc" =>"../images/pontiac/sunfire/mini-sunfire1996.jpg", "nameMini" => "mini-sunfire1996","brand" =>"pontiac", "model" =>"sunfire", "description" =>"1996. Bleu comme l'eau abreuvant les arbres.", "price" => "2000.0$", ],
  "car3" => ["imageSrc" => "../images/pontiac/sunfire/sunfire1999.jpg","miniSrc" =>"../images/pontiac/sunfire/mini-sunfire1999.jpg", "nameMini" => "mini-sunfire1999","brand" =>"pontiac", "model" =>"sunfire", "description" =>"1999. Un char sport pour ceux qui ont pas d'argent.", "price" => "4000.0$", ],
];


/*-----Ssangyong-----*/

//Korando
$array_ssangyongKorando = [
  "car1" => ["imageSrc" => "../images/ssangyong/korando/korando2000.jpg","miniSrc" =>"../images/ssangyong/korando/mini-korando2000.jpg", "nameMini" => "mini-korando2000","brand" =>"ssangyong", "model" =>"korando", "description" =>"2000 et a subi les bugs en même temps", "price" => "5555.25$", ],
  "car2" => ["imageSrc" => "../images/ssangyong/korando/korando2012.jpg","miniSrc" =>"../images/ssangyong/korando/mini-korando2012.jpg", "nameMini" => "mini-korando2012","brand" =>"ssangyong", "model" =>"korando", "description" =>"2012 et pour la hausse", "price" => "29999.90$", ],
  "car3" => ["imageSrc" => "../images/ssangyong/korando/korando2018.jpg","miniSrc" =>"../images/ssangyong/korando/mini-korando2018.jpg", "nameMini" => "mini-korando2018","brand" =>"ssangyong", "model" =>"korando", "description" =>"2018 pour brûler de l'essence et réchauffer sa cours" , "price" => "10000.99$", ],
];

//Musso
$array_ssangyongMusso = [
  "car1" => ["imageSrc" => "../images/ssangyong/musso/musso2007.jpg","miniSrc" =>"../images/ssangyong/musso/mini-musso2007.jpg", "nameMini" => "mini-musso2007","brand" =>"ssangyong", "model" =>"musso", "description" =>"2007 et carré comme une boite à savon", "price" => "1575.50$", ],
  "car2" => ["imageSrc" => "../images/ssangyong/musso/musso2016.jpg","miniSrc" =>"../images/ssangyong/musso/mini-musso2016.jpg", "nameMini" => "mini-musso2016","brand" =>"ssangyong", "model" =>"musso", "description" =>"2016. Cette fois juste le cul carré", "price" => "25500.30$", ],
  "car3" => ["imageSrc" => "../images/ssangyong/musso/musso2018.jpg","miniSrc" =>"../images/ssangyong/musso/mini-musso2018.jpg", "nameMini" => "mini-musso2018","brand" =>"ssangyong", "model" =>"musso", "description" =>"2018. Pour tous les redneck assoiffé de libarté" , "price" => "85501.99$", ],
];

//Rexton
$array_ssangyongRexton = [
  "car1" => ["imageSrc" => "../images/ssangyong/rexton/rexton2010.jpg","miniSrc" =>"../images/ssangyong/rexton/mini-rexton2010.jpg", "nameMini" => "mini-rexton2010","brand" =>"ssangyong", "model" =>"rexton", "description" =>"2010. Fenêtre teinté. Idéal pour vampires ou gens louches.", "price" => "125000.00$", ],
  "car2" => ["imageSrc" => "../images/ssangyong/rexton/rexton2018.jpg","miniSrc" =>"../images/ssangyong/rexton/mini-rexton2018.jpg", "nameMini" => "mini-rexton2018","brand" =>"ssangyong", "model" =>"rexton", "description" =>"2018. Modèle viril. Idéal pour le déplacement de lycan ou gens velus.", "price" => "250000.0$", ],
];


/*-----Volkswagen-----*/

//Beetle
$array_volkswagenBeetle = [
  "car1" => ["imageSrc" => "../images/volkswagen/beetle/beetle1.jpg","miniSrc" =>"../images/volkswagen/beetle/mini-beetle1.jpg", "nameMini" => "mini-beetle1","brand" =>"volkswagen", "model" =>"beetle", "description" =>"cils et décal", "price" => "1055.00$", ],
  "car2" => ["imageSrc" => "../images/volkswagen/beetle/beetle2.jpg","miniSrc" =>"../images/volkswagen/beetle/mini-beetle2.jpg", "nameMini" => "mini-beetle2","brand" =>"volkswagen", "model" =>"beetle", "description" =>"2009 et bumper à l'épreuve des piétons", "price" => "9999.90$", ],
  "car3" => ["imageSrc" => "../images/volkswagen/beetle/beetle3.jpg","miniSrc" =>"../images/volkswagen/beetle/mini-beetle3.jpg", "nameMini" => "mini-beetle3","brand" =>"volkswagen", "model" =>"beetle", "description" =>"1970 et plein de rouilles" , "price" => "1.99$", ],
];

//Golf
$array_volkswagenGolf = [
  "car1" => ["imageSrc" => "../images/volkswagen/golf/golf2.jpg","miniSrc" =>"../images/volkswagen/golf/mini-golf2.jpg", "nameMini" => "mini-golf2","brand" =>"volkswagen", "model" =>"golf", "description" =>"1972, bleu et moche", "price" => "175.50$", ],
  "car2" => ["imageSrc" => "../images/volkswagen/golf/golf2018.jpg","miniSrc" =>"../images/volkswagen/golf/mini-golf2018.jpg", "nameMini" => "mini-golf2018","brand" =>"volkswagen", "model" =>"golf", "description" =>"2018. Une voiture trop top!", "price" => "12500.00$", ],
  "car3" => ["imageSrc" => "../images/volkswagen/golf/golfGTI.jpg","miniSrc" =>"../images/volkswagen/golf/mini-golfGTI.jpg", "nameMini" => "mini-golfGTI","brand" =>"volkswagen", "model" =>"golf", "description" =>"1989 et à mettre aux vidsnges" , "price" => "5501.99$", ],
];

//Jetta
$array_volkswagenJetta = [
  "car1" => ["imageSrc" => "../images/volkswagen/jetta/jetta1992.jpg","miniSrc" =>"../images/volkswagen/jetta/mini-jetta1992.jpg", "nameMini" => "mini-jetta1992","brand" =>"volkswagen", "model" =>"jetta", "description" =>"1992", "price" => "15.00$", ],
  "car2" => ["imageSrc" => "../images/volkswagen/jetta/jetta2018.jpg","miniSrc" =>"../images/volkswagen/jetta/mini-jetta2018.jpg", "nameMini" => "mini-jetta2018","brand" =>"volkswagen", "model" =>"jetta", "description" =>"2018", "price" => "2500.00$", ],
  "car3" => ["imageSrc" => "../images/volkswagen/jetta/jetta2019.jpg","miniSrc" =>"../images/volkswagen/jetta/mini-jetta2019.jpg", "nameMini" => "mini-jetta2019","brand" =>"volkswagen", "model" =>"jetta", "description" =>"2019" , "price" => "2501.99$", ],
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
