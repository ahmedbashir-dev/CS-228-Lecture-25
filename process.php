<?php
require_once "database/connection.php";
   

//Form Submission Code
if(isset($_POST['submit'])){
    //Code to handle form
    
    //code for valdating the form
    $errors = [];

    //Name validation
    if(empty($_POST['name'])){
        $errors[] = "Name cannot be empty";
    }
    else{
        $name = trim($_POST['name']);
    }

    //Email Validation
    if(empty($_POST['email'])){
        $errors[] = "Email cannot be empty";
    }
    else{
        $email = trim($_POST['email']);
    }

    //Password Validation
    if(empty($_POST['password'])){
        $errors[] = "Password cannot be empty";
    }
    else{
        $password = $_POST['password'];
    }

    //Date of Birth
    if(empty($_POST['dob'])){
        $errors[] = "Date of Birth cannot be empty";
    }
    else{
        $dob = trim($_POST['dob']);
    }

        //country
        if(empty($_POST['country'])){
            $errors[] = "Country must be selected";
        }
        else{
            $country = trim($_POST['country']);
        }
    

  

    //if there are no errors
    if(empty($errors)){
        //Insert the record in the database
        $dbc = db_connect();
        $sql = "INSERT INTO users VALUES(NULL,'$name','$email', '$password','$dob','$country')";
        $result = mysqli_query($dbc,$sql);
        if($result){
            echo "<div class = 'alert alert-success'> Data Entered Successfully </div>";
            header("refresh:2;url=index.php");
        }
        else{
            echo "<div class = 'alert alert-danger'> Data Cannot be Entered due to error </div>";   
        }
        db_close($dbc);
    }
    else{
        //Display the errors
        foreach($errors as $error){
            echo "<div class = 'alert alert-danger'>$error</div>";
        }
    }
}
else{
    //Form is not submitted
    //code
     echo "<div class = 'alert alert-danger'>Form is not submitted </div>";
}
?>