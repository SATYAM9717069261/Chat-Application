<?php
include_once('connection.php');
session_start();
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
        
$fileName=$_FILES["file_upload"]["name"];
$fileTmpLoc=$_FILES["file_upload"]["tmp_name"];
$fileType=$_FILES["file_upload"]["type"];
$fileSize=$_FILES["file_upload"]["size"];
$fileErrorMsg=$_FILES["file_upload"]["error"];
        if(!$fileTmpLoc){
              echo"Error ";
            exit();
           }
          if(move_uploaded_file($fileTmpLoc,"Users\\".$path."/$fileName")){
                echo"$fileName Uploaded Completed";
               // header("Location:gallry.php");
                echo $path;
              }
              else{
          echo"error";
           } 
?>