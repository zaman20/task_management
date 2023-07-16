<?php include('db.php');
    if(isset($_POST['tid'])){
       $id= $_POST['tid'];
       $sql = "UPDATE tasks_table SET status = 1 WHERE id = $id LIMIT 1";
       $query = mysqli_query($conn, $sql);
       header('Location: main.php');
    }
?>