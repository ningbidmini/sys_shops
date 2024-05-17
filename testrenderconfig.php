<?php
  /**
   * Templates Render Config
   */
  class renderconfig {
    private $path_cert = './resources/data/cert/';
    private $path_config = './resources/data/config/';
    private $db = array();
    function __construct($param=array()){

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

  $ren = new renderconfig();

  // DB Config
  $getdb = $ren->gendbconfig(array(
    'data'=>array(
      'host'=>'localhost',
      'uid'=>'root',
      'pwd'=>'password',
      'port'=>'3306',
      'charset'=>'utf8',
      'category'=>'mysql',
      'type'=>'pdo',
      'prop'=>array(
				\PDO::ATTR_EMULATE_PREPARES => false,
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
				\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
			),
    ),
  ));
  // var_dump($getdb);

  // genKey1
  // $getren = $ren->genkey1(array('data'=>array('email'=>'syberia.hugy@gmail.com','createdate'=>date('Y-m-d H:i:s.u'))));
  // $getren = $ren->genkey1(array('data'=>'ccccc'));
?>
