<?php
include_once('connection.php');
$user_email=$_POST['email'];
$name=$_POST['name'];

$all=$db->query("select * from reg where Email='$user_email'");
$fetch=$all->fetch_assoc();
$file_path=$fetch['Picture'];
$dir="Users\\".$file_path."\\".$name;

$info=pathinfo($dir);
$size=filesize($dir); 

$info="<tr>         <td>Name</td>
                        <td>".$info['basename']."</td>
                    </tr>
                    <tr>
                        <td>Extention</td>
                        <td>".$info['extension']."</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>".($size/100).'KB'."</td>
     </tr>";

echo $info;


//echo ($size/100).'KB'; 
?>