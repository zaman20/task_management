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
                            
                            <?php 
                                $sql ="SELECT * FROM tasks_table where status =1";
                                $query = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($query)>0){?>
                                    <tr>
                                        <th>Id</th>
                                        <th>Task Name</th>
                                        <th>Priority</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr><?php
                                    while($row = mysqli_fetch_assoc($query)){?>
                                        <tr>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['t_name'];?></td>
                                            <td><?php if ($row['priority']==2){?>
                                                <p class="high">High</p><?php }?>
                                                <?php if($row['priority']==1){?>
                                                    <p class="medium">Medium</p><?php }?>
                                                <?php if($row['priority']==0){?>
                                                    <p class="low">Low</p><?php }?>
                                            </td>
                                            <td><?php echo $row['s_date'];?></td>
                                            <td><?php echo $row['e_date'];?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary complete-btn" data-id="<?php echo $row['id'];?>">Completed</a>
                                                <a href="#" class="btn btn-danger delete-btn" data-id="<?php echo $row['id'];?>">Delete</a>
                                                <a href="#" class="btn btn-warning pending-btn " data-id="<?php echo $row['id'];?>">Not Completed</a>
                                            </td>
                                        </tr>
                            <?php    }
                                }else{
                                    echo "Not listed";
                                }
                                
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
                               
                                <?php 
                                    $sql = "SELECT * FROM tasks_table where status= 2";
                                    $query=mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($query)>0){?>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Task Name</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr><?php
                                        while($row = mysqli_fetch_assoc($query)){?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['t_name'];?></td>
                                                <td><?php echo $row['e_date'];?></td>
                                                <td>
                                                    <a href="#" class="btn btn-danger delete-btn" data-id="<?php echo $row['id'];?>">Delete</a>
                                                </td>
                                            </tr><?php

                                        }
                                    } else{
                                        echo "<h5> No tasks </h5>";
                                    }
                                
                                ?>
                            </table>
                        </div>

                    </div>
                    <div class="right-part">
                        <h2 class="title">Pending Tasks</h2>
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                
                                <?php 
                                    $sql = "SELECT * FROM tasks_table where status= 0";
                                    $query=mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($query)>0){?>
                                        <tr>
                                            <th>ID</th>
                                            <th>Task Name</th>
                                            <th>Priority</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr><?php
                                        while($row = mysqli_fetch_assoc($query)){?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['t_name'];?></td>
                                                <td><?php if ($row['priority']==2){?>
                                                    <p class="high">High</p><?php }?>
                                                    <?php if($row['priority']==1){?>
                                                        <p class="medium">Medium</p><?php }?>
                                                    <?php if($row['priority']==0){?>
                                                        <p class="low">Low</p><?php }?>
                                                </td>
                                                <td><?php echo $row['s_date'];?></td>
                                                <td>
                                                    <a href="#" class="btn btn-success start-btn" data-id="<?php echo $row['id'];?>">Start</a>
                                                </td>
                                            </tr><?php

                                        }
                                    } else{
                                        echo " No tasks";
                                    }mysqli_close($conn);
                                
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /////////////// Forms ////////////////////////////////////////////////////////////////////// -->
    <!-- pending to task list form -->
    <form action="start.php"  method="post" id="startForm">
        <input type="hidden" name="tid" id="tId" val="">
    </form>

    <!-- Task list to pending task -->
    <form action="pending.php"  method="post" id="pendingForm">
        <input type="hidden" name="pid" id="pId" val="">
    </form>

    <!-- Task list to complete task -->
    <form action="complete.php"  method="post" id="completeForm">
        <input type="hidden" name="cid" id="cId" val="">
    </form>

    <!-- Delete task -->
    <form action="delete.php"  method="post" id="deleteForm">
        <input type="hidden" name="did" id="dId" val="">
    </form>

<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- jquery adding -->
    <script src="js/jquery-3.6.4.min.js"></script>
    <script>
        $('.start-btn').on('click',function(){
            let id = $(this).data('id');
            $('#tId').val(id);
            $('#startForm').submit();
        });
        $('.pending-btn').on('click',function(){
            let id = $(this).data('id');
            $('#pId').val(id);
            $('#pendingForm').submit();
        });
        $('.complete-btn').on('click',function(){
            let id = $(this).data('id');
            $('#cId').val(id);
            $('#completeForm').submit();
        });
        $('.delete-btn').on('click',function(){
            if(confirm("Are you sure want to delete this? ")){
                let id = $(this).data('id');
                $('#dId').val(id);
                $('#deleteForm').submit();
            }
            else{
                return false;
            }
            
          
        });
       
    </script>
</body>
</html>