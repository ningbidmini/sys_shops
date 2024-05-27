<?php
  echo $data['html'];
?>
<script type="text/javascript">
  $(window).on('load' , function(evt){
    console.log('Auth Loaded');

    $('#txt_email').val('tossapol.c@dru.ac.th');
    $('#txt_password').val('test');

    $('#myform_login #btn_save').on('click' , function(evt){
      var uid = $('#myform_login #txt_email').val();
      var pwd = $('#myform_login #txt_password').val();
      var token = $('#myform_login #token').val();
      var login = fetch('../backend/authvalidate/'+uid+'/'+pwd+'/'+token).then((result)=>{return result.json();});
      login.then((result)=>{
        console.log('evt validate :=>',result);
      });
    });

    $('form').on('submit' , function(evt){
      console.log('Submit Ready!!');
      evt.preventDefault();
      return false;
    });

  });

</script>
