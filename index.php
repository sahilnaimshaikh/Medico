<?php
session_start();
if ((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)  && ( !isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] != true)){
    header("location: signin.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/2d0840cab7.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <link rel="stylesheet" type="text/css" href="css/index.css?version=51">

    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/5ee8b4ab96.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>
        <?php echo $_SESSION["username"]  ?>
    </title>
</head>

<body>

    <!-- navbar starts here-->
    <?php
    require "partials/nav.php";
    ?>
    <!-- navbar ends here  -->

    <!-- <div class="alert alert-success" role="alert">
            Welcome : <b><?php echo $_SESSION["username"] ?></b>
           
        </div> -->

    <!-- section starts here -->
    <section id="home">
        <div class="heading font2">
            <span class="font2">PC Part Picker</span>
        </div>
        <img src="images/logo/pcpp-icon.svg" alt="">
        <div class="banner">
            <span class="type font2"></span>
        </div>

        <!-- <button class="btn" ">Visit</button> -->
    </section>




    <!-- about section starts here  -->
    <section id="about">
        <div id="aboutus" class="font2">
            About us
        </div>
        <div id="inner-about">
            <img src="images/about1.jpg" alt="">
            <div id="para">
                <p class="font2">
                    This is Management Information System Project
                </p>
                <br>
                <p class="font2">This Project is Affiliated with VJTI</p>
                <br>
                <!-- <p class="p1"></p> -->
            </div>
        </div>
    </section>

    <!-- about us section ends here  -->






    <!-- contact starts here  -->

    <section id="contact">
        <div id="logo" style=" align-self: center;">
            <img src="images/logo/pcpp-icon.svg" alt="mylogo">
            <h4 class= "font2 yellow">PICK PARTS.</h4>
            <h4 class= "font2 yellow">BUILD YOUR PC.</h4>
            <h4 class= "font2 yellow">COMPARE AND SHARE.</h4>  
        </div>

        <div class="contactbox">

            <h2 class="h-ternary font2 yellow"> Categories</h2>
            <div style="background: aliceblue;width: 40px;height: 5px;margin-bottom: 10px;">

            </div>
            <h6 class="font2 aliceblue">CPU</h6>
            <h6 class="font2 aliceblue">MotherBoard</h6>
            <h6 class="font2 aliceblue">CPU Cooler</h6>
            <h6 class="font2 aliceblue">Storage</h6>
            <h6 class="font2 aliceblue">Memory</h6>
            <h6 class="font2 aliceblue">more...</h6>
                      


        </div>


    </section>




    <!-- footer starts here  -->
    <footer id="footer" class="textcenter font2 ">
        <div id="footertype">
            <span class="type1"></span>
        </div>
    </footer>
    <!-- footer ends here  -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    <script src="index.js"></script>
    <script src="typed.js"></script>
</body>
<script>
    // <!-- typedjs for home section starts here  


    var typed = new Typed('.type', {
        strings: ["Build your PC", "CPU", "MotherBoard", "Memory", "Storage", "Cases", "Operating Systems", "CPU Coolers"],
        //   smartBackspace: true // Default value
        typeSpeed: 100,
        backSpeed: 50,
        loop: true,
        startDelay: 1000
    });


    // typed.js for home section ends here 


    // typedjs for footer stsrts here  -->

    var typed = new Typed('.type1', {
        strings: ['MIS Project - Mr.Sahil, Mr.Athar, Mr.Abhishek'],
        //   smartBackspace: true // Default value
        typeSpeed: 60,
        backSpeed: 60,
        loop: true
        // shuffle: true
    });


    // <!-- typedjs for footer ends here  -->


</script>

</html>