<?php
/**
 * Trait Database
 */
trait database
{
  private $db = null;
  function db_connect($param=array())
  {
    // echo "wait connect !!";
    //
    if($this->db == null){
      // var_dump($param);
      $this->db_connect_format($param);
    }
  }
  private function db_connect_format($param=array()){
    switch ($param['type']) {
      case 'pdo':
        $this->db = new PDO($this->renderconfig(array('category'=>$param['category'],'type'=>$param['type'],'data'=>array('host'=>$param['host'],'charset'=>$param['charset']) )),$param['uid'],$param['pwd'],$param['prop']);
      break;
    }
  }
  private function renderconfig($param=array()){

    switch ($param['type']) {
      case 'pdo':
        return $param['category'].':'.implode(';',$param['data']);
      break;
    }
  }
  private function db_error($param=array()){
    $dataset = array();
    switch ($param['err_category']) {
      case 'use_databasename':
        $dataset = array(
          'status'=>false,
          'msg'=>'Not Found Database Name!!',
        );
      break;
      case 'query_sql':
        $dataset = array(
          'code'=>$param['data'][0],
          'msg'=>$param['data'][2],
        );
      break;
    }
    return $dataset;
  }
  private function db_use_databasename($param=array()){
    try {
      $sqldb = 'use '.$param['dbname'];
      $this->db->query($sqldb);
    } catch (\Exception $e) {
      $geterr = $this->db_error($e);
      exit;
    }

  }
  public function db_getselect($param=array()){
    $dbconfig = $this->getconfig();
    // var_dump($dbconfig);
    // exit;
    $this->db_connect($dbconfig);
    $this->db_use_databasename(array('dbname'=>'dbshopping'));
    try {
      $sql="
      select * from shp_members;
      ";
      $query = $this->db->query($sql);
      $fetch = $query->fetchAll();
      // var_dump($fetch);
      // return
      if(count($fetch)>0){
        return array('status'=>true,'data'=>$fetch);
      }else{
        return array('status'=>false,'msg'=>'nothingdata');
      }

    } catch (PDOException $e) {
      // echo "<pre>";
      // var_dump($e->errorInfo);
      $geterr = $this->db_error(array('err_category'=>'query_sql','data'=>$e->errorInfo));
      // var_dump($geterr);
      $this->err_db($geterr);
      exit;
    }

    // var_dump($query);
    // var_dump($dbconfig);
    // $this->db_connect($param['dbconfig']);
  }
  public function db_querysearch($param=array()){
    $dbconfig = $this->getconfig();
    // var_dump($dbconfig);
    // exit;
    $this->db_connect($dbconfig);
    $this->db_use_databasename(array('dbname'=>'dbshopping'));
    try {
      // $sql="
      // select * from shp_members;
      // ";
      $sql=$param['sql'];
      $query = $this->db->query($sql);
      $fetch = $query->fetchAll();
      // var_dump($fetch);
      // return
      if(count($fetch)>0){
        return array('status'=>true,'data'=>$fetch);
      }else{
        return array('status'=>false,'msg'=>'nothingdata');
      }

    } catch (PDOException $e) {
      // echo "<pre>";
      // var_dump($e->errorInfo);
      $geterr = $this->db_error(array('err_category'=>'query_sql','data'=>$e->errorInfo));
      // var_dump($geterr);
      $this->err_db($geterr);
      exit;
    }
  }
}

?>
