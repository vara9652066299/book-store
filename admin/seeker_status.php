<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    if($_GET['status'] == 1){
        $query = "update seekers set status = 0 where id = $_GET[sid]";
    }
    else{
        $query = "update seekers set status = 1 where id = $_GET[sid]";
    }
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
            alert('Status Changed successfully...');
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