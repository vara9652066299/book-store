<?php 
  session_start();
  if(isset($_SESSION['email'])){
?>
<html>
    <body>
    <h4>Book Seeker Requests</h4>
    <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Book Category</th>
        <th scope="col">Book_name</th>
        <th scope="col">Current Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        include('../includes/connection.php');
        $query = "select * from book_requests where status = 0 and donor_id = $_SESSION[uid]";
        $query_run = mysqli_query($connection,$query);
        $sno = 1;
        $book_cat = "";
        while($row = mysqli_fetch_assoc($query_run)){
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
                <td><?php if($row['status'] ==0){echo " Not Approved";}else{echo "Approved";} ?></td>
                <td><a class="btn btn-sm btn-warning" href="approve_request.php?rid=<?php echo $row['id'];?>">Approve</a> <a class="btn btn-sm btn-danger" href="reject_request.php?rid=<?php echo $row['id'];?>">Reject</a></td>
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