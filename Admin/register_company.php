<?php
require_once './login_check.php';
require_once './navbar.php';
?>

<div class="register-company">
    <form id="company">
        <div class="container box-container w3-animate-bottom">
            <div class="row">
                <h4 class="heading">Company Details</h4>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" class="input-field" id="company-name" name="company-name"
                        placeholder="Company Name" required />
                </div>
                <div class="col-sm-4">
                    <input type="email" class="input-field" id="email" name="email" placeholder="Mail ID" />
                </div>
                <div class="col-sm-4">
                    <input type="number" class="input-field" id="mobile" name="mobile" placeholder="Mobile Number" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" name="submit" class="button-1">Create Company</button>
                </div>
            </div>
        </div>
    </form>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#company').on('submit', function (event) {
            event.preventDefault();
            let companyName = $('#company-name').val();
            let email = $('#email').val();
            let mobile = $('#mobile').val();

            var formData = {
                companyName: companyName,
                email: email,
                mobile: mobile
            }

            $.ajax({
                type: 'POST',
                url: 'insertcompany.php',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        document.getElementById('company').reset();
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