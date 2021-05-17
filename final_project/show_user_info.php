<?php
$Email=$_POST['Email'];

include('connection.php');

$all=$db->query("select * from reg where Email='$Email'");
$fetch=$all->fetch_assoc();
$Name=$fetch['Name'];
$ID=$fetch['Email'];
$Phone=$fetch['Phone'];
               $a=" <tr>
                     <td>Name</td>
                     <td>".$Name."</td>
                    </tr>
                    <tr>
                        <td>E_ID</td>
                        <td>".$ID."</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>".$Phone."</td>
                    </tr>
                     ";
echo $a;
?>