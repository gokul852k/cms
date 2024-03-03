<?php
require_once './login_check.php';
require_once './navbar.php';
?>

<div class="register-driver">
    <form action="./createcompany.php" method="post">
        <div class="container box-container">
            <div class="row">
                <h4 class="heading">Driver Details</h4>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" class="input-field" name="fullname" placeholder="Full Name" />
                </div>
                <div class="col-sm-4">
                    <input type="email" class="input-field" name="email" placeholder="Mail ID" />
                </div>
                <div class="col-sm-4">
                    <input type="number" class="input-field" name="mobile" placeholder="Mobile Number" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <textarea class="input-field" rows="2" name="address" placeholder="Address"></textarea>
                </div>
            </div>
        </div>
        <div class="container box-container">
            <div class="row">
                <h4 class="heading">Documents</h4>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" class="input-field" name="fullname" placeholder="Full Name" />
                </div>
                <div class="col-sm-4">
                    <input type="email" class="input-field" name="email" placeholder="Mail ID" />
                </div>
                <div class="col-sm-4">
                    <input type="number" class="input-field" name="mobile" placeholder="Mobile Number" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <textarea class="input-field" rows="2" name="address" placeholder="Address"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" name="submit" class="button-1">Register Driver</button>
                </div>
            </div>
        </div>
    </form>

</div>

<?php
require_once './footer.php';
?>