<?php
 session_start();
if(sizeof($_SESSION) == 0){
   header("Location:index.php");
}
else{
@ session_start();
 $name=$_SESSION['Social_Traders_name'];
  $id=$_SESSION['Social_Traders_id'];
  $pas=$_SESSION['Social_Traders_pas'];


include('connection_admin.php');

$select=$db_admin->query("select * from admin where Email='$id' and Password='$pas' ");
   $user_name=$select->fetch_assoc();
  
    if( $select->num_rows==1 )
  {
      include("admin.html");
  }
  else{
     header("Location:index.php"); 
  }
}

?>