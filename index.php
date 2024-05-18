<?php session_start(); ?>
<?php
$version = phpversion();
$dataset = array(
  'version'=>$version,
);

include_once './systems/syscontrols.php';
if(count($_SESSION)==0){
  $sys = new syscontrols();
  // var_dump($datafilename);
  // var_dump($sys->test());
  echo "Load Library . change new path";
}else{
  $sys = new syscontrols();
  // $models = $sys->getmodels();
  // $getdb = $models->db_getselect();
  // var_dump($getdb);
}


?>
