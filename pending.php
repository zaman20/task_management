<?php include('db.php');
    if(isset($_POST['pid'])){
       $id= $_POST['pid'];
       $sql = "UPDATE tasks_table SET status = 0 WHERE id = $id LIMIT 1";
       $query = mysqli_query($conn, $sql);
       header('Location: main.php');
    }
?>