<?php

 $name=$nam_var;
 $e_id=$email_var;

$db=new mysqli('localhost','root','','socialwebsite');
if($db->connect_errno)
die("You are not Connected");

$radem=rand(1,9000); 
$friend_table_name=$name.$radem;
$friend_request=$radem.$name;

$chk_ph=$db->query("insert into users values('$name','$e_id','$friend_table_name') ");
$friends_table="  create table $friend_table_name(
    S_No Int PRIMARY KEY AUTO_INCREMENT,
    friendlist text,
    chat_table_name text
    ) ";

mysqli_query($db,$friends_table);
    
?>