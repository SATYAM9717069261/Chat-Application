
<?php 
    @session_start();  
    include_once('control_button_in_message_js.php'); 
     if(isset($_POST["logout_user"])){
         log_out();     
        } 
       if(isset($_POST["profile"])){
           header("Location:profile_update.php");
        }

        if(isset($_POST['Friend_list'])){
            friends();
        }
       if(isset($_POST['gallry'])){
           gallry();
       } 
       friends();          
 ?>