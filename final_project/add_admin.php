<?php
include('connection_admin.php');

$name=$_POST['Name'];
$id=$_POST['Email'];
$pas=$_POST['pas'];

$select=$db_admin->query("select * from admin where Email='$id' ");
if( ($select->num_rows) == 0 ){
$insert=$db_admin->query("insert into admin values('$name','$id','$pas')");
echo "<h2 style='color:blue;'>Sucessfully Registered</h2>";
}
else{
echo "<h1 style='color:red;'>Use Different Email ID</h1>";
}
?>