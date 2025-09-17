<?php
if(isset($_POST['register'])){
    include('../includes/connection.php');
    $query = "insert into donors values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile],'$_POST[address]',1)";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
              alert('Donor Registered successfully...');
            window.location.href = 'login.php';  
          </script>";
    }
    else{
        echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'register.php';
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
    <title>Donor Register</title>
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
                        <a class="nav-link" href="../admin/login.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donor/login.php">Donor Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../seeker/login.php">Seeker Login</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Registration Form -->
    <div class="container">
        <div class="row mt-3 text-center">
            <div class="col-md-6 mt-5">
                <img src="../images/image2.jpg" class="img" height="400" width="400px" alt="Donor Image">
            </div>
            <div class="col-md-4 mt-5">
                <h5 class="text-center mb-3 bg-warning p-1 text-black">Donor's Register Page!</h5>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                </div><br>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter Email ID" required>
                </div><br>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div><br>
                <div class="form-group">
                    <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile No." required>
                </div><br>
                <div class="form-group">
                    <textarea class="form-control" name="address" cols="30" rows="3" placeholder="Enter Your Address..."></textarea>
                </div><br>
                <input type="submit" class="btn btn-warning" value="Register" name="register">
                <span>Already have an account? </span><a href="login.php">Login here</a>
            </form>
            </div>
        </div>
    </div>
</body>

</html>