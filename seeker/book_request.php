<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    $donor_id = "";
    $book_id = "";
    $book_cat = "";
    $book_name = "";
    $query1 = "select * from donated_books where id = $_GET[bid]";
    $query_run1 = mysqli_query($connection,$query1);
    while($row1 = mysqli_fetch_assoc($query_run1)){
        $donor_id = $row1['donor_id'];
        $book_id = $row1['id'];
        $book_cat = $row1['cat_id'];
        $book_name = $row1['book_name'];
    }
    $query = "insert into book_requests values(null,$_SESSION[uid],$donor_id,$book_cat,'$book_name',0)";
    // echo $query;
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
            alert('Book requested successfully...');
            window.location.href = 'dashboard.php';  
        </script>";
    }
    else{
        echo "<script type='text/javascript'>
            alert('Error...Plz try again.');
            window.location.href = 'dashboard.php';
        </script>";
    }
}
else{
    echo "
    <script>window.location.href = '../index.php';</script>";
}
?>