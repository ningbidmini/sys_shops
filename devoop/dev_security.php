<?php
/**
 * Trait Security
 */
trait security {
  function testsecurity($param=array()){
    echo "test Security";
  }
  public function gendbconfig($param=array()){
    $getdata=$this->renderdbconfig(array('data'=>$param['data']));
    if(file_exists($this->path_cert.'certkey.json')){
      // var_dump($getdata);
      $getkey = json_decode(file_get_contents($this->path_cert.'certkey.json'),true);
      // var_dump($getkey);
      $setkey = $getkey['cert'];
      $dataset = array(
        'dbconfig'=>$setkey.'.'.$getdata,
      );
      // var_dump($dataset);
      // echo json_encode($this->validconfig(array('data'=>$dataset['dbconfig'])));
      $valid = $this->validconfig(array('data'=>$dataset['dbconfig']));
      // var_dump($valid);
      if($valid['status']==true){
        $createstatus = $this->createdbconfig(array('data'=>$dataset['dbconfig']));
        // var_dump($createstatus);
        echo json_encode($createstatus);
        return $createstatus;
      }
    }else{
      header('HTTP/1.0 404 Not Found',true,404);
      die();
    }
  }
  private function renderdbconfig($param=array()){
    return base64_encode(json_encode($param['data']));
  }
  private function validconfig($param=array()){
    // var_dump($param);
    $expdata = explode('.',$param['data']);
    // var_dump($expdata);
    $validkey = $this->validkey1(array('data'=>$expdata[0]));
    // var_dump($validkey);
    if(gettype($validkey)=='array'){
      $getdb = json_decode(base64_decode($expdata[1]),true);
      // var_dump($getdb);
      if(gettype($getdb)=='array'){
        return array('status'=>true,'msg'=>'success');
      }else{
        return array('status'=>false,'msg'=>'invalid DBConfig Format');
      }
    }else{
      return array('status'=>false,'msg'=>'invalid Format Key :');
    }
  }
  private function decodeconfig($param=array()){
    // var_dump($param);
    $valid = $this->validconfig(array('data'=>$param['data']));
    if($valid['status']==true){
      $expdata = explode('.',$param['data']);
      $dbconfig = json_decode(base64_decode($expdata[1]),true);
      // var_dump($dbconfig);
      if(count($dbconfig)>0){
        return $dbconfig;
      }else{
        return array('status'=>false,'msg'=>'invalid not format');
      }
    }
  }
  private function createdbconfig($param=array()){
    $filename='config.json';
    $dataset = array(
      'dbconfig'=>$param['data'],
    );
    file_put_contents($this->path_config.$filename,json_encode($dataset));
    if(file_exists($this->path_config.$filename)){
      return array('status'=>true,'msg'=>'create file config success');
    }else{
      return array('status'=>false,'msg'=>'not create file:=>'.$filename);
    }
  }
  public function genkey1($param=array()){

    $getdata = $this->renderkey1(array('data'=>$param['data']));
    // var_dump($getdata);
    // $type = 'config/key';
    // $dataset = 'data:' . $type . ';base64,' . $getdata;
    // var_dump($dataset);
    $valid = $this->validkey1(array('data'=>$getdata));
    // var_dump($valid);
    if(gettype($valid)=='array'){
      // echo gettype($valid);
      echo json_encode($this->createkey1(array('data'=>$getdata)));
      // if($this->createkey1(array('data'=>$valid))['status']==true){
      //   return $
      // }
    }else{
      echo "invalid format data!!";
    }
  }
  private function renderkey1($param=array()){
    return base64_encode(json_encode($param['data']));
  }
  private function validkey1($param=array()){
    return json_decode(base64_decode($param['data']),true);
  }
  private function createkey1($param=array()){
    $filename = 'certkey.json';
    $dataset = array(
      'cert'=>$param['data'],
    );
    file_put_contents($this->path_cert.$filename,json_encode($dataset));
    if(file_exists($this->path_cert.$filename)){
      return array('status'=>true,'msg'=>'success');
    }else{
      return array('status'=>false,'msg'=>'not create file:=>'.$filename);
    }
  }
}

?>
