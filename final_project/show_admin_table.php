<?php
include_once('connection.php');

$all=$db->query("select * from reg");
$field=$all->fetch_all(MYSQLI_ASSOC);


    $pro=$db->query("select * from profile_pic");
    $pic=$pro->fetch_all(MYSQLI_ASSOC);

    $reg='reg';
    $c_row='Email';
    foreach($field as $row){
    $Email=$row['Email'];
                    $a="<tr>
                        <td title='Name' onfocusout='update(\"$Email\",this,\"$reg\",\"$c_row\")'><span contenteditable='true'  >".$row['Name']."</span></td>
                        <td title='Email' onfocusout='update(\"$Email\",this,\"$reg\",\"$c_row\")'><span>".$row['Email']."</span></td>
                        <td title='Phone' onfocusout='update(\"$Email\",this,\"$reg\",\"$c_row\")'><span contenteditable='true' >".$row['Phone']."</span></td>
                        <td title='Gender' onfocusout='update(\"$Email\",this,\"$reg\",\"$c_row\")'><span contenteditable='true' >".$row['Gender']."</span></td>
                        <td title='DOB' onfocusout='update(\"$Email\",this,\"$reg\",\"$c_row\")'><span contenteditable='true'  >".$row['DOB']."</span></td>
                        <td title='Password' onfocusout='update(\"$Email\",this,\"$reg\",\"$c_row\")'><span contenteditable='true'  >".$row['Password']."</span></td> 
                         <td title='Delete' onclick='update(\"$Email\",this,\"$reg\",\"$c_row\")'><button type='button' class='btn btn-danger'>Delete</button></td> 
                          
                        </tr>";
                        echo $a;
  }
?>