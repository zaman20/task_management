<?php

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $db ="tasks";

    $conn = mysqli_connect($serverName,$userName, $password,$db);
    if($conn){
        echo " Successfully";
    }
    else{
        echo " error";
    }
   