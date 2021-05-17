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


$result=$db->query("select * from users where id='$name' ");
$rows=$result->fetch_assoc();
$friends_table=$rows['Friend_table_Name'];

$find=$db->query("select * from $friends_table where friendlist='$Email' ");
if($find->num_rows ==1){

}else{
$friend_name=$rows['Name']; 
$radem=rand(1000,9000);
$table_name=$Name.$radem.$friend_name;

$result=$db->query("insert into $friends_table values(Null,'$Email','$table_name')");

$result2=$db->query("select * from users where id='$Email' ");
$rows2=$result2->fetch_assoc();
$friends_table=$rows2['Friend_table_Name'];
$result=$db->query("insert into $friends_table values(Null,'$name','$table_name')");

$friends_chat_table="  create table $table_name(
    id Int PRIMARY KEY AUTO_INCREMENT,
    Email text,
    Name text,
    message text
    ) ";
  mysqli_query($db,$friends_chat_table);
 }
?>
