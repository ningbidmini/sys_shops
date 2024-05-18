<?php
  /**
   * Trait Views
   */
  trait devviews {
    private $html = array();
    private $path_views = './resources/data/systems/views/';
    public function loadview($filename , $data=array()){
      // echo "Load Views";
      $pathfile = $this->path_views.$filename.'.php';
      if (file_exists($pathfile)) {
        ob_start();
        include $pathfile;
        $this->html[]=ob_get_contents();
        ob_end_clean();
      }else{
        $this->vw_error(array('error'=>'page not found :=>'.$pathfile));
      }

      // return $param;
    }
    public function vw_render($param=array()){
      // var_dump($this->html);
      $html=implode('',$this->html);
  		$html=preg_replace("/[\t\n\r]/","",$html);
  		$html=preg_replace('/\s\s+/',' ',$html);
  		echo $html;
    }
    private function vw_error($param=array()){
      var_dump($param);
    }
  }

?>
