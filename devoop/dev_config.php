<?php
/**
 * Trait Config
 */
trait config {
  // private
  private $setconfig = array();
  private $path_config = './resources/data/config/';
  private $filename_config = 'config.json';
  private $dsn=null;
  private $dbconfig = null;
  function __construct(){
    $this->setconfig();
  }
  private function setconfig(){
    if($this->dbconfig==null){
      $getfile = json_decode(file_get_contents($this->path_config.$this->filename_config),true);      
      $this->dbconfig = $getfile;
      $this->dbconfig = $this->decodeconfig(array('data'=>$getfile['dbconfig']));
    }else{
    }
    // var_dump($getfile);
  }

  public function getconfig(){
    $this->setconfig();
    return $this->dbconfig;
  }
}

?>
