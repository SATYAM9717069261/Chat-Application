<?php

$dir="Users\\";
            if($opendir=opendir($dir)){
                 
                         while (($file = readdir($opendir)) !== FALSE)
                                   {
                 
                                           if($file !== "." && $file != ".." ){
                                                $directory=$dir.$file;                                      
                                            if(is_dir($directory)==true){
                                                     echo $directory."</br>";
                                            }
                                              }
                               }
               }

?>



