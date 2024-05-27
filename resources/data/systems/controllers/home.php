<?php
  /**
   * Home
   */
  class home {
    use libs;
    use devviews;
    use tpl_header;
    use tpl_script;
    function __construct($param=array()) {

    }
    function index(){
      // echo "Home Controllers";
      // $this->testcontrollers();
      $tpl = $this->lib_loadmodel('templates');
      $img = $this->lib_loadmodel('images');

      $tpl_header = $this->tpl_header_css(array('url'=>$this->lib_base_url(),'tpl_name'=>$tpl->tpl_getname()));
      $tpl_script = $this->tpl_script(array('url'=>$this->lib_base_url(),'tpl_name'=>$tpl->tpl_getname()));
      // var_dump($tpl_header);
      // var_dump($tpl_script);
      if($tpl_header['status']==true){
        $dataheader = implode(' ',$tpl_header['css']);
      }
      if($tpl_script['status']==true){
        $datascript = implode(' ',$tpl_script['script']);
      }
      // var_dump($dataheader);
      // $dataset = $tpl->db_getselect();
      // var_dump($dataset);

// images/img_bg_2.jpg
      // Load Image
      $dataimage = $img->img_render(array(
        'slide'=>array('url'=>$this->lib_base_url(),'tpl_name'=>$tpl->tpl_getname(),'filename'=>'images/img_bg_2.jpg'),
      ));

      // var_dump($dataimage);

      $tpl_body = $tpl->tpl_home(array(
        'img'=>$dataimage,
      ));
      // var_dump($tpl_body);

      $data_home = array(
        'license'=>'Tossapol',
        'header'=>implode(' ',$tpl_header['css']),
        'script'=>implode(' ',$tpl_script['script']),
        'tpl'=>$tpl_body,
      );
      $this->loadview('home',$data_home);
      $this->vw_render();
    }
  }

?>
