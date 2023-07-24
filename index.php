
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My tasks</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
<!-- add tasks area -->
                <div class="tasks-wrapper login-box">
                    <h2 class="title">Login</h2>
                   <form action="test.php" method="post">
                    <label for="name">User Name</label>
                    <input type="text" name="uname" class="form-control my-2" placeholder="Enter your Name">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control my-2">
                    <input type="submit" value="Login" class="form-control my-2 btn btn-primary">
                   </form>

                   <?php if(isset($_GET['error'])){
                   
                       echo $_GET['error'];
                  
                    }?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>