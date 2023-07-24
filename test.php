<?php
    include('db.php');

    $name = $_POST['uname'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user_name ='$name' AND password='$pass'";
    $query= mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) === 1){
       $row = mysqli_fetch_assoc($query);
       $_SESSION['uName']= $row['user_name'];
       header("Location: main.php");
    }
    else{
        header("Location: index.php?error=Incorrect User Name or Password");
        exit();
    }