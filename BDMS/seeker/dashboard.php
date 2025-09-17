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
    <title>Seeker Dashboard</title>
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
        <h4>Welcome to Seeker dashboard Page!</h4>
        <hr>
        <div class="row">
            <div class="col-md-4 m-auto">
            <h5 class="text-center mt-3">Search Books!</h5>
            <form action="" method="POST">
            <div class="form-group m-3">
                <select name="category" class="form-control" required>
                    <option value="not selected">-Select Category-</option>
                    <?php 
                        include('../includes/connection.php');
                        $query = "select * from categories";
                        $query_run = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($query_run)){
                            ?>
                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                            <?php 
                        }
                    ?>
                </select>
            </div>
            <div class="form-group m-3">
                <input type="submit" class="btn btn-warning" value="Search Book" name="search_book">
            </div>
            </form>
            </div>
        </div><hr>
    </div>
    
    <!-- Search result container -->
    <div class="container mb-3" id="search_result_container">
    <?php
    if(isset($_POST['search_book'])){
    include('../includes/connection.php');
    $query = "select * from donated_books where cat_id = $_POST[category] AND status = 1";
    $query_run = mysqli_query($connection,$query);
    ?>
    <div class="row">
    <?php 
    while($row = mysqli_fetch_assoc($query_run)){
        $query2 = "select name from donors where id = $row[donor_id]";
        $query_run2 = mysqli_query($connection,$query2);
        while($row2 = mysqli_fetch_assoc($query_run2)){
            $query3 = "select cat_name from categories where cat_id = $row[cat_id]";
            $query_run3 = mysqli_query($connection,$query3);
            while($row3 = mysqli_fetch_assoc($query_run3)){
          ?>
        <div class="col-md-3">
            <div class="card">
                <h5 class="card-header text-white">Category - <?php echo $row3['cat_name'];?></h5>
                <div class="card-body">
                    <p class="card-text">Book Name - <?php echo $row['book_name'];?></p>
                    <p>No of Books - <?php echo $row['quantity'];?></p>
                    <p>Donor Name - <?php echo $row2['name'];?></p>
        <?php 
            } 
            }
        ?>
                    <?php 
                        include('../includes/connection.php');
                        $query1 = "select status from seekers where id = $_SESSION[uid]";
                        $query_run1 = mysqli_query($connection,$query1);
                        while($row1 = mysqli_fetch_assoc($query_run1)){
                            ?>
                                <a href="book_request.php?bid=<?php echo $row['id'];?>" class="btn btn-sm btn-warning <?php if($row1['status']==1){echo "";}else{echo "disabled";} ?>">Request Book</a>
                            <?php 
                        }
                    ?>
                    
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
    <?php 
    }
?>
    </div>

    <!-- jQuery -->
  <script type="text/javascript">

    $(document).ready(function(){
      $("#search_book").click(function(){
        $("#search_result_container").load("search_book.php");
        });
    });

    $(document).ready(function(){
      $("#my_requests").click(function(){
        $("#search_result_container").load("my_requests.php");
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