<?php
    include('db.php');

    $title = $_POST['name'];
    $priority = $_POST['priority'];
    $sDate = $_POST['sDate'];
    $eDate = $_POST['eDate'];

    $sql = "INSERT INTO tasks_table (t_name,priority,s_date,e_date,status) 
    VALUES('$title','$priority','$sDate','$eDate',0) ";
    $query= mysqli_query($conn, $sql);
    if($query){
        echo "Record Added";
    }
    else{
        echo "Error!";
    }