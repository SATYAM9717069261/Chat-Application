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

$p="data:image/png;base64,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";

$dir="Users\\".$path;
   $extention="png";             
   $sec_extention="jpg";
            if($opendir=opendir($dir)){
                         while (($file = readdir($opendir)) !== FALSE)
                                   {
                                           if($file!='default_pic.jpg' && $file !== "." && $file != ".." && ( $extention==pathinfo($file,PATHINFO_EXTENSION) || $sec_extention==pathinfo($file,PATHINFO_EXTENSION)  )  ){
                                                $directory=$dir.'/'.$file;
                               echo "<img src='$dir/$file' alt='Image Here' class='img-thumbnail image_optamize' title='Opertaion' onclick='zoom_in(this)'></img>          
                                       <button type='button' class='btn-default' id='$file' style='width: 47px;height: 32px;border-radius: 10px;'  title='Add Profile Picture' onclick='set_profile(this)'>+</button>
                                       <button type='button' class='btn-default' id='$file' style='width: 47px;height: 32px;border-radius: 10px;'  title='Delete Picture' onclick='delete_pic(this)'> <image src='$p' style='height: 28px;width: 30px;' ></image> </button>";                                           }                                 
                                 }
               }

?>