<?php
include "./navbar.php";
require_once './login_check.php';
// print_r($_SESSION);

// $stmt = $conn->prepare("SELECT * FROM `fuel_list` WHERE `flag`=:flag");

// $companyId = $_SESSION['companyId'];

// $flag = 0;

// $stmt->bindParam(':company_id', $companyId);
// $stmt->bindParam(':flag', $flag);

// $stmt->execute();

// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<link rel="stylesheet" type="text/css" href="./css/maintenance.css">
<div class="maintenance center-div">

    <form action="insert_maintenance.php" method="POST" class="centered-div" enctype="multipart/form-data">
        <div class="container box-container w3-animate-bottom">
            <div class="row">
                <h5 class="heading center">Maintenance Information</h5>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" id="fault" name="maintenance-fault" class="input-field" placeholder="Car Fault" required>
                    <span class="error-message" id="fault-error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" id="repair" name="maintenance-repair" class="input-field" placeholder="Repair" required>
                    <span class="error-message" id="repair-error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" id="shop" name="repair-shop" class="input-field" placeholder="Repair Shop Name" required>
                    <span class="error-message" id="shop-error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <textarea type="text" id="desc" name="repair-desc" class="form-control textarea" placeholder="About Repair" rows="3" required></textarea>
                    <span class="error-message" id="desc-error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="number" id="repamt" name="maintenance-amt" class="input-field" placeholder="Total Amount" required>
                    <span class="error-message" id="repair-error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label for="exampleFormControlFile1" class="drop-container" id="dropcontainer">
                        <span class="drop-title">Upload Bill</span>
                        <br>
                        <input type="file" class="form-control-file" id="billUpload" name="billUpload" accept="image/*,.pdf" />
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
<script src="maintenance.js"></script>
<?php
require_once './footer.php';
?>