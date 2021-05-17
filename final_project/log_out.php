<?php
session_start();

          unset($_SESSION['Social_Traders_name']);
          unset($_SESSION['Social_Traders_id']);
          unset($_SESSION['Social_Traders_pas']);  
                    
          header("Location:chk_admin.php");
?>