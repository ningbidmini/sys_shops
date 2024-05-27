<?php
/**
 * Trait Header
 */
trait tpl_script {
  function tpl_script($param=array()){
    // echo "URL".$param['url'];
    // var_dump($param);
    $dataset = array(
      'jquery'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/js/jquery.min.js',
      ),
      'easing'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/js/jquery.easing.1.3.js',
      ),
      'bootstrap'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/js/bootstrap.min.js',
      ),
      'waypoints'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/js/jquery.waypoints.min.js',
      ),
      'carousel'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/js/owl.carousel.min.js',
      ),
      'countTo'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/js/jquery.countTo.js',
      ),
      'flexslider'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/js/jquery.flexslider-min.js',
      ),
      'main'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/js/main.js',
      ),
    );


  	// <!-- Modernizr JS -->
  	// <script src="js/modernizr-2.6.2.min.js"></script>
    $setcss = array();
    foreach ($dataset as $key => $value) {
      array_push($setcss,$this->tpl_script_render($value));
    }
    // var_dump($setcss);
    if(count($setcss)>0){
      return array('status'=>true,'script'=>$setcss);
    }
  }
  public function tpl_backend_script($param=array()){
    $dataset = array(
      'jquery'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/plugins/jquery/jquery.min.js',
      ),
      'validate'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/plugins/jquery-validation/jquery.validate.min.js',
      ),
      'bootstrap'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/plugins/bootstrap/js/bootstrap.bundle.min.js',
      ),
      'adminlte'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/dist/js/adminlte.min.js',
      ),
      'demo'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/dist/js/demo.js',
      ),
    );


    // <!-- Modernizr JS -->
    // <script src="js/modernizr-2.6.2.min.js"></script>
    $setcss = array();
    foreach ($dataset as $key => $value) {
      array_push($setcss,$this->tpl_script_render($value));
    }
    // var_dump($setcss);
    if(count($setcss)>0){
      return array('status'=>true,'script'=>$setcss);
    }
  }
  public function tpl_backend_pagescript($param=array()){
    $getpagescript = $this->tpl_backend_getscript(array('page'=>$param['page']));
    // var_dump($getpagescript);
    // var_dump($this->tpl_data_script($param));
    // exit;
    $dataset = array();
    foreach ($getpagescript as $key => $value) {
      $param['script']=$value;
      $dataset[$value] = $this->tpl_data_script($param);
    }
    // var_dump($dataset);
    $setcss = array();
    foreach ($dataset as $key => $value) {
      array_push($setcss,$this->tpl_script_render($value));
    }
    // var_dump($setcss);
    if(count($setcss)>0){
      return array('status'=>true,'script'=>$setcss);
    }
  }
  private function tpl_backend_getscript($param=array()){
    switch ($param['page']) {
      case 'auth':
        $dataset = array(
          'jquery',
          'bootstrap_bundle',
          'adminlte',
        );
      break;
    }
    return $dataset;
  }
  private function tpl_data_script($param=array()){
    $dataset = array(
      'jquery'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/plugins/jquery/jquery.min.js',
      ),
      'validate'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/plugins/jquery-validation/jquery.validate.min.js',
      ),
      'bootstrap'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/plugins/bootstrap/js/bootstrap.bundle.min.js',
      ),
      'adminlte'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/dist/js/adminlte.min.js',
      ),
      'demo'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/dist/js/demo.js',
      ),
      'bootstrap_bundle'=>array(
        'src'=>$param['url'].'/templates/'.$param['tpl_name'].'/plugins/bootstrap/js/bootstrap.bundle.min.js',
      ),
    );
    return $dataset[$param['script']];
  }
  private function tpl_script_render($param=array()){
    $dataset = array();
    foreach ($param as $key => $value) {
      array_push($dataset , $key.'="'.$value.'"');
    }
    return '<script '.implode(' ',$dataset).'></script>';
  }
}

?>
