 <?php
    //  <!-- navbar starts here -->
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    } else {
        $loggedin = false;
    }
    if(isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true){
        $adminloggedin = true;
    }
    else{
        $adminloggedin = false;
    }
    echo '
 <nav id="navbar">
        <div id="logo">
            <img src="images/logo/pcpp-icon.svg" alt="mylogo">
        </div>
        <div id="sidepanel">
            <button class="openbtn" onclick="openNav()">&#9776;</button>
        </div>
        <ul>
            <li class="item"><a href="index.php" class=""><div class="logoImg"> <img src="images/logo/house.png" alt="mylogo"></div></a></li>
            <li class="item"><a href="products2.php" class=""><div class="logoImg"> <img src="images/logo/menu.png" alt="mylogo"></div></a></li>
           
            
             ';
    if (!$loggedin && ! $adminloggedin)
     {
        echo '  
                <li class="item"><a href="signup.php" class=""><div class="logoImg"> <img src="images/logo/login.png" alt="mylogo"></div></a></li>
                <li class="item"><a href="signin.php" class=""><div class="logoImg"> <img src="images/logo/in.png" alt="mylogo"></div></a></li>';
    }


    if ($loggedin) {
        # code...

        echo ' 
       
        <li class="item"><a href="do_order.php" class=""><div class="logoImg"> <img src="images/logo/buy.png" alt="mylogo"></div></a></li>
        <li class="item"><a href="myorders.php" class=""><div class="logoImg"> <img src="images/logo/shopping-bag.png" alt="mylogo"></div></a></li>
        <li class="item"><a href="logout.php" class=""><div class="logoImg"> <img src="images/logo/exit.png" alt="mylogo"></div></a></li>
        
        ';
    }
    if( $adminloggedin){
        echo ' 
        
        <li class="item"><a href="upload.php" class=""><div class="logoImg"> <img src="images/logo/upload.png" alt="mylogo"></div></a></li>
        <li class="item"><a href="all_orders.php" class=""><div class="logoImg"> <img src="images/logo/shopping-bag.png" alt="mylogo"></div></a></li>
        <li class="item"><a href="all_users.php" class=""><div class="logoImg"> <img src="images/logo/users.png" alt="mylogo"></div></a></li>
        <li class="item"><a href="logout.php" class=""><div class="logoImg"> <img src="images/logo/exit.png" alt="mylogo"></div></a></li>
        
        ';

    }

    echo '  </ul>
    </nav>

    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div id="logo" style="width: 90vw;margin: auto;">
            <img src="images/logo/pcpp-icon.svg" alt="mylogo">
        </div>

        <a href="index.php" onclick="closeNav()"><div class="logoImg"> <img src="images/logo/house.png" alt="mylogo"></div></a>
        <a href="products2.php" onclick="closeNav()"><div class="logoImg"> <img src="images/logo/menu.png" alt="mylogo"></div></a>
        
        ';


        if (!$loggedin && ! $adminloggedin)
        {
           echo '  
                <a href="signup.php" onclick="closeNav()" ><div class="logoImg"> <img src="images/logo/login.png" alt="mylogo"></div></a>
                <a href="signin.php" onclick="closeNav()" ><div class="logoImg"> <img src="images/logo/in.png" alt="mylogo"></div></a>
                
                  ';
       }

    if ($loggedin) {
        echo ' 
        <a href="do_orders.php" ><div class="logoImg"> <img src="images/logo/buy.png" alt="mylogo"></div></a>
        
        <a href="myorders.php" onclick="closeNav()"><div class="logoImg"> <img src="images/logo/shopping-bag.png" alt="mylogo"></div></a>
        
        <a href="logout.php" onclick="closeNav()"><div class="logoImg"> <img src="images/logo/exit.png" alt="mylogo"></div></a>
        
        ';
    }
    if( $adminloggedin){
        echo ' 
        
        <a href="upload.php" onclick="closeNav()"><div class="logoImg"> <img src="images/logo/upload.png" alt="mylogo"></div></a>
        <a href="all_orders.php" onclick="closeNav()"><div class="logoImg"> <img src="images/logo/shopping-bag.png" alt="mylogo"></div></a>
        <a href="all_users.php"onclick="closeNav()"><div class="logoImg"> <img src="images/logo/users.png" alt="mylogo"></div></a>
        <a href="logout.php" class=""><div class="logoImg"> <img src="images/logo/exit.png" alt="mylogo"></div></a>
        
        ';

    }
    echo ' 
    </div>
    <!-- navbar ends here  -->
    ';
    ?>