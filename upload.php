<?php
session_start();
$product_update = false;
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "partials/_dbconnect.php";

	// echo "<pre>";
	// print_r($_FILES['my_image']);
	// echo "</pre>";
	$product_name = $_POST['product_name'];
	// $product_desc = $_POST['product_desc'];
	$product_price = $_POST['product_price'];
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
			$em = "Sorry, your file is too large.";
		    echo $em;
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO `product` (`product_name`,`price`, `image_url`) VALUES ('$product_name', '$product_price', '$new_img_name')";
				$result = mysqli_query($conn, $sql);
				// header("Location: view.php");
                if ($result) {
                    $product_update = true ;
                    
                }

				
			}else {
				$em = "You can't upload files of this type";
		        echo $em;
			}
		}
	}else {
		$em = "unknown error occurred!";
		echo $em;
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
    <title>Upload</title>
</head>

<body>
    <!-- navbar starts here -->
  <?php 
    require "partials/nav.php"
  ?>
    <!-- navbar ends here  -->
    <?php
if ($product_update) {
     echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> Product has been added successfully..
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

// if ($showerror) {
//     echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
//     <strong>oops!</strong> '.$showerror.'
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
// }
?>
    <!-- SIphp section starts here  -->

    <div class="container">
   
    <div class="user-login my-4">
        <h1> Upload Product</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data" >
            <div class="mb-3">
                <label for="image" class="form-label">Choose Image</label>
                <input type="file" class="form-control" name="my_image" id="image" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="product_name" class="form-label">Name of the Product</label>
                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="eg. Apple" aria-describedby="emailHelp" required>
            </div>
            <!-- <div class="mb-3">
                <label for="description" class="form-label">Description of the Product</label>
                <textarea class="form-control" name="product_desc" id="product_desc" required></textarea>
            </div> -->
            <div class="mb-3">
                <label for="description" class="form-label">Price of the Product</label>
                <textarea class="form-control" name="product_price" id="product_price" required></textarea>
            </div>
            
            <input type="submit"  name="submit" value="Upload">
        </form>


    </div>
    </div>
    
    

   


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