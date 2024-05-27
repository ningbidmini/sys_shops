<?php
  /**
   * Model Images
   */
  class images {

    function __construct($param=array()){
      // echo "load Image";
    }
    private function img_file_mimetype($param=array()){
      switch ($param['ext']) {
        case 'jpg':
          return 'image/jpg';
        break;
        case 'jpeg':
          return 'image/jpg';
        break;
      }
    }
    function img_render($param=array()){
      $dataset = array();
      foreach ($param as $key => $value) {
        // var_dump($value);
        // $path = $value['url'].'/templates/'.$value['tpl_name'].'/';
        $path = './templates/'.$value['tpl_name'].'/';
        $setfilename=$path.$value['filename'];
        $getinfo = pathinfo($setfilename,PATHINFO_EXTENSION);
        // var_dump($getinfo);
        // $extension = $this->img_file_mimetype(array('ext'=>$getinfo['extension']));
        $extension = 'image/'.$getinfo;
        $pathfile = base64_encode(file_get_contents($setfilename));
        // var_dump(pathinfo($pathfile));
        $strimg = 'data:'.$extension.';'.'base64'.','.$pathfile;
        // var_dump($strimg);
        // return $strimg;
        $dataset[$key]=$strimg;
      }
      return $dataset;
    }
  }

?>
