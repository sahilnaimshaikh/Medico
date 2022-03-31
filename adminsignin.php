<?php
$login = false;
$showerror = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require "partials/_dbconnect.php";
    $username = $_POST['username'];
    $password1 = $_POST['password'];

   

        $sql = "select * from `admin`  where username = '$username' AND password = '$password1' ";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        $user_detail = mysqli_fetch_assoc($result);
            
        if ($num == 1) {
            $login = true;
            session_start();
            $_SESSION['admin_loggedin'] = true;
            $_SESSION['username'] = $user_detail['username'];
            header("location: index.php");


        }
     else {
         $showerror = "Invalid Credentials";
        header("location: signin.php");
    }
}
?>


