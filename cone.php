<?php

$cone = mysqli_connect("localhost","root","","eLearning");
if($cone){
    echo "connection create successfully....";}
else{
    die("connection failed...." );
}

?>