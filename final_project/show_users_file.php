<?php


include_once('connection.php');
$user_email=$_POST['path'];
$all=$db->query("select * from reg where Email='$user_email'");
$fetch=$all->fetch_assoc();
$file_path=$fetch['Picture'];

$dir="Users\\".$file_path."\\";
            if($opendir=opendir($dir)){                
                         while (($file = readdir($opendir)) !== FALSE )
                                   {
                                    if($file !== "." && $file != ".." ){
                                     $src=$dir.$file;
                                        if(pathinfo($file,PATHINFO_EXTENSION)=='jpg' || pathinfo($file,PATHINFO_EXTENSION)=='png'){
                                         echo "<img src='$src' alt='Users' class='img-thumbnail sat' style='width: 298px;height: 200px;margin: 6px;' title='$file' onclick=file_info('$user_email',this) />";
                                        }
                                        if(pathinfo($file,PATHINFO_EXTENSION)=='mp4' || pathinfo($file,PATHINFO_EXTENSION)=='mkv'){
                                       echo " <div class='col-md-6 sat' title=".$file." onclick=file_info('$user_email',this) >
                                       <video width='320' controls>
                                         <source src='$src' type='video/mp4'>
                                                <source src='$src' type='video/ogg'>
                                                 Your browser does not support the Your Browser.    
                                                </video></div>";
                                        }
                                       // echo $file."</br>";
                                    }
                               }
}
?>