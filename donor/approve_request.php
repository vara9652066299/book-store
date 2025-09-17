<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    $query = "update book_requests set status = 1 where id = $_GET[rid]";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
            alert('Request approved successfully...');
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