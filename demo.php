<!-- create table registration form using bootstrap
database :
id (int)
username (varchar(20))
email (varchar(50))
password (varchar(30))

// form 
jquery validation
username 
email 
password (A-Z,a-z,0-9, (special symbol))
confirmPassword(psw==c_psw) -->

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form id="registrationForm" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Register" name="submit_btn">
        </form>
    </div>

    <script>
    $(document).ready(function() {
        $("#registrationForm").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirmPassword: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                }
            },
            messages: {
                username: {
                    required: "Please enter your username",
                    minlength: "Your username must be at least 5 characters long"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please enter your password",
                    minlength: "Your password must be at least 8 characters long"
                },
                confirmPassword: {
                    required: "Please confirm your password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "Please enter the same password as above"
                }
            }
        });
    });
    </script>
    <?php

if (isset($_POST['submit_btn'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $connect = mysqli_connect("localhost", "root", "", "registration_db");
    if (!$connect) {
?>
        <script>
            alert('Error to connect in database.');
        </script>
        <?php
    } else {
        $query1 = "insert into reg(username,email,password) values('$username','$email','$password');";
        if ($connect->query($query1) == "true") {
        ?>
            <script>
                alert('Data is inserted Successfully.');
            </script>

        <?php
        } else {
        ?>
            <script>
                alert('Error to insert data.');
            </script>
<?php
        }
    }
}

?>
</body>
</html>
