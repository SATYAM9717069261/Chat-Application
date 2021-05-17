<?php
$db=new mysqli('localhost','root','','socialwebsite');
if($db->connect_errno)
{
//echo $db->connect_error;
die("You are not Connected");
}

$link=$_POST['image_link'];


@session_start();
$email= $_SESSION['Social_Traders_id'];
$pas=$_SESSION['Social_Traders_pas'];
$chk_em=$db->query("select * from reg where Email='$email' and Password='$pas'");
$chk_ph=$db->query("select * from reg where Phone='$email' and Password='$pas'");
    if($chk_em->num_rows>0)
    {
          $user_name=$chk_em->fetch_assoc();  
          $path=$user_name[Email];
          $file=$user_name[Picture]; 
           }
      if($chk_ph->num_rows>0)
    {
          $user_name=$chk_ph->fetch_assoc();
          $path=$user_name[Email];    
          $file=$user_name[Picture];       
    }


if( ($chk_em->num_rows) + ($chk_ph->num_rows)==1){

$del='Users/'.$file.'/'.$link;
unlink($del);
}
?>