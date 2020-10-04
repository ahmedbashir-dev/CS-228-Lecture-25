<?php
    $pageTitle = "PHP and MySQL";
    require_once "includes/header.php";
?>
<body>
    <?php require_once "includes/navbar.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">Registration Form</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form action="process.php" method="post">
                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" name="name" id="name" class="form-control">
                        <div class="valid-feedback">
                            Looks Good!
                        </div>
                        <div class="invalid-feedback">
                            Name must be 3 to 22 charactes long
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address: </label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                 
                    <div class="form-group">
                        <label for="dob">Date of Birth: </label>
                        <input type="date" name="dob" id="dob" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="country">Country: </label>
                        <select name="country" class="form-control" id="country">
                            <option value="">--SELECT--</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Iran">Iran</option>
                            <option value="UK">United Kingdom</option>
                        </select>
                    </div>
                    <input type="submit" id="btn" name="submit" value="Add User" class="btn btn-success mb-2">
                </form>
            </div>
        </div>
    </div>
    
    <?php require_once "includes/footer.php"; ?>
    <script src = "validation.js"></script>
</body>
</html>