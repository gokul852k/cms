<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['change_password']) && $_SESSION['change_password'] == true) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to CMS</title>
        <link rel="stylesheet" href="../Admin/css/login.css">
        <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
            href="/css/app-wa-02670e9412103b5852dcbe140d278c49.css?vsn=d">

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.css"
        integrity="sha512-n1PBkhxQLVIma0hnm731gu/40gByOeBjlm5Z/PgwNxhJnyW1wYG8v7gPJDT6jpk0cMHfL8vUGUVjz3t4gXyZYQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.min.js"
        integrity="sha512-WHVh4oxWZQOEVkGECWGFO41WavMMW5vNCi55lyuzDBID+dHg2PIxVufsguM7nfTYN3CEeQ/6NB46FWemzpoI6Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body>
        <div class="wrapper">
            <form id="login">
                <div class="heading">
                    <h2>New Password</h2>
                    <p>Enter your new password.</p>
                </div>

                <div class="input-group">
                    <div class="password-div">
                        <input type="password" id="create-password" class="input-field" placeholder="Create New Password">
                        <i class="fa-regular fa-eye" id="password-eye-1"></i>
                    </div>
                    <span class="error-message" id="create-error"></span>
                </div>

                <div class="input-group">
                    <div class="password-div">
                        <input type="password" id="confirm-password" class="input-field"
                            placeholder="Confirm Your Password">
                        <i class="fa-regular fa-eye" id="password-eye-2"></i>
                    </div>
                    <span class="error-message" id="confirm-error"></span>
                </div>


                <div class="input-group">
                    <button class="button-1">Change</button>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#login').on('submit', function (event) {
                    event.preventDefault();
                    let createPassword = $('#create-password').val();
                    let confirmPassword = $('#confirm-password').val();
                    if (createPassword != "") {
                        if(createPassword.length < 5) {
                            $('#create-password').addClass('input-error');
                            $('#create-error').html('Minimum of 5 characters required.');
                            return false;
                        }
                        $('#create-password').removeClass('input-error');
                        $('#create-error').html('');
                    } else {
                        $('#create-password').addClass('input-error');
                        $('#create-error').html('Password is required.');
                        return false;
                    }

                    if (createPassword === confirmPassword) {
                        $('#confirm-password').removeClass('input-error');
                        $('#confirm-error').html('');
                    } else {
                        $('#confirm-password').addClass('input-error');
                        $('#confirm-error').html('Confirm password does not match.');
                        return false;
                    }
                    //Check captcha value
                    if (createPassword != "" && confirmPassword != "" && createPassword === confirmPassword) {
                        var formData = {
                            username: '<?= $_SESSION['username'] ?>',
                            create_password: createPassword,
                            confirm_password: confirmPassword
                        }
                        $.ajax({
                            type: 'POST',
                            url: 'passwordchange.php',
                            data: formData,
                            dataType: 'json',
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: "Success",
                                        text: "Password changed. You can now use the new password.",
                                        icon: "success"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "index.php";
                                        }
                                    });
                                } else {
                                    $('#create-password').addClass('input-error');
                                    $('#confirm-password').addClass('input-error');
                                    Swal.fire({
                                        title: "Error",
                                        text: "Something went wrong! Please try again.",
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
                    }


                })
            })

            $(document).ready(function () {
                $('#password-eye-1').on('click', function () {
                    // fa-sharp fa-eye-slash
                    // fa-eye
                    if (document.getElementById('create-password').type == 'password') {
                        $('#password-eye-1').removeClass('fa-eye');
                        $('#password-eye-1').addClass('fa-sharp fa-eye-slash');
                        document.getElementById('create-password').type = "text";
                    } else {
                        $('#password-eye-1').removeClass('fa-sharp fa-eye-slash');
                        $('#password-eye-1').addClass('fa-eye');
                        document.getElementById('create-password').type = "Password";
                    }
                })
                $('#password-eye-2').on('click', function () {
                    // fa-sharp fa-eye-slash
                    // fa-eye
                    if (document.getElementById('confirm-password').type == 'password') {
                        $('#password-eye-2').removeClass('fa-eye');
                        $('#password-eye-2').addClass('fa-sharp fa-eye-slash');
                        document.getElementById('confirm-password').type = "text";
                    } else {
                        $('#password-eye-2').removeClass('fa-sharp fa-eye-slash');
                        $('#password-eye-2').addClass('fa-eye');
                        document.getElementById('confirm-password').type = "Password";
                    }
                })
            });
        </script>
    </body>

    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Not Found</title>
        <link rel="stylesheet" href="../Admin/css/notfound.css">
        <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
            href="/css/app-wa-02670e9412103b5852dcbe140d278c49.css?vsn=d">

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">
    </head>

    <body>
        <div class="error-contain">
            <div class="error-text">
                <h1>404</h1>
                <p>Page not found.</p>
                <p>We searched high and low.</p>
                <a href="./index.php" class="button-1">Go to Login</a>
            </div>
            <div class="binoculars">
                <div class="back-bino"></div>
                <div class="left-bino"></div>
                <div class="right-bino"></div>
                <div class="left-bino-lense">
                    <div class="eye"></div>
                </div>
                <div class="right-bino-lense">
                    <div class="eye"></div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
}
?>