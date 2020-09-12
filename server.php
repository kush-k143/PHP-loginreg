<?php 
    session_start();
    $username = "";
    $full_name = "";
    $email = "";
    $mobile_no = "";
    $errors = array();
    // connect to the database
    $db = mysqli_connect('localhost' , 'root' , '' , 'registration');

    if(isset($_POST['register'])) {
        $username =  $_POST['username'];
        $full_name =  $_POST['full_name'];
        $email =  $_POST['email'];
        $mobile_no =  $_POST['mobile_no'];
        $password_1 =  $_POST['password_1'];
        $password_2 =  $_POST['password_2'];

        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors , "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }
        if (count($errors) == 0) {
            $password = md5($password_1);
            $sql = "INSERT INTO users (username, full_name, email, mobile_no, pass) VALUES ('$username' , '$full_name' , '$email' , '$mobile_no' ,  '$password')";

            $create_user = mysqli_query($db, $sql);
                if(!$create_user) {
                    die("QUERY FAILED ." . mysqli_error($db));
                }
            
        }
    }

    if(isset($_POST['login'])) {
        $username =  $_POST['username'];
        $password =  $_POST['password'];

        if (empty($username)) {
            array_push($errors, "Username is Required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username = '$username' AND pass = '$password'";
            $result = mysqli_query($db, $query);
                if(mysqli_num_rows($result) == 1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Your are now logged in";
                    header('location: index.php');
                } else {
                    array_push($errors, "Wrong username/password combination");
                }
            }
    }

    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>