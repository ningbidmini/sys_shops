<?php
/**
 * Systems Controls
 */
class syscontrols {
  private $path = './tmp/';
  private $path_routes = './resources/';
  private $models = null;
  private $ctrl = null;
  private $vw = null;
  private $routes = array();
  function __construct($param=array()){
    // var_dump($_SESSION);
    // echo count($_SESSION);
    if(count($_SESSION)==0){
      if(!isset($_SESSION['libs'])){
        $status=$this->loadlibs();
        if($status['status']==true){
          // header('location: ./');
          // $this->loadtrait();
          // $status_models = $this->setmodels();
          // var_dump($status_models);
          // if($status_models['status']==true){
          //   $status_controllers = $this->loadsession_controllers();
          //   if($status_controllers['status']==true){
          //     $status_views = $this->loadsession_views();
          //     if($status_views['status']==true){
          //       header('location: ./');
          //     }
          //   }
          // }
        }
      }
    }else{
      if(count($_SESSION['libs'])>0){
        // echo "load success";
        $this->loadtrait();
        $status_models = $this->setmodels();
        $this->routes();
      }
    }
    // else{
    //   $this->loadsession_models();
    // }
  }
  public function test(){
    $_SESSION['libs']['views']->loadview('testview');
  }
  private function loaderror($param=array()){
    echo $param['msg'];
  }
  private function loadlibs(){
    $datafilename = array();
    $pathdev = './devoop/';
    $listdev = array(
      'session'=>$pathdev.'dev_session.php',
      'libs'=>$pathdev.'dev_libs.php',
      'db'=>$pathdev.'dev_database.php',
      'secure'=>$pathdev.'dev_security.php',
      'dbconfig'=>$pathdev.'dev_config.php',
      'tplerror'=>$pathdev.'dev_error.php',
      'devviews'=>$pathdev.'dev_views.php',
    );
    foreach ($listdev as $key => $value) {
      // array_push($datafilename,)
      $datafilename[$key]=file_get_contents($value);
      // $setfilename = "$.".$key;
      // file_put_contents($this->path.$setfilename,file_get_contents($value));
      // include $setfilename;
      $_SESSION['libs']['trait'][$key]=file_get_contents($value);
    }


    if(count($_SESSION)>0){
      return array('status'=>true,'msg'=>'load success');
    }else{
      return array('status'=>false,'msg'=>'not load!!');
    }
  }
  private function loadsession(){
    // var_dump($_SESSION);

  }
  private function loadtrait(){
    foreach ($_SESSION['libs']['trait'] as $key => $value) {
      $setfilename = "$.".$key;
      file_put_contents($this->path.$setfilename,$value);
      include $this->path.$setfilename;
    }
  }
  private function loadsession_models(){
    $strmodels = '
      <?php
        class models {
          public $ctrl = null;
          use libs;
          use security;
          use config;
          use database;
          use tplerror;
          function __construct($param=array()){
            // $this->ctrl =new session();
            // $this->setdbconfig();
            echo "Load Models";
          }

        }
      ?>
    ';
    $setmodelname = "$.models";
    file_put_contents($this->path.$setmodelname,trim($strmodels));
    include_once $this->path.$setmodelname;
    $obj = new models();
    $_SESSION['libs']['models']= $obj;
    if(count($_SESSION['libs']['models'])>0){
      return array('status'=>true,'msg'=>'load models success!!!');
    }else{
      return array('status'=>false,'msg'=>'not load models!!!');
    }
  }
  private function loadsession_controllers(){
    $strcontrollers = '
      <?php
        class controllers {
          public $ctrl = null;
          use libs;
          use security;
          use tplerror;
          function __construct($param=array()){
            // $this->ctrl =new session();
            // $this->setdbconfig();
            echo "Load Controllers";
          }
        }
      ?>
    ';

    $setcontrollername = "$.controllers";
    file_put_contents($this->path.$setcontrollername,trim($strcontrollers));
    include_once $this->path.$setcontrollername;
    $obj = new controllers();
    $_SESSION['libs']['controllers']= $obj;
    // $obj->testcontrollers();
    if(count($_SESSION['libs']['controllers'])>0){
      return array('status'=>true,'msg'=>'load controllers success');
    }else{
      return array('status'=>false,'msg'=>'not load controllers');
    }
  }
  private function loadsession_views(){
    $strviews = '
      <?php
        class views {
          use libs;
          use tplerror;
          use devviews;
          function __construct($param=array()){
            // $this->setdbconfig();
            echo "Load Views";
          }
        }
      ?>
    ';

    $setviewname = "$.views";
    file_put_contents($this->path.$setviewname,trim($strviews));
    include_once $this->path.$setviewname;
    $obj = new views();
    $_SESSION['libs']['views']= $obj;
    if(count($_SESSION['libs']['views'])>0){
      return array('status'=>true,'msg'=>'load views success');
    }else{
      return array('status'=>false,'msg'=>'not load views!!');
    }
  }
  private function setmodels($param=array()){
    $strmodels = '
      <?php
        class models {
          // public $ctrl = null;
          use libs;
          use security;
          use config;
          use database;
          use tplerror;
          function __construct($param=array()){
            // $this->ctrl =new session();
            // $this->setdbconfig();
            echo "Load Models";
          }

        }
      ?>
    ';
    $setmodelname = "$.models";
    file_put_contents($this->path.$setmodelname,trim($strmodels));
    include_once $this->path.$setmodelname;
    $obj = new models();
    // $_SESSION['libs']['models']= $obj;
    $this->models = $obj;
    if($this->models != null){
      return array('status'=>true,'msg'=>'load models success!!!');
    }else{
      return array('status'=>false,'msg'=>'not load models!!!');
    }
  }
  public function getmodels(){ return $this->models; }
  public function getcontrollers(){ return $this->ctrl; }


  private function routes(){
    $pathroutes = $this->path_routes.'routes.php';
    include_once $pathroutes;
    $routes = new routes();
    $this->routes = $routes->routes_render();
    // var_dump($this->routes);
    $routes->routes_controllers($this->routes);
  }
}

?>
