<?php
session_start();
if(isset($_SESSION['email'])){
    ?>
<!DOCTYPE html>
<body>
<div class="row">
    <div class="col-md-4 m-auto">
    <h5 class="text-center mt-3">Add Book Category!</h5>
    <form action="" method="POST">
        <div class="form-group m-3">
            <input type="text" class="form-control" name="category" placeholder="Enter Book Category" required>
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-warning" value="Add Category" name="add_category">
        </div>
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
?>