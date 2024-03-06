<?php
require_once './login_check.php';
require_once './navbar.php';

$stmt = $conn->prepare("SELECT * FROM `vehicle` WHERE `company_id`=:company_id AND `flag`=:flag");

$companyId = $_SESSION['companyId'];

$flag = 0;

$stmt->bindParam(':company_id', $companyId);
$stmt->bindParam(':flag', $flag);

$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<link rel="stylesheet" href="./css/driver.css">

<div class="register-driver">
    <form action="./insertdriver.php" method="post" enctype="multipart/form-data">
        <div class="container box-container w3-animate-top">
            <div class="row">
                <h4 class="heading">Driver Details</h4>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="imageUpload" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url(./image/manager.png);">
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="col-sm-4">
                    <select class="input-field" id="vehicle-no" name="vehicle-no">
                        <option value="">--Select Vehicle No--</option>
                        <?php
                        foreach ($rows as $row) {
                            ?>
                            <option value="<?= $row['vehicle_id'] ?>">
                                <?= $row['vehicle_number'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-sm-8">
                    <input type="text" class="input-field" name="address" placeholder="Address" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" class="input-field" name="state" placeholder="State" />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="input-field" name="district" placeholder="District" />
                </div>
                <div class="col-sm-4">
                    <input type="number" class="input-field" name="pincode" placeholder="Pin Code" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <select class="input-field" id="company" name="company">
                        <option value="">--Select Company--</option>
                        <option value="1">Pickspet</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="input-field" name="username" placeholder="Username" />
                </div>
                <div class="col-sm-3">
                    <input type="text" class="input-field" name="password" placeholder="Password" />
                </div>
            </div>
        </div>
        <div class="container box-container w3-animate-bottom">
            <div class="row">
                <h4 class="heading">Documents</h4>
            </div>
            <div class="row">
                <div class="col-sm-3 double-input">
                    <label for="exampleFormControlFile1" class="drop-container" id="dropcontainer">
                        <span class="drop-title">Upload Aadhar Card</span>
                        <br>
                        <input type="file" class="form-control-file" id="aadhar-card" name="aadhar-card"
                            accept="image/*,.pdf" />
                    </label>
                    <input type="number" class="input-field" name="aadhar-no" placeholder="Aadhar Number" />
                </div>
                <div class="col-sm-3 double-input">
                    <label for="exampleFormControlFile1" class="drop-container" id="dropcontainer">
                        <span class="drop-title">Upload PAN Card</span>
                        <br>
                        <input type="file" class="form-control-file" id="pan-card" name="pan-card"
                            accept="image/*,.pdf" />
                    </label>
                    <input type="number" class="input-field" name="pan-no" placeholder="PAN Number" />
                </div>
                <div class="col-sm-3 double-input">
                    <label for="exampleFormControlFile1" class="drop-container" id="dropcontainer">
                        <span class="drop-title">Upload Driving Licence</span>
                        <br>
                        <input type="file" class="form-control-file" id="driving-licence" name="driving-licence"
                            accept="image/*,.pdf" />
                    </label>
                    <input type="number" class="input-field" name="driving-licence-no"
                        placeholder="Driving Licence Number" />
                </div>
                <div class="col-sm-3 double-input">
                    <label for="exampleFormControlFile1" class="drop-container" id="dropcontainer">
                        <span class="drop-title">Upload Insurance</span>
                        <br>
                        <input type="file" class="form-control-file" id="insurance" name="insurance"
                            accept="image/*,.pdf" />
                    </label>
                    <input type="number" class="input-field" name="insurance-no" placeholder="Insurance Number" />
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

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function () {
        readURL(this);
    });
</script>

<?php
require_once './footer.php';
?>