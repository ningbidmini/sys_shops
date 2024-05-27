<?php
// namespace libs\mylibs;
/**
 * Trait Library
 */
trait libs {
  private $path_models = './resources/data/systems/models/';
  function testlibs($param=array()){
    echo "Test Libs";
  }
  function testcontrollers($param=array()){
    echo "Test Libs Controllers";
  }
  public function lib_loadmodel($filename=null){
    $pathfile = $this->path_models.$filename.'.php';
    if(file_exists($pathfile)){
      include_once $pathfile;
      return new $filename();
    }else{
      $this->lib_error(array('error'=>'File not found :=>'.$filename));
    }
  }
  public function lib_base_url(){
    return pathinfo($this->lib_base_host().$_SERVER['SCRIPT_NAME'])["dirname"];
  }
  public function lib_base_host() {return(strtolower($this->lib_base_protocol().$_SERVER['HTTP_HOST']));}
  function lib_base_protocol() {return((isset($_SERVER['HTTPS'])&&($_SERVER['HTTPS']=='on'))?'https://':'http://');}
  public function lib_error($param=array()){
    var_dump($param);
  }
}

?>
