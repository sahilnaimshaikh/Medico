<?php
$login = false;
$showerror = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require "partials/_dbconnect.php";
    $email = $_POST['email'];
    $password1 = $_POST['password'];

   

        $sql = "select * from `signup`  where email = '$email' AND password = '$password1' ";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        $user_detail = mysqli_fetch_assoc($result);
            
        if ($num == 1) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $user_detail['email'];
            $_SESSION['phone'] = $user_detail['phone'];
            $_SESSION['username'] = $user_detail['name'];
            header("location: index.php");


        }
     else {
        $showerror = "Invalid Credentials";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script src="index.js"></script>
    <script src="typed.js"></script>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/5ee8b4ab96.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <link rel="stylesheet" href="css/index.css">
    <title>Sign-in</title>
</head>

<body>
    <!-- navbar starts here -->
  <?php 
    require "partials/nav.php"
  ?>
    <!-- navbar ends here  -->
    <?php

if ($login) {
     echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> You have successfully Logged-in.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if ($showerror) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>oops!</strong> '.$showerror.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}



?>
    <!-- SIphp section starts here  -->
    <div class="container">
    <div class="admin-login my-4">
        <h1>Admin Log-in</h1>
        <form action = "adminsignin.php" method = "POST">
            <div class="mb-3">
                <label for="text" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="email" placeholder="eg. abc" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
        </form>


    </div>
    <div class="user-login my-4">
        <h1> User Log-in</h1>
        <form action = "signin.php" method = "POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="eg. abc@gmail.com" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
        </form>


    </div>
    </div>
    
    

    <!-- footer starts here 
    <footer id="footer" class="textcenter">
        <div id="footertype">
            <span class="type1"></span>
        </div>
    </footer> -->
    <!-- footer ends here  -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

</body>
<script>
    // <!-- typedjs for home section starts here  


    // var typed = new Typed('.type', {
    //     strings: ['Welcome to the Fruit World.'],
    //     //   smartBackspace: true // Default value
    //     typeSpeed: 90,
    //     backSpeed: 40,
    //     loop: true,
    //     startDelay: 1000
    // });


    // typed.js for home section ends here 


    // typedjs for footer stsrts here  -->

    var typed = new Typed('.type1', {
        strings: ['@Copy YourKart, All Right Reserved.', 'Website Made by Sahil shaikh.'],
        //   smartBackspace: true // Default value
        typeSpeed: 60,
        backSpeed: 60,
        loop: true
        // shuffle: true
    });


    // <!-- typedjs for footer ends here  -->


    /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
            document.getElementById("footer").style.bottom = "-100px";

        } else {
            document.getElementById("navbar").style.top = "-100px";
            document.getElementById("footer").style.bottom = "0";

        }
        prevScrollpos = currentScrollPos;
    }



    //   code for testimonial slideshow starts here 

    // var slideIndex = 1;
    // showSlides(slideIndex);

    // // Next/previous controls
    // function plusSlides(n) {
    //     showSlides(slideIndex += n);
    // }

    // function showSlides(n) {
    //     var i;
    //     var slides = document.getElementsByClassName("testimonial");
    //     if (n > slides.length) {
    //         slideIndex = 1
    //     }
    //     if (n < 1) {
    //         slideIndex = slides.length
    //     }
    //     for (i = 0; i < slides.length; i++) {
    //         slides[i].style.display = "none";
    //     }
    //     slides[slideIndex - 1].style.display = "block";
    // }



    // // code for overlay 
    // function on() {
    //   document.getElementById("overlay").style.display = "block";
    // }

    // function off() {
    //   document.getElementById("overlay").style.display = "none";
    // }


    // code for side panel 

    /* Set the width of the sidebar to 250px (show it) */
    function openNav() {
        document.getElementById("mySidepanel").style.width = "100%";
    }

    /* Set the width of the sidebar to 0 (hide it) */
    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }
</script>

</html>