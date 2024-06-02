<?php
require_once './login_check.php';
require_once './navbar.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$companyId = $_SESSION['companyId'];

?>

<link rel="stylesheet" href="./css/contactus.css">

<div class="container">
    <span class="big-circle"></span>
    <img src="img/shape.png" class="square" alt="" />
    <div class="form">
        <div class="contact-info">
            <h3 class="title">Let's get in touch</h3>
            <p class="p_text">
            We're here to provide you with the best support for all your needs. Whether you have questions about our system, need assistance with a specific issue, or want to learn more about how our solutions can help your business, we're ready to assist you.
            </p>

            <div class="info">
                <div class="information">
                    <i class="fas fa-map-marker-alt"></i> &nbsp &nbsp
                    <p>22nd Street Ashok Nagar</p>
                </div>
                <div class="information">
                    <i class="fas fa-envelope"></i> &nbsp &nbsp
                    <p>astronux@mail.com</p>
                </div>
                <div class="information">
                    <i class="fas fa-phone"></i>&nbsp&nbsp
                    <p>9626974940</p>
                </div>
            </div>

            <div class="social-media">
                <p>Connect with us :</p>
                <div class="social-icons">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="contact-form">
            <span class="circle one"></span>
            <span class="circle two"></span>

            <form action="contactus_crud.php" method="POST" autocomplete="off">
                <h3 class="title">Contact us</h3>
                <div class="input-container">
                    <input type="text" id="help-name" name="help-name" class="input" />
                    <label for="">Username</label>
                    <span>Username</span>
                </div>
                <div class="input-container">
                    <input type="tel" id="help-phone" name="help-phone" class="input" />
                    <label for="">Phone</label>
                    <span>Phone</span>
                </div>
                <div class="input-container textarea">
                    <textarea id="help-message" name="help-message" class="input"></textarea>
                    <label for="">Message</label>
                    <span>Message</span>
                </div>
                <input type="submit" value="Send" class="btn"/>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const inputs = document.querySelectorAll(".input");

    function focusFunc() {
        let parent = this.parentNode;
        parent.classList.add("focus");
    }

    function blurFunc() {
        let parent = this.parentNode;
        if (this.value == "") {
            parent.classList.remove("focus");
        }
    }

    inputs.forEach((input) => {
        input.addEventListener("focus", focusFunc);
        input.addEventListener("blur", blurFunc);
    });


</script>

<?php
require_once './footer.php';
?>