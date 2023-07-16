<?php 
    include('db.php');
    if(isset($_POST['did'])){
        $id = $_POST['did'];
        $sql = "DELETE FROM tasks_table WHERE id = $id LIMIT 1";
        $query = mysqli_query($conn, $sql);
        if($query){
            ?><script> alert('Task Deleted!');</script>";<?php
            header('Location: main.php');
        }
    }


?>