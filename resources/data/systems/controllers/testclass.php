<?php
/**
 * Test Class
 */
class testclass
{

  public function index($param=array()){
    echo "Test Controller";
  }
  public function testmethod($param=array()){
    echo "Method Controllers ";
    var_dump($param);
  }
}

?>
