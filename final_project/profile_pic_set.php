
<?php
function prfile_pic(){
@session_start();
$db=new mysqli('localhost','root','','socialwebsite');
if($db->connect_errno)
{
//echo $db->connect_error;
die("You are not Connected");
}
$email= $_SESSION['Social_Traders_id'];
$pas=$_SESSION['Social_Traders_pas'];
$chk_em=$db->query("select * from reg where Email='$email' and Password='$pas'");
$chk_ph=$db->query("select * from reg where Phone='$email' and Password='$pas'");
    if($chk_em->num_rows>0)
    {
          $user_name=$chk_em->fetch_assoc();   
          $path=$user_name['Picture'];   
           }
      if($chk_ph->num_rows>0)
    {
          $user_name=$chk_ph->fetch_assoc();   
         $path=$user_name['Picture'];   
        
    }

$email= $_SESSION['Social_Traders_id'];
$pas=$_SESSION['Social_Traders_pas'];
$chk_em_profile=$db->query("select * from profile_pic where Email='$email' and pas='$pas'");
$chk_ph_profile=$db->query("select * from profile_pic where Phone='$email' and pas='$pas'");
    if($chk_em_profile->num_rows>0)
    {
          $user_name=$chk_em_profile->fetch_assoc();   
          $path_profile_pic=$user_name['Profile_pic'];   
           }
      if($chk_ph_profile->num_rows>0)
    {
          $user_name=$chk_ph_profile->fetch_assoc();   
         $path_profile_pic=$user_name['Profile_pic'];   
        
    }            

$dir="Users\\".$path."\\".$path_profile_pic;
echo "<img style='float: right; height:78px; border-radius:22px;' src='$dir' alt='Profile picture' class='img-circle'>";  
}
?>
