<?php include('db.php');

    if(isset($_POST['cid'])){
        $id = $_POST['cid'];
        $sql = "UPDATE tasks_table SET status = 2 WHERE id = $id LIMIT 1";
        $query = mysqli_query($conn, $sql);
        header('Location: main.php');
    }



?>