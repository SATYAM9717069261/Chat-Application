<?php
// don't remove ob_start() it can help to redirect 
ob_start();
$mes='';

function pic_default_move($delault_pic,$user_dir){
copy($delault_pic,"Users\\".$user_dir."\\".$delault_pic);
}

function mes(){
    global $mes;
$a=" 
<body onload=showDialog() >
    <div class='white-background' id='outer'></div>
    <div class='dlgbox' id='inner'>
        <div class='dlg-header'>Try Again</div>
        <div class='dlg-body'> $mes </div>
        <div class='dlg-footer'>
        <button  autofocus style='cursor:pointer;' onclick='dlglogin()'> OK </button>
        </div>
    </div> 
</body>";
 echo $a;
}
 function insertuser(){
     include('connection.php');
     if(isset($_POST['add_user'])){
      global $mes;
      $nam_var=$_POST['name'];
      $pas_var=$_POST['pas'];
      $email_var=$_POST['email']; 
      $ph_var=$_POST['phon'];
if(strlen($nam_var)!=0 && strlen($ph_var)==10 && chk_pas($_POST['pas'],$_POST['S_Pass'])==3 ){
     $chk_email=$db->query("select * from reg where Phone='$ph_var'");
     $chk_ph=$db->query("select * from reg where Email='$email_var'");
     if(($chk_email->num_rows)>0 || ($chk_ph->num_rows)>0)
      {
           $chk_email_ph=$db->query("select * from reg where Phone='$ph_var'"); 
           if(($chk_email_ph->num_rows)>0){     
                $chk_email_ph=$db->query("select * from reg where Email='$email_var'");
                if(($chk_email_ph->num_rows)>0){
                     $mes="Email and Phone Number <br/>is Already Use"; mes(); }
                else{
                     $mes="Phone Number <br/>is Already Use"; mes(); }
                  }
            else{
                      $chk_email_ph=$db->query("select * from reg where Email='$email_var'");
                    if(($chk_email_ph->num_rows)>0){     
                        $chk_email_ph=$db->query("select * from reg where Phone='$ph_var'");
                         if(($chk_email_ph->num_rows)>0){ 
                             $mes="Email and Phone Number <br/>is Already Use";  mes(); }
                        else{ 
                            $mes="Email  <br/>is Already Use"; mes(); }
                }    
                  }
       }
     else{ 
$user_dir=make_directory($email_var,$ph_var);
$result=$db->query("insert into reg values('$nam_var','$email_var','$ph_var','$user_dir','None',CURRENT_DATE(),'$pas_var')");
$delault_pic="default_pic.jpg";  
$profile_pic=$db->query("insert into profile_pic values('$email_var','$pas_var','$ph_var','$delault_pic')");
pic_default_move($delault_pic,$user_dir);

include_once('insert_friend.php');

$mes="Sucessfull Registration"; mes();
         }  
    } 
 else{
               $mes="Fill this Form Correctly"; mes();
    } 
  }
elseif(isset($_POST['log_in_user'])){
global $mes;
$chk_log_id=$_POST['id_chk_user'];
$chk_log_pas=$_POST['pas_chk_user'];
$chk_ph=$db->query("select * from reg where Phone='$chk_log_id' and Password='$chk_log_pas'");
$chk_em=$db->query("select * from reg where Email='$chk_log_id' and Password='$chk_log_pas'");
   include('connection_admin.php');
   $select=$db_admin->query("select * from admin where Email='$chk_log_id' and Password='$chk_log_pas' ");

     if($chk_ph->num_rows==1)
       {   
           $user_name=$chk_ph->fetch_assoc();   
           $name=$user_name['Name'];
           another_page($chk_log_id,$chk_log_pas,$name); 
        }
      if($chk_em->num_rows==1){
         $user_name=$chk_em->fetch_assoc();   
         $name= $user_name['Name'];
         another_page($chk_log_id,$chk_log_pas,$name); 
         }

         if($select->num_rows==1)
         {
             $user_name=$select->fetch_assoc();
             $name=$user_name['Name'];
             admin($chk_log_id,$chk_log_pas,$name);
         }

    if(($chk_em->num_rows==0) && ($chk_ph->num_rows==0)){
            $mes="Wrong id and Password";   
         mes();   
        }
  }
}


function admin($id,$pas,$name){  
   session_start();
   $_SESSION['Social_Traders_name']="$name";
   $_SESSION['Social_Traders_id']="$id";
   $_SESSION['Social_Traders_pas']="$pas";
   header("Location:chk_admin.php");
}

// validation Check
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

function another_page($id,$pas,$name){  
   session_start();
   $_SESSION['Social_Traders_name']="$name";
   $_SESSION['Social_Traders_id']="$id";
   $_SESSION['Social_Traders_pas']="$pas";
   header("Location:message.php");
}

function make_directory($email_id,$ph_var){
$radem=rand(1000,9000);  
$curentdir=getcwd()."\\Users\\";
mkdir($curentdir."/".$email_id.$radem.$ph_var,0777);
$user_dir=$email_id.$radem.$ph_var;
return $user_dir;
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
        
        .dlg-footer button {
            background-color: #6d84b4;
            color: white;
            padding: 5px;
            border: 0px;
        }
    </style>