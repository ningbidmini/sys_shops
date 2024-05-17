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
  var_dump($sys->test());
  echo "xxx";
  exit;


  if(!isset($_SESSION['libs'])){

    $path_routes = "./resources/";
    $listfile = array(
      'routes'=>$path_routes."routes.php",
    );
    if(file_exists('./resources/routes.php')){
      $getfile = file_get_contents($listfile['routes']);
      // var_dump($getfile);
      $setfilename = "$.libs";
      file_put_contents($setfilename,$getfile);
      include_once $setfilename;
      $newclass = new routes();


      $strfile = ob_get_contents();
      var_dump($newclass);
      // $setobj = new $getfile();
      // include_once
      // $_SESSION['routes'];
    }
  }else{
    echo "Has SESSION Libs";
    var_dump($_SESSION['libs']);
  }
}else{
  $sys = new syscontrols();
  echo "<pre>";
  var_dump($_SESSION);
}


?>
