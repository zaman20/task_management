<?php include('db.php');?>

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
                <div class="tasks-wrapper">
                    <h2 class="title">Add Tasks</h2>
                   <form action="test.php" method="POST">
                    <label for="name">Title</label>
                    <input type="text" name="name" class="form-control my-2" placeholder="Tasks Name">
                    <label for="sdate">Start Date</label>
                    <input type="date" name="sDate" class="form-control my-2">
                    <label for="edate">End date</label>
                    <input type="date" name="eDate" class="form-control my-2">
                    <label for="Priority">Task Pririoty</label>
                    <select name="priority" id="" class="form-select my-2">
                        <option value="2">High</option>
                        <option value="1">Medium</option>
                        <option value="0">Low</option>
                    </select>
                    <input type="submit" value="Add Task" class="form-control my-2 btn btn-dark">
                   </form>
                </div>
<!-- add new and logout session area -->
                <div class="add-new">
                    <a href="main.php" class="btn btn-dark add-new-btn">Go Main Page</a>
                    <a href="index.php" class="btn btn-dark logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>