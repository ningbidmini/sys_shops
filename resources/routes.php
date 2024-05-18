<?php
  /**
   * Routes
   */
  class routes {
    private $path_controllers = "./resources/data/systems/controllers/";
    function __construct($param=array()){

    }
    public function testroutes(){
      echo "Test Routes";
    }
    public function routes_base_uri() {
    	$req=$_SERVER['REQUEST_URI']??'';
    	$path=pathinfo($_SERVER['SCRIPT_NAME'])["dirname"];
    	if (strlen($path)>1) $uri=str_replace($path,'',$req);
    	else $uri=$req;
    	return(trim(trim($uri,'/'),'?'));
    }
    public function routes_render(){
      // var_dump($this->base_uri());
      $con='home';
      $func='index';
      $param=array();
      if (strlen($this->routes_base_uri())>0) {
        $qry=explode("?",$this->routes_base_uri());
        $qry=explode("/",$qry[0]);
        if (isset($qry[0])&&(strlen($qry[0])>0)) $con=$qry[0];
        if (isset($qry[1])&&(strlen($qry[1])>0)) $func=$qry[1];
        if (isset($qry[2])&&(strlen($qry[2])>0)) $param=array_slice($qry,2);
      }
      // var_dump($qry);
      return array('controllers'=>$con,'method'=>$func,'param'=>$param);
    }
    public function routes_controllers($param){
      $pathcontrollers = $this->path_controllers.$param['controllers'].".php";
      var_dump($pathcontrollers);
      $classname = $param['controllers'];
      $methodname = $param['method'];
      if(file_exists($pathcontrollers)){
        // echo "True";
        include_once $pathcontrollers;
        $setobj = new $classname();
        if(method_exists($setobj,$param['method'])){
          echo "Method True";
          $setobj->$methodname($param['param']);
        }
      }else{
        $this->routes_error(array('error'=>'Not Found => '.$pathcontrollers));
      }
    }
    private function routes_error($param=array()){
      var_dump($param);
    }
  }

?>
