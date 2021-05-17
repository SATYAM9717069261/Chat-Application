<?php
$E_MAIL=$_POST['E_id'];
$text=$_POST['Text'];
$field=$_POST['Field'];
$table=$_POST['Table'];
$c_row=$_POST['C_ROW'];
@include_once('connection.php');


switch($field){
    case 'Phone ':  if( chk_Email($field,$text) == 0 && strlen($text)==10 ) {
                         $update=$db->query("update reg set $field = '$text' where Email = '$E_MAIL' ");
                         $update=$db->query("update profile_pic set $field = '$text' where Email = '$E_MAIL' ");
                        }elseif(strlen($text)!=10){
                            echo "Phone Number Must Be 10 Digit ";
                            }else{
                                  echo "Phone Number Exist";
                            }
             break;

     case 'Name ':       $update=$db->query("update reg set $field = '$text' where Email = '$E_MAIL' ");
                         $update=$db->query("update users set $field = '$text' where id = '$E_MAIL' ");  
             
                       $chk_friend_table=$db->query("select * from users where id='$E_MAIL' ");
                              $user_name=$chk_friend_table->fetch_assoc();   
                              $friend_table_name=$user_name['Friend_table_Name'];

                       $chk_chat_table=$db->query("select * from $friend_table_name ");
                       $field= $chk_chat_table->fetch_all(MYSQLI_ASSOC);
                          foreach($field as $row){
                         $table_name=$row['chat_table_name'];
                       $update_chat=$db->query("update $table_name set Name='$text' where Email='$E_MAIL' ");
                        }

             break;                      
     case 'Gender ' :  if(strtoupper($text) == 'MALE' || strtoupper($text) == 'FEMALE'){  
                       $update=$db->query("update reg set $field = '$text' where Email = '$E_MAIL' ");        
                         }
                         else{
                             echo "Input Only Mail OR Femail";  
                         }
            break;
      case 'DOB ' : 
                    $year=substr($text,0,4); 
                    $month=substr($text,5,2);
                    $day=substr($text,8,4);
                    if( strlen($year) == 4 && strlen($month) == 2 && strlen($day) == 2 ){
                        if( checkdate($day,$month,$year) == TRUE ){
                          $update=$db->query("update reg set $field = '$text' where Email = '$E_MAIL' ");
                        }else{
                            echo "Not valid";
                        }
                    }
                    else{
                        echo "Formate of date Must be (YYYY-MM-DD)";
                    }
            break;

       case 'Password ' : $update=$db->query("update reg set $field = '$text' where Email = '$E_MAIL' ");
                         $update=$db->query("update profile_pic set pas = '$text' where Email = '$E_MAIL' ");
             break;          

         case 'Delete ':
         
                         $all=$db->query("select * from reg  where Email = '$E_MAIL' ");
                         $field=$all->fetch_assoc();
                          $path="Users\\".$field['Picture'];                                                  
                              foreach (new DirectoryIterator($path) as $fileInfo) {
                             if(!$fileInfo->isDot()) {
                                unlink($fileInfo->getPathname());
                                  }
                                 }
                                rmdir($path);
                                            
                        $delete=$db->query("delete from  reg  where Email = '$E_MAIL' ");
                         $delete=$db->query("delete from  profile_pic  where Email = '$E_MAIL' ");  
             
                       $chk_friend_table=$db->query("select * from users where id='$E_MAIL' ");
                              $user_name=$chk_friend_table->fetch_assoc();   
                              $friend_table_name=$user_name['Friend_table_Name'];

                       $chk_chat_table=$db->query("select * from $friend_table_name ");
                       $field= $chk_chat_table->fetch_all(MYSQLI_ASSOC);
                          foreach($field as $row){
                         $table_name=$row['chat_table_name'];
                       $update_chat=$db->query("drop table $table_name ");
                        }
                        
                       $chk_chat_table=$db->query("drop table $friend_table_name ");
                       $delete=$db->query("delete from users  where id = '$E_MAIL' ");  
               break;                  
 }

            
function chk_Email($field_name,$data){
@include('connection.php');
 $chk_id=$db->query("select * from reg where  $field_name = '$data' ");
     if(($chk_id->num_rows)==1 )       {
             return 1;
        }else{
            return 0; 
         }
} 

?>