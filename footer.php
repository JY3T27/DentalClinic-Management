<?php
if (isset($_SESSION["userRoles"])) {
    if ($_SESSION["userRoles"] == 1) {
        echo '<footer id="footer" class="footer">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span>DentalClinic</span>
                </a>
                <p>We strive to craft healthy smiles, one patient at a time, making your smile our priority with personalized care for lifelong confidence.</p>
                <div class="social-links d-flex mt-4">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-6 footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_us.php">About us</a></li>
                    <li><a href="treatment.php">Treament</a></li>
                    <li><a href="index.php">Terms of service</a></li>
                    <li><a href="index.php">Privacy policy</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-6 footer-links">
                <h4>Other Links</h4>
                <ul>
                    <li><a href="#">Transaction</a></li>
                    <li><a href="#">Payment</a></li>
                    <li><a href="report.php">Medical Report</a></li>
                    <li><a href="profile.php">User Profile</a></li>
                    <li><a href="help.php">Help Center</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>
                    Jalan UMS<br>
                    88400 Kota Kinabalu,<br>
                    Sabah, Malaysia<br><br>
                    <strong>Phone:</strong> (+6088) 320000<br>
                    <strong>Email:</strong> info@dentalm.com<br>
                </p>
            </div>
        </div>
    </div>
    
    <div class="container mt-4">
        <div class="copyright">
            &copy; Copyright <strong><span>Dental Management</span></strong>. All Rights Reserved
        </div>
    </div>
    </footer>';
    } else {
        echo '<footer id="footer" class="footer">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span>DentalClinic</span>
                </a>
                <p>We strive to craft healthy smiles, one patient at a time, making your smile our priority with personalized care for lifelong confidence.</p>
                <div class="social-links d-flex mt-4">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-6 footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_us.php">About us</a></li>
                    <li><a href="treatment.php">Treament</a></li>
                    <li><a href="index.php">Terms of service</a></li>
                    <li><a href="index.php">Privacy policy</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-6 footer-links">
                <h4>Other Links</h4>
                <ul>
                    <li><a href="#">Transaction</a></li>
                    <li><a href="#">Payment</a></li>
                    <li><a href="report_all.php">Medical Report</a></li>
                    <li><a href="profile.php">User Profile</a></li>
                    <li><a href="help_all.php">Help Center</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>
                    Jalan UMS<br>
                    88400 Kota Kinabalu,<br>
                    Sabah, Malaysia<br><br>
                    <strong>Phone:</strong> (+6088) 320000<br>
                    <strong>Email:</strong> info@dentalm.com<br>
                </p>
            </div>
        </div>
    </div>
    
    <div class="container mt-4">
        <div class="copyright">
            &copy; Copyright <strong><span>Dental Management</span></strong>. All Rights Reserved
        </div>
    </div>
    </footer>';
    }
}
 else {
    echo '<footer id="footer" class="footer">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span>DentalClinic</span>
                </a>
                <p>We strive to craft healthy smiles, one patient at a time, making your smile our priority with personalized care for lifelong confidence.</p>
                <div class="social-links d-flex mt-4">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-6 footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_us.php">About us</a></li>
                    <li><a href="treatment.php">Treament</a></li>
                    <li><a href="index.php">Terms of service</a></li>
                    <li><a href="index.php">Privacy policy</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-6 footer-links">
                <h4>Other Links</h4>
                <ul>
                    <li><a href="patient_login.php">Transaction</a></li>
                    <li><a href="patient_login.php">Payment</a></li>
                    <li><a href="patient_login.php">Medical Report</a></li>
                    <li><a href="patient_login.php">User Profile</a></li>
                    <li><a href="patient_login.php">Help Center</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>
                    Jalan UMS<br>
                    88400 Kota Kinabalu,<br>
                    Sabah, Malaysia<br><br>
                    <strong>Phone:</strong> (+6088) 320000<br>
                    <strong>Email:</strong> info@dentalm.com<br>
                </p>
            </div>
        </div>
    </div>
    
    <div class="container mt-4">
        <div class="copyright">
            &copy; Copyright <strong><span>Dental Management</span></strong>. All Rights Reserved
        </div>
    </div>
    </footer>';
}
