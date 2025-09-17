<html>
    <body>
        <div class="row"><br><br>
        <h5 class="text-center">Analytics Page!</h5><hr><br><br>
            <div class="col-md-4">
            <div class="card">
                <h5 class="card-header text-black bg-warning" style="">Top Donor details</h5>
                <div class="card-body">
                <?php 
                    include('../includes/connection.php');
                    $query = "SELECT donor_id, total_qty from ( SELECT donor_id, SUM(quantity) as total_qty from donated_books WHERE status = 1 GROUP BY donor_id) as max_donor_detail where total_qty = (select max(total_qty) from (SELECT donor_id, SUM(quantity) as total_qty from donated_books WHERE status = 1 GROUP BY donor_id) as max_donor_detail)";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run)){
                          $query1 = "select * from donors where id = $row[donor_id]";
                        $query_run1 = mysqli_query($connection,$query1);
                        while($row1 = mysqli_fetch_assoc($query_run1)){
                            ?>
                                <p class="card-text">Donor Name - <?php echo $row1['name'] ?></p>
                                <p class="card-text">Donor Email - <?php echo $row1['email'] ?></p>
                                <p class="card-text">Donor Mobile - <?php echo $row1['mobile'] ?></p>
                                
                            <?php 
                    }
                    ?>  
                            <p class="card-text">Total Donated Books - <?php echo $row['total_qty'] ?></p>
                        <?php 
                    }
                    ?>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card">
                <h5 class="card-header text-black bg-warning" style="">Top Seeker details</h5>
                <div class="card-body">
                <?php 
                    include('../includes/connection.php');
                    $query = "SELECT seeker_id, count(seeker_id) from ( SELECT seeker_id, count(seeker_id) as total_seek from book_requests WHERE status = 1 GROUP BY seeker_id) as max_seeker_detail";
                    // $query = "SELECT seeker_id, total_qty from ( SELECT donor_id, SUM(quantity) as total_qty from donated_books WHERE status = 1 GROUP BY donor_id) as max_donor_detail where total_qty = (select max(total_qty) from (SELECT donor_id, SUM(quantity) as total_qty from donated_books WHERE status = 1 GROUP BY donor_id) as max_donor_detail);";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run)){
                          $query1 = "select * from seekers where id = $row[seeker_id]";
                        $query_run1 = mysqli_query($connection,$query1);
                        while($row1 = mysqli_fetch_assoc($query_run1)){
                            ?>
                                <p class="card-text">Seeker Name - <?php echo $row1['name'] ?></p>
                                <p class="card-text">Seeker Email - <?php echo $row1['email'] ?></p>
                                <p class="card-text">Seeker Mobile - <?php echo $row1['mobile'] ?></p>
                                
                            <?php 
                    }
                    ?>  
                            <p class="card-text">Total Book received - <?php echo $row['count(seeker_id)'] ?></p>
                        <?php 
                    }
                    ?>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card">
                <h5 class="card-header text-black bg-warning" style="">Top Demanded Category</h5>
                <div class="card-body">
                <?php 
                    include('../includes/connection.php');
                    $query = "SELECT book_cat,total_cat from ( SELECT book_cat, count(book_cat) as total_cat from book_requests GROUP BY book_cat) as max_demanded_book where total_cat = (select max(total_cat) from ( SELECT book_cat, count(book_cat) as total_cat from book_requests GROUP BY book_cat)as max_demanded_book)";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run)){
                          $query1 = "select * from categories where cat_id = $row[book_cat]";
                        $query_run1 = mysqli_query($connection,$query1);
                        while($row1 = mysqli_fetch_assoc($query_run1)){
                            ?>
                                <p class="card-text">Category Name - <?php echo $row1['cat_name']; ?></p>
                            <?php 
                    }
                    ?> 
                        <p class="card-text">Total Demands - <?php echo $row['total_cat']; ?></p>
                        <?php
                    }
                    ?>
                </div>
            </div>
            </div>

        </div>
    </body>
</html>