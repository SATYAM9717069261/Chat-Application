<?php
ob_start();
include('connection.php');
session_start();
if(sizeof($_SESSION) == 0){
        header("Location:Sign_up.php");
}
if(sizeof($_SESSION) == 3){
    echo"notEmpty";
    $id=$_SESSION['Social_Traders_id'];
    $pas=$_SESSION['Social_Traders_pas'];
    $chk_USER_VALID=$db->query("select * from reg where Email='$id'and Password='$pas'");
     $chk_ph=$db->query("select * from reg where Phone='$id' and Password='$pas'");
     include('connection_admin.php');
      $select=$db_admin->query("select * from admin where Email='$id' and Password='$pas' ");
         if($select->num_rows==1)
         {
                echo "SESSIOAN HERE";
                 header("Location:chk_admin.php");
         }

     if($chk_ph->num_rows==1)
       {  
               echo" valid Phone ";
                 header("Location:message.php");
         }
      if($chk_USER_VALID->num_rows==1){
              echo " valid Email";
           header("Location:message.php");
        }
     if($chk_USER_VALID->num_rows==0 &&  $chk_ph->num_rows==0){
                echo"invalid Both";
                  header("Location:Sign_up.php");
        }
}

?>


          