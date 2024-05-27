<?php
  /**
   * Controllers Backend
   */
  class backend {
    use libs;
    use devviews;
    use tpl_header;
    use tpl_script;
    function __construct($param=array()){
      // echo "Load Backend";
    }
    function authvalidate($param=array()){
      // var_dump($param);
      $auth = $this->lib_loadmodel('authentication');
      $authvalid = $auth->getauth(array('uid'=>$param[0],'pwd'=>$param[1],'token'=>$param[2]));
    }
    function auth($param=array()){
      $tplbackend = $this->lib_loadmodel('templates_backend');
      $auth = $this->lib_loadmodel('authentication');
      $token = $auth->getdatatoken();
      // var_dump($token);

      $getcss = $this->tpl_backend_css(array('url'=>$this->lib_base_url(),'tpl_name'=>$tplbackend->tpl_getname()));
      $getscript = $this->tpl_backend_pagescript(array('url'=>$this->lib_base_url(),'tpl_name'=>$tplbackend->tpl_getname(),'page'=>__FUNCTION__));

      if($getcss['status']==true){
        $datacss = $getcss['css'];
      }else{
        $datacss = array();
      }

      if($getscript['status']==true){
        $datascript = $getscript['script'];
      }else{
        $datascript = array();
      }

      // var_dump(__FUNCTION__);

      $tpl = $tplbackend->render(array(
        'page'=>__FUNCTION__,
        'title'=>'Auth',
        'css'=>implode('',$datacss),
        'script'=>implode('',$datascript),
        'token'=>$token,
        'url'=>$this->lib_base_url()
      ));
      // echo $tpl;
      // var_dump($tpl);
      $databody = array(
        'html'=>$tpl,
      );
      $this->loadview('backend_auth',$databody);
      $this->vw_render();
    }
    function index($param=array()){
      // echo "Index Backend";
      if(isset($_SESSION['auth'])){

      }else{
        echo "Not Login";
        header("location: ./backend/auth");
      }
    }
  }

?>
