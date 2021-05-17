<?php

include_once('connection.php');
@session_start();
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

$dir="Users\\".$path;
   $extention="mp4";             
            if($opendir=opendir($dir)){
                         while (($file = readdir($opendir)) !== FALSE)
                                   {
                                           if($file !== "." && $file != ".." && $extention==pathinfo($file,PATHINFO_EXTENSION)){
                                                $directory=$dir.'/'.$file;                                      
          echo"<div class='col-md-6'><video width='320' height='240' style='margin-left: 11px' controls><source src='$dir/$file' type='video/mp4'>
        <source src='$dir/$file' type='video/ogg'>
        Your browser does not support the Your Browser.    
           </video>
     
     <button type='button' class='btn-default' id='$file' style='width: 47px;height: 32px;border-radius: 10px;'  title='Delete Vedio' onclick='delete_pic(this)'> <image src='$p' style='height: 28px;width: 30px;' ></image> </button>
     </div>";
                                                                        }
                                 }
               }

?>


