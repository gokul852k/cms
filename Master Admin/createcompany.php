<?php
require_once 'Config/config.php';
require_once 'navbar.php';

if (isset($_POST['submit'])) {
    $comapnyName = $_POST['company-name'];
    $companyMail = $_POST['company-mail'];
    $companyMobile = $_POST['company-mobile'];
    $companyLogo = "";
    $companyUsername = $_POST['company-username'];
    $companyPassword = $_POST['company-password'];

    $hashPassword = password_hash($companyPassword, PASSWORD_DEFAULT);
    try {
        $stmt = $conn->prepare("INSERT INTO `company_master` (`company_name`, `comapany_mail`, `company_mobile`, `company_logo`, `username`, `password`) VALUES (:companyName, :comapanyMail, :companyMobile, :companyLogo, :username, :password)");

        $stmt->bindParam(':companyName', $comapnyName);
        $stmt->bindParam(':comapanyMail', $companyMail);
        $stmt->bindParam(':companyMobile', $companyMobile);
        $stmt->bindParam(':companyLogo', $companyLogo);
        $stmt->bindParam(':username', $companyUsername);
        $stmt->bindParam(':password', $hashPassword);

        $stmt->execute();

        echo'
            <script>
                Swal.fire({
                    title: "Success",
                    text: "Company Created Successfully.",
                    icon: "success"
                });
            </script>
        ';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo'
            <script>
                Swal.fire({
                    title: "Error",
                    text: "Something went wrong! Please try again.",
                    icon: "error"
                });
            </script>
        ';
    }
}
?>
<div class="container box-container">
    <form action="./createcompany.php" method="post">
        <div class="row">
            <h4 class="heading">Company Details</h4>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <input type="text" class="input-field" name="company-name" placeholder="Company Name" />
            </div>
            <div class="col-sm-4">
                <input type="email" class="input-field" name="company-mail" placeholder="Mail ID" />
            </div>
            <div class="col-sm-4">
                <input type="number" class="input-field" name="company-mobile" placeholder="Mobile Number" />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <input type="file" class="input-field" name="company-logo" placeholder="Company Logo" />
            </div>
            <div class="col-sm-4">
                <input type="text" class="input-field" name="company-username" placeholder="User Name" />
            </div>
            <div class="col-sm-4">
                <input type="text" class="input-field" name="company-password" placeholder="Password" />
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <button type="submit" name="submit" class="button-1">Create Company</button>
            </div>
        </div>
    </form>
</div>

<?php
require_once 'footer.php';
?>