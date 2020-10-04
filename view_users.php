<?php 
    $pageTitle = "View Users";
    require_once "includes/header.php";
    require_once "database/connection.php";
?>
<body>
    <?php require_once "includes/navbar.php"; ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <table class="table table-striped text-center mt-2">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Country</th>
                    </tr>
                    <?php
                        $dbc = db_connect();
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($dbc, $sql);
                        while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td><?php echo $row['id']; ?> </td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['dob'];?></td>
                                <td><?php echo $row[5]; ?></td>
                            </tr>
                        <?php } ?> <!--END WHILE-->
                </table>
                <?php db_close($dbc); ?>
            </div>
        </div>

        <div class="row">
            <?php 
                $dbc = db_connect();
                $sql = "SELECT * FROM users";
                $result = mysqli_query($dbc, $sql);
                while($row = mysqli_fetch_array($result)){ ?>
                    <div class="col-sm-4 mt-2">
                        
                        <div class="card">
                            <div class="card-header">
                                <h2 class="header-text"><?php echo $row['name'];?></h2>
                            </div>
                            <div class="card-body">
                                <p>Email: <?php echo $row['email']; ?> </p>
                                <p>Date of Birth: <?php echo $row['dob']; ?> </p>
                                <p>Country: <?php echo $row['country']; ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-warning">Update</a>
                                <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                            </div>
                            
                           
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
    <?php 
        require_once "includes/footer.php";
    ?>
</body>