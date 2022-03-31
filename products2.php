<?php
session_start();
if ((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)  && ( !isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] != true)){
    header("location: signin.php");
    exit;
}
if(isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true){
    $adminloggedin = true;
}
require"partials/_dbconnect.php";

if (isset($_POST['snoEdit'])&& isset($_FILES['ImageEdit'])) {
$img_name = $_FILES['ImageEdit']['name'];
	$img_size = $_FILES['ImageEdit']['size'];
	$tmp_name = $_FILES['ImageEdit']['tmp_name'];
	$error = $_FILES['ImageEdit']['error'];

	if ($error === 0) 
    { 
        // if ($error === 0) that means image is also changed during edit 
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
				$sno = $_POST['snoEdit'];
                $product_u_name = $_POST["nameEdit"];
                $product_u_price = $_POST["PriceEdit"];
                $description_u = $_POST["descriptionEdit"];
                $sql = "UPDATE `product` SET `product_name` = '$product_u_name', `product_desc` = '$description_u',`price` = '$product_u_price', `image_url` = '$new_img_name' WHERE `product`.`srno.` = '$sno'";
                $result = mysqli_query($conn, $sql);
                // $update = true;
                if ($result) {
                    $product_update = true ;
                    
                }

				
			}else {
				$em = "You can't upload files of this type";
		        echo $em;
			}
		}
	}
    else {
        //  this 'else' will only execute when there is no change in image during edit  
                    $sno = $_POST['snoEdit'];
            $product_u_name = $_POST["nameEdit"];
            $product_u_price = $_POST["PriceEdit"];
            // $description_u = $_POST["descriptionEdit"];
            $sql = "UPDATE `product` SET `product_name` = '$product_u_name', `price` = '$product_u_price' WHERE `product`.`srno.` = '$sno'";
            $result = mysqli_query($conn, $sql);
                }
 
  }

   elseif (isset($_POST['snoDelete'])) {
     
        $sno = $_POST['snoDelete'];
        $sql = " DELETE FROM `product` WHERE `product`.`srno.` = '$sno'";
        $result = mysqli_query($conn, $sql);
        $delete = true;
      }



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <script src="typed.js" async></script>
  <script src="store.js" async></script>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/product.css">
  <link rel="stylesheet" href="css/product2.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Products</title>
</head>

<body>
  <!-- navbar starts here -->
  <?php require "partials/nav.php"; ?>
  <!-- navbar ends here -->
  <!-- edit modal starts here  -->
  <!-- Modal -->
  <div id="myModal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit this Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="products2.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="mb-3">
              <label for="image" class="form-label">Update Image</label>
              <input type="file" class="form-control" id="ImageEdit" name="ImageEdit" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Update Name</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit" aria-describedby="emailHelp"
                required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Update Price</label>
              <input type="number" class="form-control" id="PriceEdit" name="PriceEdit" aria-describedby="emailHelp"
                required>
            </div>
            <!-- <div class="mb-3">
              <label for="description" class="form-label">Update Description</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3" required></textarea>
            </div> -->

            <!-- <button type="submit" class="btn btn-primary">Add Note</button> -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- edit modal ends here  -->


  <!-- Delete modal starts here  -->
  <!-- Modal -->
  <div id="Delete_vala_Modal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this product ?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="products2.php" method="post">
            <input type="hidden" name="snoDelete" id="snoDelete">


            <!-- <button type="submit" class="btn btn-primary">Add Note</button> -->

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>

          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- delete modal ends here  -->


  <!-- services section strats here  -->

  <section class=" services-container" id="services">
    
    
    <div class="alert alert-dark" id="alert" role="alert">
      <strong>Cart is full</strong>
    </div>
    <div id="productheading">Home Medical</div>





    <div id="mysearch" class="mysearch">
      <input type="text" id="myInput" class="myInput" onkeyup="myFunction()" placeholder="Search for products..">
    </div>
    <div id="search-result">
      <div id="num-result" class="px-center"></div>
      <div class="px-center" id="text-result"> result found...</div>
      <div class="px-center" id="text-result-1"> results found...</div>
      <div class="px-center" id="text-result-2">Sorry coudn't find anything.</div>
    </div>


    <div id="service">
      <div class='  box shop-item' id='box-search'>
        <img class='shop-item-image'
          src='https://cdna.pcpartpicker.com/static/forever/images/product/3ef757133d38ac40afe75da691ba7d60.256p.jpg'
          alt=''>
        <h4 class=' shop-item-title textcenter h-secondary '>AMD Ryzen 5 5600X 3.7 GHz 6-Core Processor</h4>
        <h5 class='textcenter'>Price:₹2500 </h5>
        <h5 style='text-align: center;'>Product code:1</h5>
        <button type='button' class='btn btn-dark addToBagButton'>Add to Bag</button>
      </div>


      <div class='  box shop-item' id='box-search'>
        <img class='shop-item-image' src='https://m.media-amazon.com/images/I/51iEOq4jUaL.jpg' alt=''>
        <h4 class=' shop-item-title textcenter h-secondary '>Asus ROG STRIX B550-F GAMING (WI-FI) ATX AM4 Motherboard
        </h4>
        <h5 class='textcenter'>Price:₹5666</h5>
        <h5 style='text-align: center;'> Product code :2</h5>
        <button type='button' class='btn btn-dark addToBagButton'>Add to Bag</button>
      </div>

      <?php 
          $sql = "SELECT * FROM `product` ORDER BY `srno.` DESC ";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	    while ($product = mysqli_fetch_assoc($res))
			   { 
				  echo"  
                  <div class='  box shop-item' id='box-search'>
                  <img class='shop-item-image' src='uploads/".$product['image_url']."' alt=''>
                  <h2 class=' shop-item-title textcenter h-secondary '>".$product['product_name']."</h2>
                 
                  <h5 class='textcenter'>Price:₹".$product['price']." </h5>
                  <h5 style='text-align: center;'> Product code :".$product['srno.']."</h5>
                  
                  ";
                  
                   
                  if ($loggedin && !$adminloggedin) {
                            echo "
                            <button type='button' class='btn-sm btn-dark addToBagButton'>Add to Bag</button>
                        
                        ";
                            
                  }
                  if ($adminloggedin) {
                            echo "
                            <button class='edit btn-sm btn-primary ' id=" .$product['srno.'] .">Edit</button>
                        <button class='delete btn-sm btn-danger' id= d" .$product['srno.'] .">Delete</button></td>
                        
                        ";
                            
                  }
                   
                  echo"</div>";
                        
                
              
            
      		    }
	         }
	  
	  ?>







    </div>

  </section>



  <!-- footer starts here  -->
  <footer id="footer" class="textcenter">
    <div id="footertype">
      <span class="type1"></span>
    </div>
  </footer>
  <!-- footer ends here  -->
  <!-- // typedjs for footer stsrts here  -->
  <script>
    var typed = new Typed('.type1', {
      strings: ['All Right Reserved.', 'Website Made by Sahil shaikh.'],
      //   smartBackspace: true // Default value
      typeSpeed: 60,
      backSpeed: 60,
      loop: true
      // shuffle: true
    });
  </script>
  <!-- typedjs for footer ends here  -->
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
  <script>
    /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
      var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
      } else {
        document.getElementById("navbar").style.top = "-60px";
      }
      prevScrollpos = currentScrollPos;
    }










    function opentab(evt, fruitsection) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(fruitsection).style.display = "block";
      evt.currentTarget.className += " active";
    }
    // below code for active button in tab 
    document.getElementById("defaultOpen").click();

    function myFunction() {
      // Declare variables
      var input, filter, ul, li, a, i, txtValue, temp = 0;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("service");
      li = ul.getElementsByClassName('box');
      document.getElementById("num-result");
      document.getElementById("text-result");
      document.getElementById("text-result-1");


      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h2")[0];
        b = li[i].getElementsByTagName("p")[0];


        txtValue = a.textContent || a.innerText;
        txtValue1 = b.textContent || b.innerText;
        if (txtValue.toUpperCase().search(filter) > -1 || txtValue1.toUpperCase().search(filter) > -1) {
          li[i].style.display = "";
          temp += 1;


        } else {
          li[i].style.display = "none";

        }
      }
      if (temp == 1) {
        document.getElementById("num-result").style.display = "block";
        document.getElementById("num-result").innerHTML = temp;
        document.getElementById("text-result").style.display = "block";
        document.getElementById("text-result-1").style.display = "none";
        document.getElementById("text-result-2").style.display = "none";

      } else if (temp == li.length) {
        document.getElementById("num-result").style.display = "none";
        document.getElementById("text-result-1").style.display = "none";
        document.getElementById("text-result").style.display = "none";
        document.getElementById("text-result-2").style.display = "none";

      } else if (temp == 0) {
        document.getElementById("num-result").style.display = "none";
        document.getElementById("text-result-1").style.display = "none";
        document.getElementById("text-result").style.display = "none";
        document.getElementById("text-result-2").style.display = "block";

      } else {
        document.getElementById("num-result").style.display = "block";
        document.getElementById("num-result").innerHTML = temp;
        document.getElementById("text-result-1").style.display = "block";
        document.getElementById("text-result").style.display = "none";
        document.getElementById("text-result-2").style.display = "none";
      }
    }
  </script>
  <script>
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
  </script>
  <script>
    var acc = document.getElementsByClassName("accordian");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        // this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  </script>
  <script>
    /* Set the width of the sidebar to 250px (show it) */
    function openNav() {
      document.getElementById("mySidepanel").style.width = "100%";
    }

    /* Set the width of the sidebar to 0 (hide it) */
    function closeNav() {
      document.getElementById("mySidepanel").style.width = "0";
    }
  </script>

  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        //   console.log("edit"); 
        tr = e.target.parentNode;
        productname = tr.children[1].innerText;
        price = tr.children[3].innerText.substr(7,);
        //   console.log(productname,description);
        nameEdit.value = productname; //modal form me jo input field hai usme title ki value jayegy
        PriceEdit.value = price; //modal form me jo input field hai usme price ki value jayegy
        snoEdit.value = e.target.id
        console.log(e.target.id)

        $('#myModal').modal('toggle'); // jab user Edit button pe click karega tab myModal Id se jo bhi modal hai vo open hoyega


      })
    })
  </script>
  <script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        sno = e.target.id.substr(1,);
        //   console.log(sno);
        snoDelete.value = sno;
        console.log(snoDelete);
        $('#Delete_vala_Modal').modal('toggle')

      })
    })
  </script>
  <!-- <script src="products2.js"></script> -->
  <script src="myCart.js"></script>

</body>

</html>