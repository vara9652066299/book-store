<?php 
session_start();
if(isset($_SESSION['email'])){
if(isset($_POST['donate_book']))
{
    include('../includes/connection.php');
    $query = "insert into donated_books values(null,$_SESSION[uid],$_POST[category],'$_POST[book_name]',$_POST[quantity],null,1)";
    $query_run = mysqli_query($connection,$query);
    if($query_run)
    {
        echo "<script type='text/javascript'>
                alert('Request Submitted successfully...');
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
    <title>Donor Dashboard</title>
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
                        <a class="nav-link" id="donate_book" style="cursor:pointer;">Donate Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="seeker_request" style="cursor:pointer;">Seeker Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
                <span class="text-white">Name: <?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
    </nav>

    <div class="container mt-5" id="main_container">
        <h4>Welcome to Donor dashboard Page!</h4>
        <hr>
        <h5>Donor can perform the following operations -</h5>
        <dl>
            <dt>1. Donate Books</dt>
            <dd>Donor can put a request to donate a book.</dd>
            <dt>2. Seeker request</dt>
            <dd>Donor can view all the requests of the seeker for the books that he want to donate.</dd>
            <dt>3. Logout</dt>
            <dd>Admin can logout himself from the admin panel.</dd>
        </dl>
    </div>

    <!-- jQuery -->
  <script type="text/javascript">

    $(document).ready(function(){
      $("#donate_book").click(function(){
        $("#main_container").load("donate_book.php");
        });
    });

    $(document).ready(function(){
      $("#seeker_request").click(function(){
        $("#main_container").load("seeker_requests.php");
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