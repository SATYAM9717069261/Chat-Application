<?php
$db=new mysqli('localhost','root','','socialwebsite');
if($db->connect_errno)
{
//echo $db->connect_error;
die("You are not Connected");
}
?>