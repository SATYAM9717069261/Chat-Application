<?php

function update(){ 
 $name_update=$_POST['User_name_update'];
 $DOB_update=$_POST['DOB_update'];
 $gender_update=$_POST['Gender_update'];
 $pas1_update=$_POST['Pas1_update'];
 $pas2_update=$_POST['Pas2_update'];
 include('connection.php');

$chk_log_id =$_SESSION['Social_Traders_id'];
$chk_log_pas =$_SESSION['Social_Traders_pas'];
$chk_ph=$db->query("select * from reg where Phone='$chk_log_id' and Password='$chk_log_pas'");
$chk_em=$db->query("select * from reg where Email='$chk_log_id' and Password='$chk_log_pas'");
     if($chk_ph->num_rows==1)
       {   
           $user_name=$chk_ph->fetch_assoc();   
            $email_update=$user_name['Email'];
         }
      if($chk_em->num_rows==1){
         $user_name=$chk_em->fetch_assoc();   
          $email_update= $user_name['Email'];
  }
 
 if(($chk_em->num_rows==0) && ($chk_ph->num_rows==0)) {
  header("Location:index.php");
 }

  if( (chk_pas($pas1_update,$pas2_update))==3 && strlen($name_update)!=0 && strlen($DOB_update)!=0 && strlen($gender_update)!=0 && strlen($pas1_update)!=0  ){
            echo("<script> alert('call SUcessfull');</script>");
     $update_reg=$db->query("update reg set Name='$name_update' , DOB='$DOB_update' , Gender='$gender_update' , Password='$pas1_update' where Email='$email_update' ");
     $update_profile_pic=$db->query("update profile_pic set pas='$pas1_update' where Email='$email_update' ");   
     $update_users=$db->query("update users set Name='$name_update' where id='$email_update' ");
      
   $chk_friend_table=$db->query("select * from users where id='$email_update' ");
            $user_name=$chk_friend_table->fetch_assoc();   
            $friend_table_name=$user_name['Friend_table_Name'];

 $chk_chat_table=$db->query("select * from $friend_table_name ");
 $field= $chk_chat_table->fetch_all(MYSQLI_ASSOC);
  foreach($field as $row){
             $table_name=$row['chat_table_name'];
                       $update_chat=$db->query("update $table_name set Name='$name_update' where Email='$email_update' ");
          }
      echo"<script> alert('Update SucessFull You Need To Re-Login '); </script>";
          unset($_SESSION['Social_Traders_name']);
          unset($_SESSION['Social_Traders_id']);
          unset($_SESSION['Social_Traders_pas']);  
          header("Location:index.php");      
    }
  else{
     Error("Fill This Form Correctly ");
      }   
}

function chk_pas($F_pas,$S_pas){
          $pos=0;
                  for($i=1;$i<=9;$i++){
                           if(strrpos($F_pas,"".$i)>0){ $pos=1; break;}
                                else $pos=0;
                                     }
                  $chk_upper_var=0;
                   $charac =array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
          for ($ch=0; $ch<sizeof($charac); $ch++) {
                     if(strrpos($F_pas,$charac[$ch])>=0)  { $chk_upper_var=1;  break;}
                     else  $chk_upper_var=0;
                   }
                      $cmp=0;
                    if(strcmp($F_pas,$S_pas)==0){ $cmp=1; }
                    else $cmp=0;
                   return $chk_upper_var+$pos+$cmp;
 }
function Error($mes){
$a="<!DOCTYPE html>
<html><head>  <title></title>
  <link href='signin.css' rel='stylesheet'>
</head>
<body onload=showDialog() >
    <div class='white-background' id='outer'></div>
   <form method='POST'> <div class='dlgbox' id='inner'>
        <div class='dlg-header'>Try Again</div>
        <div class='dlg-body'> $mes </div>
        <div class='dlg-footer'>
        <button  autofocus style='cursor:pointer;' name='Error' class='btn btn-danger' onclick='dlglogin()' >OK</button>
            </div>
    </div></form> 
</body>
</html>";
 echo $a;
}
?>

<script type='application/javascript'>
        function dlglogin() {
            var whitebg = document.getElementById("outer");
            var dlg = document.getElementById("inner");
            whitebg.style.display = "none";
            dlg.style.display = "none";
            window.location.assign("Sign_up.php");
        }
        function showDialog() {
            var whitebg = document.getElementById("outer");
            var dlg = document.getElementById("inner");
            whitebg.style.display = "block";
            dlg.style.display = "block ";
            var winWidth = window.innerWidth;
            var winheight = window.innerHeight;
            dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
            dlg.style.top = "150px";
        }
   </script>
  

<style>
        .white-background {
            display: none;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0px;
            left: 0px;
            background-color: #fefefe;
            opacity: 0.7;
            z-index: 9999;
        }
        
        .dlgbox {
            display: none;
            position: fixed;
            width: 480px;
            z-index: 9999;
            border-radius: 10px;
            background-color: #7c7d7e;
        }
        .dlg-header {
            background-color: #6d84b4;
            color: white;
            font-size: 20px;
            padding: 10px;
            margin: 10px 10px 0px 10px;
        }
        
        .dlg-body {
            background-color: white;
            color: black;
            font-size: 14px;
            padding: 10px;
            margin: 0px 10px 0px 10px;
        }
        
        .dlg-footer {
            background-color: #f2f2f2;
            text-align: right;
            padding: 10px;
            margin: 0px 10px 10px 10px;
        }
        

  </style>