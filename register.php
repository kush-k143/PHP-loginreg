<?php 
 include('server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form action="register.php" method="post">

        <?php
            include('errors.php');
        ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Mobile No.</label>
            <input type="text" name="mobile_no" value="<?php echo $mobile_no; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="register">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign In</a>
        </p>
    </form>
</body>
</html>