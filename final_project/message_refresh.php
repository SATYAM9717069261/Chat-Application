<?php
@include_once('connection.php');

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
           $path=$user_name['Picture'];
                    }
      if($chk_em->num_rows==1){
         $user_name=$chk_em->fetch_assoc();   
         $Email= $user_name['Email'];
          $path=$user_name['Picture'];  
         $Name=$user_name['Name'];
 }



$chk_em_profile=$db->query("select * from profile_pic where Email='$chk_log_id' and pas='$chk_log_pas'");
$chk_ph_profile=$db->query("select * from profile_pic where Phone='$chk_log_id' and pas='$chk_log_pas'");
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

$to=$_POST['to'];






$chk_em=$db->query("select * from reg where Email='$to' ");
     if($chk_ph->num_rows==1)
       {   
           $user_name=$chk_ph->fetch_assoc();   
           $path2=$user_name['Picture'];
                    }
      if($chk_em->num_rows==1){
         $user_name=$chk_em->fetch_assoc();
          $path2=$user_name['Picture'];  
 }


$chk_ph_profile=$db->query("select * from profile_pic where Email='$to'");
    if($chk_em_profile->num_rows>0)
    {
          $user_name=$chk_em_profile->fetch_assoc();   
          $path_profile_pic_res=$user_name['Profile_pic'];   
           }
      if($chk_ph_profile->num_rows>0)
    {
          $user_name=$chk_ph_profile->fetch_assoc();   
         $path_profile_pic_res=$user_name['Profile_pic'];   
        
    }            

$dir2="Users\\".$path2."\\".$path_profile_pic_res;

$result2=$db->query("select * from users where id='$Email' ");
$rows2=$result2->fetch_assoc();
$friends_table=$rows2['Friend_table_Name'];



$select_message=$db->query("select * from  $friends_table where friendlist='$to' ");
$rows3=$select_message->fetch_assoc();
$friends_list_table=$rows3['chat_table_name'];

$select_all_message=$db->query("select * from $friends_list_table ORDER by id DESC");

$total= $select_all_message->num_rows;

while ( $extract= mysqli_fetch_array($select_all_message) ) {
if( $Name != $extract['Name']){
  echo" <div class='row'>
         <div class='col-md-8' style=' float:left;background-color:#80BD9E; margin-top:5px;'>      
         <img class='col-md-2 media-object' style='height:51px; width:91px; margin:12px; border-radius: 43%;'  src='$dir2' alt='...'>             
         <div class='col-md-8' style='margin: 29px; text-align: left;'>".$extract['message']."</div>
         </div>
      </div>";
      }else{
      echo" <div class='row'>
         <div class='col-md-8' style=' float:right;background-color:#89DA59;margin-top:5px;'>  
         <img class='col-md-2 media-object' style='height:51px; width:91px; margin:12px; border-radius: 43%; float:right'  src='$dir' alt='...'>    
         <div class='col-md-8' style='margin: 29px; text-align: right;'>".$extract['message']."</div>
         </div>
        </div>";
      }

   }
?>