<?php
/**
 * Trait Error
 */
trait tplerror {
  function err_db($param=array()){
    echo '<h2 style="color:red;">Code :=> '.$param['code'].'; msg :=> '.$param['msg'].'</h2>';
  }
}

?>
