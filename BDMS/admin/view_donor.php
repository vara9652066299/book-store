<?php 
session_start();
if(isset($_SESSION['email'])){
  ?>
<html>
    <body>
    <h4>List of all Donors</h4>
    <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile No</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        include('../includes/connection.php');
        $query = "select * from donors";
        $query_run = mysqli_query($connection,$query);
        $sno = 1;
        while($row = mysqli_fetch_assoc($query_run)){
            ?>
            <tr>
                <th scope="row"><?php echo $sno; ?></th>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><a class="btn btn-sm btn-warning" href="donor_status.php?did=<?php echo $row['id'];?>&status=<?php echo $row['status'];?>"><?php if($row['status'] == 1){echo "Block";}else{echo "Unblock";} ?></a></td>
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