<?php
/**
 * Model Authentication
 */
class authentication {
  use database;
  use config;
  use security;
  private $path_cert = './resources/data/cert/';
  function __construct($param=array()){
    // echo "Load Authication";
  }
  private function validtoken($param=array()){
    $dataexp = explode(',',$param['token']);
    $getcert = json_decode(base64_decode($dataexp[0]),true);
    // var_dump($getcert);
    if(count($getcert)>0){
      return array('status'=>true,'msg'=>'success');
    }else{
      return array('status'=>false,'msg'=>'not format certification');
    }
  }
  private function validcert($param=array()){
    $filecert = file_get_contents($this->path_cert.'certkey.json');
    $getcert = json_decode($filecert,true);
    return $getcert['cert'];
  }
  private function validpassword($param=array()){
    $datapwd = base64_encode(json_encode(array('email'=>$param['email'],'pwd'=>base64_encode(json_encode(array('pwd'=>$param['pwd']))))));
    return $this->validcert().','.$datapwd;
  }
  public function getauth($param=array()){
    if(isset($param['token'])){
      $statustoken = $this->validtoken(array('token'=>$param['token']));
      // var_dump($statustoken);
      if($statustoken['status']==true){
        // echo "true";
        // $getdata = $this->db_getselect();
        // var_dump($getdata);

        $sql = "select count(admin_email) as ncount from shp_administrators where admin_email='".$param['uid']."' and admin_password='".$this->validpassword(array('email'=>$param['uid'],'pwd'=>$param['pwd']))."' ";

        // var_dump($sql);
        $getstatus = $this->db_querysearch(array('sql'=>$sql));
        // var_dump($getstatus);
        if($)

      }else{
        return $statustoken;
      }
    }else{
      return array('status'=>false,'msg'=>'not token');
    }
  }
  public function getdatatoken($param=array()){
    if(file_exists($this->path_cert.'certkey.json')){
      // var_dump($this->path_cert.'certkey.json');
      $filecert = file_get_contents($this->path_cert.'certkey.json');
      $getcert = json_decode($filecert,true);
      // var_dump($getcert['cert']);
      $createdate = date('Y-m-d H:i:s');
      $expiredate = date('Y-m-d H:i:s',strtotime('+2 hours'));
      $tokendata = array(
        'createdate'=>$createdate,
        'expiredate'=>$expiredate,
      );
      $tokendata_encode = base64_encode(json_encode($tokendata));
      // var_dump($tokendata_encode);
      $token = $getcert['cert'].','.$tokendata_encode;
      return $token;
    }else{

    }
  }
}

?>
