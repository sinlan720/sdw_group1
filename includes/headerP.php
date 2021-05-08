
<!-- Start Header Area -->
<header class="htc__header bg--white">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-sm-4 col-md-6 order-1 order-lg-1">
                    <div class="logo">
                        <a href="../../ApplicationLayer/ManageLoginInterface/index.php">
                            <img src="../../images/logo/ecrs.png" alt="logo images">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-4 col-md-2 order-3 order-lg-2">
                    <div class="main__menu__wrap">
                        <nav class="main__menu__nav d-none d-lg-block">
                            <ul class="mainmenu">
                                <li class="drop"><a href="../../ApplicationLayer/ManageLoginInterface/index.php">Home</a></li>
                                <li class="drop"><a href="../../#">Analytic</a>
                                    <ul class="dropdown__menu">
                                    <li><a href="../../ApplicationLayer/ProvideTrackingandAnalytic/providerReport.php">Report Analytic</a></li>
                                </ul>
                                </li>
                                    </ul>
                                </li>                                    
                                
                        </nav>

                    </div>
                </div>
               <div class="col-lg-1 col-sm-4 col-md-4 order-2 order-lg-3">
                    <div class="header__right d-flex justify-content-end">

                        <nav class="main__menu__nav d-none d-lg-block">
                            <ul class="mainmenu">

                                <?php 
                                if ($_SESSION['usergroup'] == 1) {
                                    $id = "cust_id";
                                }
                                else if ($_SESSION['usergroup'] == 2) {
                                    $id = "provider_id";
                                }
                                else if ($_SESSION['usergroup'] == 3) {
                                    $id = "runner_id";
                                }

                                if(isset($_SESSION['username']))
                                {  

                                    echo '<li class="drop"><a>'.$_SESSION['username'].'</a>
                                    <ul class="dropdown__menu">
                                    <li><a href="../../ApplicationLayer/ManageLoginInterface/profile.php?'.$id.'='.$_SESSION['userid'].'">Profile</a></li>

                                    <li><a href="../../ApplicationLayer/ManageLoginInterface/login.php">Logout</a></li>
                                    </ul>
                                    </li>';
                                    echo "</ul></nav>";

                                } ?>

                            </ul>
                    </div>
                </div>


</div>
<!-- Mobile Menu -->
<div class="mobile-menu d-block d-lg-none"></div>
<!-- Mobile Menu -->
</div>
</div>
<!-- End Mainmenu Area -->
</header>
        <!-- End Header Area -->