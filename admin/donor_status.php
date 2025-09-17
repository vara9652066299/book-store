<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    if($_GET['status'] == 1){
        $query = "update donors set status = 0 where id = $_GET[did]";
    }
    else{
        $query = "update donors set status = 1 where id = $_GET[did]";
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