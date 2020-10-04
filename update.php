<?php 
    $pageTitle = "Update Page";
    require_once "includes/header.php";
?>
<body>
    <?php require_once "includes/navbar.php";?>
    <?php 
        $id = $_GET['id'];
        require_once "database/connection.php";
        $dbc = db_connect();
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($dbc,$sql);
        $row = mysqli_fetch_row($result); //indexed array 

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
                //Update the record in database
                $dbc = db_connect();
                $sql = "UPDATE users
                        SET name = '$name', email = '$email', password = '$password', dob = '$dob', country = '$country'
                        WHERE id = '$id'
                        ";
                $result = mysqli_query($dbc,$sql);
                $num = mysqli_affected_rows($dbc);
                if($num == 1){
                    echo "<div class = 'alert alert-success'> Data Updated Successfully </div>";
                    header("refresh:2;url=view_users.php");
                }
                else{
                    echo "<div class = 'alert alert-danger'> Data Cannot be Update due to error: ".mysqli_error($dbc)."</div>";   
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
            echo "<div class = 'alert alert-danger'>Form is not submitted </div>";
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">Update User Form</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form method="post">
                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php if(isset($row[1])){ echo $row[1];}?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address: </label>
                        <input type="email" name="email" id="email" class="form-control"
                        value="<?php if(isset($row[2])){ echo $row[2];}?>"
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" class="form-control" value="<?php if(isset($row[3])){ echo $row[3];}?>">
                    </div>
                 
                    <div class="form-group">
                        <label for="dob">Date of Birth: </label>
                        <input type="date" name="dob" id="dob" class="form-control" value="<?php if(isset($row[4])){ echo $row[4];}?>">
                    </div>

                    <div class="form-group">
                        <label for="country">Country: </label>
                        <select name="country" class="form-control" id="country">
                            <option value="">--SELECT--</option>
                            <option value="Pakistan" <?php if($row[5] == "Pakistan") echo "selected" ?>>Pakistan</option>
                            <option value="Iran" <?php if($row[5] == "Iran") echo "selected" ?>>Iran</option>
                            <option value="UK" <?php if($row[5] == "UK") echo "selected" ?>>United Kingdom</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" value="Update User" class="btn btn-success mb-2">
                </form>
            </div>
        </div>
    </div>


    <?php require_once "includes/footer.php";?>
</body>