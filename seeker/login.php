<?php
    session_start();
    if(isset($_POST['login'])){
        include('../includes/connection.php');
        $query = "select email,password,name,id from seekers where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run)){
            $_SESSION['email'] = $_POST['email'];
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['name'] = $row['name'];
                $_SESSION['uid'] = $row['id'];
            }
            echo "<script type='text/javascript'>
              window.location.href = 'dashboard.php';
            </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Please enter correct email and password.');
              window.location.href = 'login.php';
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
    <title>Seeker Login</title>
</head>

<body>
    <!-- NavBar Starts -->
    <nav class="navbar navbar-expand-lg" style="background-color: #65b741;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">BOOK-SHARE</a>
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
                        <a class="nav-link" href="../donor/login.php">Donor Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="seeker/login.php">Seeker Login</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container">
        <div class="row mt-3 text-center">
            <div class="col-md-6 mt-5">
                <img src="../images/image2.jpg" class="img" height="400" width="400px" alt="Donor Image">
            </div>
            <div class="col-md-4 mt-5">
                <h5 class="text-center mb-3 bg-warning p-1 text-black">Seeker's Login Page!</h5>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter email ID" required>
                </div><br>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div><br>
                <input type="submit" class="btn btn-warning" value="Login" name="login">
                <span>don't have an account? </span><a href="register.php">Register here</a>
            </form>
            </div>
        </div>
    </div>
</body>

</html>