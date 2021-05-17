<?php
$db_admin=new mysqli('localhost','root','','socialwebsite_admin');
if($db_admin->connect_errno)
{
//echo $db->connect_error;
die("You are not Connected");
}
?>