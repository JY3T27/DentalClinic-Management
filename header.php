<?php
if ($_SESSION["userRoles"] == 1) {
    echo '<header id="header" class="header d-flex align-items-center">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
                <a href="index.php" class="logo d-flex align-items-center">
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Dental<span>Clinic</span></h1>
                </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_us.php">About</a></li>
                    <li><a href="treatment.php">Treatment</a></li>
                    <li><a href="schedule.php">Schedule</a></li>
                    <li class="dropdown"><a href="#"><span>User</span>
                        <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="report.php">Medical report</a></li>
                            <li><a href="transaction.php">Payment</a></li>
                            <li><a href="help.php">Help Center</a></li>
                            <li><a href="logout.php" onClick="return confirm(\'Confirm log out?\')">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- .navbar -->
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            </div>
            </header>';
} else {
    echo '<header id="header" class="header d-flex align-items-center">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
                <a href="index.php" class="logo d-flex align-items-center">
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Dental<span>Clinic</span></h1>
                </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_us.php">About</a></li>
                    <li><a href="treatment.php">Treatment</a></li>
                    <li><a href="schedule.php">Schedule</a></li>
                    <li class="dropdown"><a href="#"><span>User</span>
                        <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="report_all.php">Medical report</a></li>
                            <li><a href="#">Payment</a></li>
                            <li><a href="help_all.php">Help Center</a></li>
                            <li><a href="logout.php" onClick="return confirm(\'Confirm log out?\')">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- .navbar -->
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            </div>
            </header>';
}
