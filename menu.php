<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
            <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                    <li class="nav-item <?php if($pg==1) echo 'active';?>"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item <?php if($pg==2) echo 'active';?>"><a class="nav-link" href="shop.php">Shop</a></li>
                    <li class="nav-item <?php if($pg==3) echo 'active';?>"><a class="nav-link" href="blog.php">Blog</a></li>
                </ul>
                <ul class="nav-shop">
                    <!-- <li class="nav-item"><a href="cart.php"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button></a> </li> -->
                    <?php
                    $acces=""; 
                    if($_SESSION['iduser']!=0){
                        $con = mysqli_connect("localhost", "root", "", "Aroma");
                        $su = mysqli_query($con, "SELECT * FROM userlist WHERE id=$_SESSION[iduser]");
                        $rsu = mysqli_fetch_assoc($su);
                        
                        $rsu['class']==1 ? $acces="<li class='nav-item'><a class='nav-link' href='admin.php'>Dashboard</a></li>" : $acces="" ;    
                    }

                    $ok=1;
                    $cartnum=0;
                    if(isset($_SESSION['carts']))
                    {
                        foreach($_SESSION['carts'] as $k=>$v)
                        {
                            if(isset($v))
                            {
                                $ok=2;
                            }
                        }
                    }
                    if ($ok != 2)
                    {
                        $cartnum=0;
                    }
                    else
                    {
                        $items = $_SESSION['carts'];
                        $cartnum = count($items);
                    }
                    if(!isset($_SESSION['name'])) 
                    {
                        echo'<li class="nav-item"><a class="button button-header" href="login.php">Login</a></li>';
                    }
                    else{
                        echo "<li class='nav-item'><a href='cart.php'><button><i class='ti-shopping-cart'></i><span class='nav-shop__circle'>$cartnum</span></button></a> </li>";
                        echo '<li class="nav-item submenu dropdown">';
                        echo '<a href="#" class="nav-link button button-header" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['name'].'</a>';
                        echo '<ul class="dropdown-menu">';
                        echo $acces;
                        echo '<li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                        echo '<li></li>';
                        echo '</ul></li>';
                    } 
                    ?>
                </ul>
            </div>
            </div>
        </nav>
    </div>
</header>
