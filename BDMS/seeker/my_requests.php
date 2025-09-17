<?php 
    session_start();
    if(isset($_SESSION['email'])){
?>
<html>
    <body>
    <h4>My Requested Books</h4>
    <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Book Category</th>
        <th scope="col">Book_name</th>
        <th scope="col">Donor Name</th>
        <th scope="col">Current Status</th>
        <th scope="col">Donor Details</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        include('../includes/connection.php');
        $query = "select * from book_requests";
        $query_run = mysqli_query($connection,$query);
        $sno = 1;
        $donor_name = "";
        $book_cat = "";
        while($row = mysqli_fetch_assoc($query_run)){
            $query1 = "select name from donors where id = $row[donor_id]";
            $query_run1 = mysqli_query($connection,$query1);
            while($row1 = mysqli_fetch_assoc($query_run1)){
                $donor_name = $row1['name'];
            }

            $query2 = "select cat_name from categories where cat_id = $row[book_cat]";
            $query_run2 = mysqli_query($connection,$query2);
            while($row2 = mysqli_fetch_assoc($query_run2)){
                $book_cat = $row2['cat_name'];
            }

            ?>
            <tr>
                <th scope="row"><?php echo $sno; ?></th>
                <td><?php echo $book_cat; ?></td>
                <td><?php echo $row['book_name']; ?></td>
                <td><?php echo $donor_name; ?></td>
                <td><?php if($row['status'] ==0){echo "Request Sent";}elseif($row['status'] ==1){echo "Request Approved";}else{echo "Request Rejected";} ?></td>
                <td><a href="view_details.php?did=<?php echo $row['donor_id']; ?>" class="btn btn-sm btn-warning <?php if($row['status']==1){echo "";}else{echo "disabled";} ?>">View details</a></td>
            </tr>
            <?php
            $sno++;
        }
    ?>
    </tbody>
  </table>
    </body>
</html>
<?php
}
else{
    echo "
    <script>window.location.href = '../index.php';</script>";
}
?>