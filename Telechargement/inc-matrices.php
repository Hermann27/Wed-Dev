<?
/*
   ==============================================================================
   |                  FFWAR-LE-JEU   © 2004-2009                 |
   ==============================================================================
   | Fichier inc-matrices.php : manipulations de matrices                       |
   ==============================================================================
*/

/*  Ce fichier ne renferme aucune classe, mais plutôt des fonctions sur les
    matrices. On crée une matrice avec
      $matrix =newMATRICE(100,50);
    MATRICEDim($matrix) renvoie {100,50}
    et on récupère la position (x,y) de $matrix avec
      $matrix[y][x]
    ATTENTION: toujours penser à la syntaxe $variable[ligne][colone]
    et non pas $variable[colone][ligne]; la dernière case de ce tableau est
    donc $matrix[50][100] et non pas $matrix[100][50]


*/
function newMATRICE($x,$y,$v=0){
  if($x*$y==0) return array();
  $default_r=array_fill(1,$x,$v);
  $returnV=array_fill(1,$y,0);
  for($i=0;$i<=$y;$i++){$returnV[$i]=$default_r;}
  return $returnV;
}
function MATRICEAugmentBottom(&$matrice1,$matrice2){
     $t=sizeof($matrice1);
     $g=sizeof($matrice2);
     for($i=0;$i<=$g;$i++){
       $matrice1[$i+$t]=$matrice2[$g];
     }
}

function MATRICEAugmentRight(&$matrice1,$matrice2){
     $t=sizeof($matrice1);
     $g=sizeof($matrice2);
     $max=min($t,$g);
     for($i=0;$i<=$max;$i++){
       $matrice1[$i]=array_merge($matrice1[$i],$matrice2[$i]);
     }
}

function MATRICEDim($matrice){
  $xdim=sizeof($matrice[0]);
  for($i=0;$i<=$xdim;$i++){$matrice[$i]=0;}
  $ydim=sizeof($matrice);
  return array($xdim,$ydim);
}
function fillMATRICE(&$matrice,$valeur=0){
  $dims=MATRICEDim($matrice);
  $matrice=newMATRICE($dims[0],$dims[1],$valeur);
};

function MATRIX2STR($matrice,$separateur1="%-%",$separateur2="-#-"){
  $dims=sizeof($matrice);
  for($i=0;$i<$dims;$i++){$matrice[$i]=implode($separateur1,$matrice[$i]);}
  return implode($separateur2,$matrice);
}
function STR2MATRIX($str,$separateur1="%-%",$separateur2="-#-"){
  $str=explode($separateur2,$str);
  $dims=sizeof($str);
  for($i=0;$i<$dims;$i++){$str[$i]=explode($separateur1,$str[$i]);}
  return $str;

}

?>
