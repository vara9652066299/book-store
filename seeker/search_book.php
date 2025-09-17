<?php
    session_start();
    if(isset($_SESSION['email'])){
    if(isset($_POST['search_book'])){
    include('../includes/connection.php');
    $query = "select * from donated_books";
    $query_run = mysqli_query($connection,$query);
    ?>
    <div class="row">
    <?php 
    while($row = mysqli_fetch_assoc($query_run)){
        ?>
        <div class="col-md-3">
            <div class="card">
                <h5 class="card-header">Category - <?php echo $row['cat_id'];?></h5>
                <div class="card-body">
                    <p class="card-text"><p class="card-text">Book Name - <?php echo $row['book_name'];?></p>
                    <p>No of Books - <?php echo $row['quantity'];?></p></p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
    <?php 
    }
}
else{
    echo "
    <script>window.location.href = '../index.php';</script>";
}
?>