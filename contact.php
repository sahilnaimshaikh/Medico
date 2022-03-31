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


    <link rel="stylesheet" href="css/style.css">
    <title>YourKart</title>
</head>

<body >
   
    <!-- navbar starts here -->
    <?php  require"partials/nav.php"; ?>

    <!-- navbar ends here  -->
    <!-- contact section starts here  -->
    
  

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
    

        var typed = new Typed('.type', {
        strings: ['Welcome to the Fruit World.'],
        //   smartBackspace: true // Default value
        typeSpeed: 90,
        backSpeed: 40,
        loop: true,
        startDelay: 1000
    });


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
      window.onscroll = function () {
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
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
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