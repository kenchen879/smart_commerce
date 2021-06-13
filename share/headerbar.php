<div class="mcwidget-embed" data-widget-id="12850640"></div>

<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    
                    
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="../page">
                        <!-- replace logo here -->
                        <img src="../../images/logo/logo.png" alt="logo" width="80%" height="60%"/>
                        <!-- <svg width="150px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
						        <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
						            <text id="AVIATO">
                                        <tspan x="110.94" y="325" fill="#FF5959">X</tspan>
                                        <tspan x="128.94" y="325" fill="#FFA600">社</tspan>
                                        <tspan x="168.94" y="325" fill="#D1D100">頭</tspan>
                                        <tspan x="198.94" y="325" fill="#00A800">織</tspan>
                                        <tspan x="228.94" y="325" fill="#4F4FFF">襪</tspan>
						            </text>
						        </g>
						    </g>
						</svg> -->
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <ul class="top-menu text-right list-inline">
                    <!-- Search -->
                    <!-- <li class="dropdown search dropdown-slide">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-ios-search-strong"></i> Search</a>
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                <form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
                            </li>
                        </ul>
                    </li> -->
                    <!-- / Search -->                    
                    <!-- Username -->
                    <?php
                        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //noLogin                           
                            echo "";
                        } else{ //Login
                            echo "<li>hello!".$_SESSION['username']."</li>";
                        }
                    ?>
                    <!-- / Username -->
                    <!-- Cart -->
                    <li class="dropdown cart-nav dropdown-slide">
                        <a href="#"  id="showCart" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-android-cart"></i>購物車</a>
                            <div class='dropdown-menu cart-dropdown'>                        
                                <?php
                                    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //noLogin                           
                                        echo "<a href='../member/login.php'>尚未登入!請先前往登入頁面</a>";
                                    } else {
                                        echo "<div id='platform'></div>";
                                        // require_once "../show/showCart.php";
                                    }    
                                ?>
                            </div>
                    </li>
                    <!-- / Cart -->
                    <!-- Login -->
                    <li>
                        <?php                            
                            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //noLogin                                     
                                echo "<a href='../member/login.php'>登入</a>";
                            } else{ //Login
                                echo "<a href='../member/logout.php'>登出</a>";
                            }
                        ?>
                    </li>
                    <!-- / Login -->
                </ul>
                <!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section>
<!-- End Top Header Bar -->