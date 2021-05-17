<?php
@include_once('connection.php');
$name=$_GET['search'];
 @session_start();
$chk_log_id =$_SESSION['Social_Traders_id'];
$chk_log_pas =$_SESSION['Social_Traders_pas'];
$chk_ph=$db->query("select * from reg where Phone='$chk_log_id' and Password='$chk_log_pas'");
$chk_em=$db->query("select * from reg where Email='$chk_log_id' and Password='$chk_log_pas'");
     if($chk_ph->num_rows==1)
       {   
           $user_name=$chk_ph->fetch_assoc();   
           $Email=$user_name['Email'];
           $Name=$user_name['Name'];
                    }
      if($chk_em->num_rows==1){
         $user_name=$chk_em->fetch_assoc();   
         $Email= $user_name['Email'];
         $Name=$user_name['Name'];
 }


$name=$_GET['search'];

$result=$db->query("select * from reg where Name LIKE '%".$name."%'");
while ($row=mysqli_fetch_array($result)) {
 if( $Email != $row['Email']){
    $name= $row['Name'];
    $id=$row['Email'];
   echo" <li class='list-group-item' id='$id' title='$id' onclick='show_message(this)'>$name</li>";
   }
}
?>