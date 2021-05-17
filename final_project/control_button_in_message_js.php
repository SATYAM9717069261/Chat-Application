 <?php 
   function log_out(){
          unset($_SESSION['Social_Traders_name']);
          unset($_SESSION['Social_Traders_id']);
          unset($_SESSION['Social_Traders_pas']);  
          @header("Location:index.php");
         }
    function friends(){
      @include_once('friends.html');
    }
    function  gallry(){
     @include_once("gallry.php");     
    }
    
?>