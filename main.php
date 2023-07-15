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
<!-- working tasks area -->
                <div class="tasks-wrapper">
                    <h2 class="title">Task Lists</h2>
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <tr>
                                <th>SL No</th>
                                <th>Task Name</th>
                                <th>Priority</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                                $sql ="SELECT * FROM tasks_table";
                                $query = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($query)>0){
                                    while($row = mysqli_fetch_assoc($query)){
                                        echo "id".$row['id'];?>
                                        <tr>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['t_name'];?></td>
                                            <td><?php if ($row['priority']==2){?>
                                                <p class="high">High</p><?php }?>
                                                <?php if($row['priority']==1){?>
                                                    <p class="medium">High</p><?php }?>
                                                <?php if($row['priority']==0){?>
                                                    <p class="medium">Low</p><?php }?>
                                            </td>
                                            <td><?php echo $row['s_date'];?></td>
                                            <td><?php echo $row['e_date'];?></td>
                                            <td>
                                                <a href="" class="btn btn-primary">Completed</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                                <a href="" class="btn btn-warning">Not Completed</a>
                                            </td>
                                        </tr>
                            <?php    }
                                }else{
                                    echo "Not listed";
                                }
                                mysqli_close($conn);
                            ?>
                            
                        </table>
                    </div>
                </div>
<!-- add new and logout session area -->
                <div class="add-new">
                    <a href="" class="btn btn-dark add-new-btn">Add New Task</a>
                    <a href="" class="btn btn-dark logout-btn">Logout</a>
                </div>
<!-- pending and completed tasks area -->
                <div class="tasks-wrapper flex">
                    <div class="left-part">
                        <h2 class="title">Completed Tasks</h2>
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <tr>
                                    <th>SL No</th>
                                    <th>Task Name</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Compiler Design read</td>
                                    <td>08 July 2023</td>
                                    <td>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="right-part">
                        <h2 class="title">Pending Tasks</h2>
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <tr>
                                    <th>SL</th>
                                    <th>Task Name</th>
                                    <th>Priority</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Compiler Design read</td>
                                    <td>
                                        <p class="high">High</p>
                                    </td>
                                    <td>08 July 2023</td>
                                    <td>
                                        <a href="" class="btn btn-success">Start</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>