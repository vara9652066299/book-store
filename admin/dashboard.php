<?php 
session_start();
if(isset($_SESSION['email'])){
if(isset($_POST['add_category']))
{
    include('../includes/connection.php');
    $query = "insert into categories values(null,'$_POST[category]')";
    $query_run = mysqli_query($connection,$query);
    if($query_run)
    {
        echo "<script type='text/javascript'>
                alert('Category Added successfully...');
            window.location.href = 'dashboard.php';  
            </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
                alert('Error...please try again.');
            window.location.href = 'dashboard.php';  
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery File -->
    <script src="../includes/jquery_latest.js"></script>
    <!-- BootStrap files -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
    <!-- External CSS File -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <!-- NavBar Starts -->
    <nav class="navbar navbar-expand-lg" style="background-color: #65b741;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BOOK-SHARE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <!-- <i class="fa-solid fa-bars"></i> -->
                <span class="navbar-toggler-icon text-white">Menu</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="view_donor" style="cursor:pointer;">View Donors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="view_seeker" style="cursor:pointer;">View Seekers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="add_category" style="cursor:pointer;">Add Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="analytics" style="cursor:pointer;">Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
                <span class="text-white">Name: <?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
    </nav>

    <div class="container mt-3" id="main_container">
        <h4>Welcome to Admin dashboard Page!</h4>
        <hr>
        <h5>Admin can perform the following operations -</h5>
        <dl>
            <dt>1. View the donors</dt>
            <dd>Admin can view all the donors and he can also block/unblock them.</dd>
            <dt>2. View the seekers</dt>
            <dd>Admin cna view all the seekers and he can also block and unblock them.</dd>
            <dt>3. Add Category</dt>
            <dd>Admin can add a book category.</dd>
            <dt>4. Check the Analytics</dt>
            <dd>Admin can check the analytics of the system.</dd>
        </dl>
    </div>

    <!-- jQuery -->
  <script type="text/javascript">

    $(document).ready(function(){
      $("#add_category").click(function(){
        $("#main_container").load("add_category.php");
        });
    });

    $(document).ready(function(){
      $("#view_donor").click(function(){
        $("#main_container").load("view_donor.php");
        });
    });

    $(document).ready(function(){
      $("#view_seeker").click(function(){
        $("#main_container").load("view_seeker.php");
        });
    });

    $(document).ready(function(){
      $("#analytics").click(function(){
        $("#main_container").load("analytics.php");
        });
    });

  </script>

</body>

</html>
<?php
}
else{
    echo "
    <script>window.location.href = '../index.php';</script>";
}
?>