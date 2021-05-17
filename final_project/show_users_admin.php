<?php
include_once('connection.php');
$a=" <img src='images\\folder_icon.ico' alt='Users' class='img-thumbnail' />";
$all=$db->query("select * from reg");
$field=$all->fetch_all(MYSQLI_ASSOC);
foreach($field as $row){
echo "<div class='col-md-4' id='".$row['Email']."'style='text-align: center;' ondblclick='show_users_file(this)' onclick='show_user_info(this)'; title='".$row['Email']."' >".$a."</br>".$row['Name']."</div>";
}
?>






