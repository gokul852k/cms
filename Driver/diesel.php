<?php
include "./navbar.php";
require_once './login_check.php';
// print_r($_SESSION);
?>
    <div class="diesel center-div">

        <form action="insert_diesel.php" method="POST" class="centered-div" enctype="multipart/form-data">
            <div class="container box-container w3-animate-bottom">
                <div class="row">
                        <h5 class="heading center">Diesel Information</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="number" id="dielit" name="diesel-liter" class="input-field"
                            placeholder="Total Liters" required>
                        <span class="error-message" id="dielit-error"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="number" id="dieamt" name="diesel-amt" class="input-field"
                            placeholder="Total Amount" required>
                        <span class="error-message" id="dieamt-error"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="exampleFormControlFile1" class="drop-container" id="dropcontainer">
                            <span class="drop-title">Upload Diesal Bill</span>
                            <br>
                            <input type="file" class="form-control-file" id="billUpload" name="billUpload"
                                accept="image/*,.pdf" />
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                            <button type="submit" class="button-1">Submit</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
<?php
require_once './footer.php';
?>