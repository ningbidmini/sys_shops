<?php
/**
 * Trait Header
 */
trait tpl_header {
  function tpl_header_css($param=array()){
    // echo "URL".$param['url'];
    // var_dump($param);
    $dataset = array(
      'animate'=>array(
        'rel'=>'stylesheet',
        'href'=>$param['url'].'/templates/'.$param['tpl_name'].'/css/animate.css',
      ),
      'icomoon'=>array(
        'rel'=>'stylesheet',
        'href'=>$param['url'].'/templates/'.$param['tpl_name'].'/css/icomoon.css',
      ),
      'bootstrap'=>array(
        'rel'=>'stylesheet',
        'href'=>$param['url'].'/templates/'.$param['tpl_name'].'/css/bootstrap.css',
      ),
      'flexslider'=>array(
        'rel'=>'stylesheet',
        'href'=>$param['url'].'/templates/'.$param['tpl_name'].'/css/flexslider.css',
      ),
      'carousel'=>array(
        'rel'=>'stylesheet',
        'href'=>$param['url'].'/templates/'.$param['tpl_name'].'/css/owl.carousel.min.css',
      ),
      'theme'=>array(
        'rel'=>'stylesheet',
        'href'=>$param['url'].'/templates/'.$param['tpl_name'].'/css/owl.theme.default.min.css',
      ),
      'style'=>array(
        'rel'=>'stylesheet',
        'href'=>$param['url'].'/templates/'.$param['tpl_name'].'/css/style.css',
      ),
    );


  	// <!-- Modernizr JS -->
  	// <script src="js/modernizr-2.6.2.min.js"></script>
    $setcss = array();
    foreach ($dataset as $key => $value) {
      array_push($setcss,$this->tpl_header_render_css($value));
    }
    // var_dump($setcss);
    if(count($setcss)>0){
      return array('status'=>true,'css'=>$setcss);
    }
  }
  public function tpl_backend_css($param=array()){
    $dataset = array(
      'fontawesome'=>array(
        'rel'=>'stylesheet',
        'href'=>$param['url'].'/templates/'.$param['tpl_name'].'/plugins/fontawesome-free/css/all.min.css',
      ),
      'adminlte'=>array(
        'rel'=>'stylesheet',
        'href'=>$param['url'].'/templates/'.$param['tpl_name'].'/dist/css/adminlte.min.css',
      ),
      
    );


  	// <!-- Modernizr JS -->
  	// <script src="js/modernizr-2.6.2.min.js"></script>
    $setcss = array();
    foreach ($dataset as $key => $value) {
      array_push($setcss,$this->tpl_header_render_css($value));
    }
    // var_dump($setcss);
    if(count($setcss)>0){
      return array('status'=>true,'css'=>$setcss);
    }
  }
  private function tpl_header_render_css($param=array()){
    $dataset = array();
    foreach ($param as $key => $value) {
      array_push($dataset , $key.'="'.$value.'"');
    }
    return '<link '.implode(' ',$dataset).'/>';
  }
}

?>
