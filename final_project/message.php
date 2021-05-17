<?php
session_start();
if(sizeof($_SESSION)==0){
        header("Location:index.php");
  }

include_once("profile_pic_set.php");
?>
<html>
<head>
    <title>Message </title>
    <link rel="stylesheet" type="text/Css" href="signin.css">
      <link rel="stylesheet" type="text/Css" href="menu.css">
      <style>     
nav ul button {
    display: block;
    text-align: center;
    color: #fff;
    padding: 25px 0;
    background-color: black;
    margin-top: 5px;
    font-size: 15px;
    width: 100%;
    -ms-transition: margin-left, all 0.5s;
    -webkit-transition: margin-left, all 0.5s;
    transition: margin-left, all 0.5s;
}
nav ul button:hover {
    background-color: white;
    color: black;
    margin-left: 15px;
}
      </style>
</head>
<body >
    <!--side menu bar -->
    <nav id="menu" style="background-color: whitesmoke;">
            <a  id="show_menu" title="Menu Here" class="btn btn-primary btn-lg active nav-toggle-btn" style="width: 53px;height: 88px;  font-size: 54px; padding: 8px;" role="button" onclick="nav_click()"> > </a>   
            </a>
        
        <ul>
            <button id="show_menu" title="Close"  class="btn btn-primary btn-lg active " style=" width: 44px;height: 40px; padding: 4px; border-radius:14px;margin-top:-50px;float: right;" role="button" onclick="hide_menu()"> X </button>
            <form method="Post">
            <button class=" btn_custom" id="friends" name="Friend_list" role="button"><img height="30px" width="37px" src="svg/009-social.svg" />Frends</button>
            <button class=" btn_custom"  name="profile" role="button"><img height="30px" width="37px" src="svg/006-happy-children.svg" />Profile</button>
            <button class=" btn_custom" id="gallry_open" name="gallry" role="button"><img height="30px" width="37px" src="svg/008-gallery.svg" />Gallary</button>      
            <button class=" btn_custom" id="log_out" name="logout_user" role="button"><img height="30px" width="37px" src="svg/002-logout.svg" />Log out</button>     
        </form>
         </ul>   
         </nav>
   <!--End Side Menu bar-->
   
   

<!--header-->
<div class="container">
 <div class="col-md-12" style=" margin:14;height:auto; background-color:black;">
            <label style=" height: 50px; width: 250px; font-size: 33px;">Social Traders</label>
            <label style="float: right; font-size: 18px; padding-top: 30px; margin-left:22px; "><?php  echo $_SESSION['Social_Traders_name']; ?></label>
           <?php prfile_pic(); ?>
        </div>
</div>
<!--End header-->


<!--Middle Portion -->
<div class="container"> 

  <div class="row">

      <div class="col-md-12">
      <?php  include_once('message_operation.php'); ?>
      </div>
    

   </div>   
</div>
<!--End Middle Portion -->

    <script type="text/javascript" src="menu.js">
    

    </script>
</body>

</html>