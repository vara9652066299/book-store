<?php 
    session_start();
    if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<body>
<div class="row">
    <div class="col-md-4"><br>
        <img src="../images/image3.jpg" class="img" height="300px" width="350px">
    </div>
    <div class="col-md-4">
    <h5 class="text-center mt-3">Donate Books!</h5>
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
            <input type="text" class="form-control" name="book_name" placeholder="Enter Book Name" required>
        </div>
        <div class="form-group m-3">
            <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity" required>
        </div>
        <?php 
            $query = "select status from donors where id = $_SESSION[uid]";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                    <div class="form-group m-3">
                        <input type="submit" class="btn btn-warning" value="Submit" name="donate_book" <?php if($row['status']==1){echo "";}else{echo "disabled";} ?>>
                    </div>
                <?php 
            }
        ?>
    </form>
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