<?php
require_once './login_check.php';
require_once './navbar.php';

$companyId = $_SESSION['companyId'];
$flag = 0;

$stmt1 = $conn->prepare("SELECT * FROM `sub_company` WHERE `company_id`=:company_id AND `flag`=:flag");

$stmt1->bindParam(':company_id', $companyId);
$stmt1->bindParam(':flag', $flag);

$stmt1->execute();

$rows2 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="register-driver">
    <form id="vehicle">
        <div class="container box-container w3-animate-bottom">
            <div class="row">
                <h4 class="heading">Vehicle Details</h4>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" class="input-field" id="vehicle-number" name="vehicle-number" placeholder="Vehicle Number"
                        required />
                </div>
                <div class="col-sm-4">
                    <select class="input-field" id="company" name="company" required>
                        <option value="">--Select Company--</option>
                        <?php
                        foreach ($rows2 as $row) {
                            ?>
                            <option value="<?= $row['sub_company_id'] ?>">
                                <?= $row['company_name'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="type" class="input-field" id="vehicle-name" name="vehicle-name" placeholder="Vehicle Name" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" name="submit" class="button-1">Add Vehicle</button>
                </div>
            </div>
        </div>
    </form>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#vehicle').on('submit', function (event) {
            event.preventDefault();
            let vehicleNumber = $('#vehicle-number').val();
            let company1 = $('#company').val();
            let vehicleName = $('#vehicle-name').val();

            var formData = {
                vehicle_number: vehicleNumber,
                company: company1,
                vehicle_name: vehicleName
            }
            
            $.ajax({
                type: 'POST',
                url: 'insertvehicle.php',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        document.getElementById('vehicle').reset();
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message,
                            icon: "error"
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        title: "Error",
                        text: "Something went wrong! Please try again.",
                        icon: "error"
                    });
                }
            })
        })
    })

</script>

<?php
require_once './footer.php';
?>