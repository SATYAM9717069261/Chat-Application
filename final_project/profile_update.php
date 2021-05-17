<?php
include_once('connection.php');

ob_start(); 
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
           $DOB=$user_name['DOB'];
         }
      if($chk_em->num_rows==1){
         $user_name=$chk_em->fetch_assoc();   
         $Email= $user_name['Email'];
         $Name=$user_name['Name'];
         $DOB=$user_name['DOB'];
 }
              if($chk_em->num_rows==0 &&  $chk_ph->num_rows==0){
                  header("Location:index.php");
              }
?> 
<html>
<head>
    <title> Profile Update</title>
<link rel='stylesheet' type='text/Css' href='signin.css'>
</head>
<body>
<form method='POST'>
    
    <div  id='profile_update'>
        <div class='col-md-12'style='text-align:center;'>
            <!-- background form -->
            <div class='col-md-12' style='background-color: #428bca; text-align: center;'>
                <div>
                    <div class='row cross' style='margin-top: 3px;background-color: #286090'>
                        <div class='col-xs-4'>
                            <label class='btn' style='font-size:20px; margin-left:1px; padding:0px;' role='button' onclick='show_images()'>Your Profile</label>
                        </div>
                        <button class='col-xs-1 btn btn-info' style='float:right;' name='Cross_Update_Profile' onclick='hide_update_profile()'>X</button>
                    </div>
 
                </div>
                <!--under form data-->
                <div>
                    <button type='button' id='btn_edit' style='float: left;' class='btn btn-warning' onclick='form_show()'>EDIT</button>

                    <fieldset id='form_operation' disabled>
                        <!--disabled-->
                        
                          
                        <div class='form-horizontal' >
                            <div class='form-group'>
                                <label class='col-sm-4 control-label'>Email</label>
                                <div class='col-sm-8'>
                                    <p class='form-control-static' id='Email'><?php echo $Email; ?></p>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label for='username' class='col-sm-4 control-label'>Name</label>
                                <div class='col-sm-8'>
                                    <input type='text'  name='User_name_update' class='form-control' minlength='2' value="<?php echo $Name; ?>" id='username' placeholder='Name'>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label for='date_of_birth' class='col-sm-4 control-label'>Your date of Birth</label>
                                <div class='col-sm-8'>
                                    <input type='date' name='DOB_update' class='form-control' id='date_of_birth' value="<?php echo $DOB; ?>" placeholder='Your date of Birth'>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label for='gender' class='col-sm-4 control-label'>Gendar</label>
                                <div class='col-sm-8'>
                                    <select name='Gender_update' class='form-control' id='gender'>
                                   <option  selected hidden>Select Gender</option>
                                    <option value='Male' style='color:black;'>Male</option>
                                    <option  value='Female'style='color:black;'>Femail</option>
                              </select>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label for='inputPassword' class='col-sm-4 control-label'>Password</label>
                             <div class='col-sm-8'>
                                    <input type='password' name='Pas1_update' class='form-control' id='inputPassword' placeholder='Password' onkeyup='chk_pas()'>
                                </div>
                                <label id='uper_lbl'>
                                      <input id='uper_case'disabled type='checkbox'>Upper Case
                                </label>
                                <label id='num_lbl'>
                                      <input id='number'disabled type='checkbox'> Number
                                </label>

                            </div>

                            <div class='form-group'>
                                <label for='conf_Password' class='col-sm-4 control-label'>Conform Password</label>
                                <div class='col-sm-8'>
                                    <input type='password'  name='Pas2_update' class='form-control' onkeyup='chk_pas_mat()' id='conf_Password' placeholder='Conform Password'>
                                </div>
                                <label id='lbl_match'>
                            <input id='match_pas'type='checkbox' disabled> Password Match
                             </label>
                            </div>

                            <div class='form-group'>
                                <div class='col-sm-12'>
                                    <button  id='submit' name='submit' style='float:right;' class='btn btn-primary'>Submit</button>                             
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>

            </div>

    </div>
    
</form>   
        <script>
   
    
    
            function form_show() {
                document.getElementById('form_operation').disabled = false;
                document.getElementById('btn_edit').style.display = 'none ';
            }

            function chk_pas() {
                var pos = 0;
                var str = document.getElementById('inputPassword').value;
                for (var i = 1; i <= 9; i++) {
                    pos = str.search(i);
                    if (pos >= 0) break;
                    else pos = -1;
                }
                if (pos >= 0) {
                    document.getElementById('number').checked = true;
                    document.getElementById('num_lbl').style.backgroundColor = 'cornflowerblue ';

                } else {
                    document.getElementById('number').checked = false;
                    document.getElementById('num_lbl').style.backgroundColor = 'indianred ';
                }
                //check upper case char
                var chk_Uper_var = 0;
                var charac = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                for (var ch = 0; ch < charac.length; ch++) {
                    if (str.search(charac[ch]) >= 0) {
                        chk_Uper_var = 1;
                        break;
                    } else
                        chk_Uper_var = -1;
                }
                if (chk_Uper_var == 1) {
                    document.getElementById('uper_case').checked = true;
                    document.getElementById('uper_lbl').style.backgroundColor = 'cornflowerblue ';
                } else {
                    document.getElementById('uper_case').checked = false;
                    document.getElementById('uper_lbl').style.backgroundColor = 'indianred ';
                }
            }

            function chk_pas_mat() {
                if ((document.getElementById('inputPassword').value == document.getElementById('conf_Password').value) && (document.getElementById('conf_Password').value != '')) {
                    document.getElementById('match_pas').checked = true;
                    document.getElementById('lbl_match').style.backgroundColor = 'cornflowerblue ';
                } else {
                    document.getElementById('match_pas').checked = false;
                    document.getElementById('lbl_match').style.backgroundColor = 'indianred ';
                }
            }

            function select_file() {
               document.getElementById('gallry_open').click();   
         }

            function hide_update_profile() {
                document.getElementById('profile_update').style.display = 'none';
            }

</script>
        <?php
include_once("profile_update_table.php"); 
 if(isset($_POST['submit'])){
   update();
 }  
if(isset($_POST['Cross_Update_Profile'])){
 header("Location:message.php");
 }
 ?>
