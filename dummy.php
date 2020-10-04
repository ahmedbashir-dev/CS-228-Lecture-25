<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "includes/header.php";?>
</head>
<body>
    <table class="table table-striped">
    <?php 
        require_once "database/connection.php";
        $dbc = db_connect();
        $sql = "SELECT * FROM users";
        $result = mysqli_query($dbc,$sql);
        while($row = mysqli_fetch_array($result)) { ?>
            
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td>
                        <form action="dummy-process.php" method="GET">
                            <input type="submit" value="Update" class="btn btn-info">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        </form>
                    </td>
                </tr>
        <?php } ?>
            </table>

    
    <?php require_once "includes/footer.php"; ?>
</body>
</html>