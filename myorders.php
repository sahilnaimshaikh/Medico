<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: signin.php");
    exit;
}
require "partials/_dbconnect.php";
$user_email = $_SESSION['email'];
$sql = "select * from `orders`  where email = '$user_email' ORDER BY `srno` DESC ";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$user_detail = mysqli_fetch_assoc($result);



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
        <title>YourKart- My Orders</title>
</head>

<body>

    <!-- navbar starts here -->
    <?php require "partials/nav.php"; ?>

    <!-- navbar ends here  -->
    <!-- contact section starts here  -->
     <div class="container my-4">
        <h1>Your Orders</h1>

        <table id = "orderTable" class="table table-dark table-hover">

            <tr>
                
                <th class="table-dark">Sr no.</th>
                <th class="table-dark">Product</th>
                <th class="table-dark">Payment Type</th>
                <th class="table-dark">Date & Time</th>


            </tr>
            <?php
            $srno =1;
                while ($user_detail = mysqli_fetch_assoc($result)) 
                {
                    // <!-- table for showing orders  -->
                   
                    echo '
                            
                            <tr class="table">

                                <td class="table-success">' . $srno. '</td>
                                <td class="table-success">' . $user_detail['product'] . '</td>
                                <td class="table-success">' . $user_detail['payment_type'] . '</td>
                                <td class="table-success">' . $user_detail['date & time'] . '</td>
                            </tr>
                        ';
                        $srno += 1;
                }
                
            ?>
        </table>
    </div> 
    
   
   
   
   <?php
    
          	//     while ($userDetail = mysqli_fetch_assoc($result))
			//    {    

			// 	  echo"  
            //       <div class='  box shop-item' id='box-search'>
            //       <img class='shop-item-image' src='uploads/".$userDetail['image_url']."' alt=''>
            //       <h2 class=' shop-item-title textcenter h-secondary '>".$userDetail['product']."</h2>
                 
            //       <h5 style='text-align: center;'> Product code :".$userDetail['srno.']."</h5>
            //       <h5 class='textcenter'>Price:₹".$userDetail['price']." </h5>
                  
            //     </div>";
                        
                
              
            
      		//     }
	         
	  


            ?>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  

</body>

    
<script>

  

    var typed = new Typed('.type1', {
        strings: ['@Copy YourKart, All Right Reserved.', 'Website Made by Sahil shaikh.'],
        //   smartBackspace: true // Default value
        typeSpeed: 60,
        backSpeed: 60,
        loop: true
        // shuffle: true
    });


    


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

    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("testimonial");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }



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