<?php 
    session_start();
    if(isset($_SESSION['email'])){
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
    <title>View Details</title>
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
                        <a class="nav-link" id="my_requests" style="cursor:pointer;">My Requests</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="seeker_request" href="">Seeker Request</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
                <span class="text-white">Name: <?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
    </nav>

    <div class="container mt-5" id="main_container">
        <h4 class="text-center">View Donor Details Page!</h4>
        <hr>
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <h5 class="card-header">Donor Details</h5>
                    <div class="card-body">
                        <?php 
                            include('../includes/connection.php');
                            $query = "select * from donors where id = $_GET[did]";
                            $query_run = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <p>Donor Name - <?php echo $row['name']; ?></p>
                                <p>Donor Email - <?php echo $row['email']; ?></p>
                                <p>Donor Mobile - <?php echo $row['mobile']; ?></p>
                                <p>Donor Address - <?php echo $row['address']; ?></p>
                                <?php 
                            }
                        ?><hr>
                        <a href="dashboard.php" class="btn btn-warning">Go to Dashboard</a>
                    </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
else{
    echo "
    <script>window.location.href = '../index.php';</script>";
}
?>