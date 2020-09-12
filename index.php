<?php include('server.php'); ?>
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
        <h2>Home Page</h2>
    </div>

    <div class="content">
    <?php if(isset($_SESSION['success'])): ?>
        <div class="error success">
            <h3>
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['username'])): ?>
            <p> Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <div class="">
                
                    <?php 
                        $sql = "SELECT full_name, email, mobile_no FROM users WHERE username='$_SESSION[username]'";
                        if($result = mysqli_query($db, $sql)){
                                        echo "<table className='table col-md-6 mx-auto'>";
                                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>Name<td>";
                            echo "<td>" . $row['full_name'] . "</td>";
                            echo "<td>Email<td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>Mobile Number<td>";
                            echo "<td>" . $row['mobile_no'] . "</td>";
                            echo "</tr>";
                            }
                        echo "<tbody>";    
                        echo "</table>";
                        } else {
                            echo "No records matches";
                        }
                    ?>
            </div>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
    </div>
</body>
</html>