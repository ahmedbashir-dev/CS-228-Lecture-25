<?php
    $id = $_GET['id'];
    require_once "database/connection.php";
    $dbc = db_connect();
    $sql = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($dbc,$sql);
    $num = mysqli_affected_rows($dbc);
    if($num == 1){
        echo "Deleted";
        header("refresh:2;url=view_users.php");
    }
?>