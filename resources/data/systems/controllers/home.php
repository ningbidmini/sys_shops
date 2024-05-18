<?php
  /**
   * Home
   */
  class home {
    use devviews;
    function __construct($param=array()) {

    }
    function index(){
      echo "Home Controllers";
      $data_home = array(
        'license'=>'Tossapol',
      );
      $this->loadview('home',$data_home);
      $this->vw_render();
    }
  }

?>
