<!DOCTYPE html>
<?php
include_once('add_user.php');
?>
<html>

<head>
    <title>Sing_up</title>
    <link href="signin.css" rel="stylesheet">
     <script type="text/javascript" src="Sign_up_aj.js">  
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
        <div class=" col-md-3">
            <h1>Social Traders</h1>
        </div class="col-md-9">  
          <button  value="submit" class="btn btn-default col-md-1"  style="margin-top: 31px; float:right;" id="sub_form" onclick="showDialog_onpage()">Log in</button>
         </div>        
    <div class="row">
      <img src="image\social_sign_up.jpg" class="img-rounded col-md-5" style="margin-top: 109px;" alt="Cinque Terre" width="400" height="336"/>
        <div class="cointainer col-md-7">
            <div class="col-md-9">

                <form method="post" id="main_reg">
                    <div class="form-group">
                        <label for="Full_Name"><h4>Full_Name</h4></label>
                        <input type="text" class="form-control" id="Full_Name" name="name" placeholder="Full Name" required />
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="F_Pas"><h4>Password</h4></label>
                        <input type="password" class="form-control" id="F_Pas" placeholder="Password" name="pas" required onkeyup="chk_pas()">

                        <label class="checkbox-inline" id="uper_lbl">
  <input type="checkbox"  id="up_cas" value="option2" disabled> One Upper Case Character
</label>
                        <label class="checkbox-inline" id="num_lbl">
  <input type="checkbox" id="num" value="option3" disabled> One Number
                    </label>

                    </div>

                    <div class="form-group">
                        <label for="S_Pas"><h4>Conform Password</h4></label>
                        <input type="password" class="form-control" id="S_Pas" name="S_Pass" placeholder="Conform Password" required onkeyup="chk_pas_mat()">
                        <label class="checkbox-inline" id="lbl_match">
  <input type="checkbox" id="match_pas" value="option3"  disabled > Password Match
                                        </label>
                    </div>

                    <div class="form-group">
                        <label for="mail"><h4>Email</h4></label>
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" id="mail" placeholder="Email" required onkeyup="chk_mail()">
                            <div class="input-group-addon" id="mail_img" style="   background-repeat: no-repeat; align-items: center;"></div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="phone" class="col-sm-4 control-label"><h4>Phone Number</h4></label>
                            <div class="input-group">
                                <input type="phone" name="phon" class="form-control" id="phone" required onkeyup="chk_phon()" />
                                <div class="input-group-addon" id="chk_pho" style="   background-repeat: no-repeat;
    align-items: center;"></div>
                            </div>
                            <br/><br/><br/>
                            <div class="form-group">
                                <button type="submit" value="submit" class="btn btn-default" id="sub_form" name="add_user" autofocus>Submit</button>
                            </div>
                </form>
                </div>
                </div>
                 <?php  insertuser(); ?>
                </div>
            </div>
        </div>
  <link href='signin.css' rel='stylesheet'>
     <div class='cointainer white-background' id='outer_page'></div>
    <div class='container dlgbox' style=' width: 500px; float:right;' id='inner_page'>
            <button class='col-md-1' style=" border-radius: 21%; margin-top:2px; padding:2px;  float: right; background-color: black; font-size: 25px;"  type='submit' onclick='hideDialog()'>X</button>
        <form class='form-signin' method="post">
            <h2 class='form-signin-heading col-md-3'>Log in</h2>
              <label for='inputEmail ' class='sr-only '>id</label>
            <input type='text ' id='inputEmail ' class='form-control' name='id_chk_user' placeholder="Email id & Phone Number " name='use_nam' required autofocus>
            <br/> <label for='inputPassword ' class='sr-only '>Password</label>
            <input id='inputPassword ' class='form-control ' name='pas_chk_user' placeholder='Password ' type='password' required />
            <br/> <button class='btn btn-lg btn-primary btn-block' name="log_in_user" id="log_short" type='submit'>Login</button>
        </form>
    </div>
    </div>
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
            }
        
        .dlgbox {
            display: none;
            position: fixed;
            width: 480px;
            border-radius: 10px;
            background-color: #7c7d7e;
        }     
</style>
</body>
</html>