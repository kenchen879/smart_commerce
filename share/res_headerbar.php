<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>04-2492-9036</span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="../page">
                        <!-- replace logo here -->
                        <img src="../../images/logo/logo.png" alt="logo" width="30%" height="10%"/>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <ul class="top-menu text-right list-inline">
                    <!-- Search -->
                    <!-- <li class="dropdown search dropdown-slide">
                        <a href="../page" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-ios-search-strong"></i> 前往網站</a>
                    </li> -->
                    <!-- / Search -->            
                    <!-- Username -->
                    <?php
                        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //noLogin                           
                            echo "";
                        } else{ //Login
                            // echo "<li>hello!".$_SESSION['username']."</li>";
                        }
                    ?>  
                    <!-- / Username -->
                    <!-- Login -->
                    <li>
                        <?php                            
                            if(!isset($_SESSION["resloggedin"]) || $_SESSION["resloggedin"] !== true){ //noLogin                                     
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