<?php
include "./navbar.php";
require_once './login_check.php';
// print_r($_SESSION);

$stmt = $conn->prepare("SELECT * FROM `fuel_list` WHERE `flag`=:flag");

// $companyId = $_SESSION['companyId'];

$flag = 0;

// $stmt->bindParam(':company_id', $companyId);
$stmt->bindParam(':flag', $flag);

$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<link rel="stylesheet" type="text/css" href="./css/fuel.css">
<div class="fuel center-div">

    <form action="insert_fuel.php" method="POST" class="centered-div" enctype="multipart/form-data">
        <div class="container box-container w3-animate-bottom">
            <div class="row">
                <h5 class="heading center">Fuel Information</h5>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- Fuel Type Dropdown -->
                    <div class="form-group disp">
                        <!-- <label for="fuel-type" class="margin">Fuel Type</label> -->
                        <select id="fuel-type" name="fuel-type" class="form-control select" required>
                            <option value="" disabled selected>Select Fuel Type</option>
                            <?php
                            foreach ($rows as $row) {
                            ?>
                                <option value="<?= $row['fuel_type'] ?>">
                                    <?= $row['fuel_type'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <input type="number" id="fuelit" name="fuel-liter" class="input-field" placeholder="Total Liters" required>
                    <span class="error-message" id="fuelit-error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="number" id="fueamt" name="fuel-amt" class="input-field" placeholder="Total Amount" required>
                    <span class="error-message" id="fueamt-error"></span>
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
<?php
require_once './footer.php';
?>