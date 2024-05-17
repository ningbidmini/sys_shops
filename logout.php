<?php session_start(); ?>
<?php
  unset($_SESSION['libs']);
  session_destroy();
?>
