<?php
if (isset($_COOKIE['remember_me']) && !isset($_SESSION['token'])) {
    header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CMS</title>
    <link rel="stylesheet" href="../Admin/css/main.css">
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
                <h2>Welcome!</h2>
                <p>Sign In to your account</p>
            </div>

            <div class="input-group">
                <input type="text" id="username" class="input-field" placeholder="Username">
                <span class="error-message" id="username-error"></span>
            </div>

            <div class="input-group">
                <div class="password-div">
                    <input type="password" id="password" class="input-field" placeholder="Password">
                    <i class="fa-regular fa-eye" id="password-eye"></i>
                </div>
                <span class="error-message" id="password-error"></span>
            </div>


            <div class="input-group row">

                <div class="row">
                    <a href="#">Forgot password?</a>
                </div>
            </div>


            <div class="input-group">
                <button class="button-1">Login</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#login').on('submit', function (event) {
                event.preventDefault();
                let username_value = $('#username').val();
                let password_value = $('#password').val();
                if(username_value!="") {
                    $('#username').removeClass('input-error');
                    $('#username-error').html('');
                }else {
                    $('#username').addClass('input-error');
                    $('#username-error').html('Username is required');
                    return false;
                }

                if(password_value!="") {
                    $('#password').removeClass('input-error');
                    $('#password-error').html('');
                }else {
                    $('#password').addClass('input-error');
                    $('#password-error').html('Password is required');
                    return false;
                }
                //Check captcha value
                if (username_value!="" && password_value!="") {
                    var formData = {
                        username: username_value,
                        password: password_value
                    }
                    $.ajax({
                        type: 'POST',
                        url: 'login.php',
                        data: formData,
                        dataType: 'json',
                        success: function (response) {
                            if (response.success === true) {
                                window.location.href = 'home.php';
                            } else if (response.success === false){
                                $('#username').addClass('input-error');
                                $('#password').addClass('input-error');
                                Swal.fire({
                                    title: "Error",
                                    text: "Invalid username or password",
                                    icon: "error"
                                });
                            } else if (response.success == 'redirect') {
                                window.location.href = response.url;
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
            $('#password-eye').on('click', function() {
                console.log("clicking");
                // fa-sharp fa-eye-slash
                // fa-eye
                if(document.getElementById('password').type == 'password') {
                    $('#password-eye').removeClass('fa-eye');
                    $('#password-eye').addClass('fa-sharp fa-eye-slash');
                    document.getElementById('password').type = "text";
                    console.log("if");
                } else {
                    $('#password-eye').removeClass('fa-sharp fa-eye-slash');
                    $('#password-eye').addClass('fa-eye');
                    document.getElementById('password').type = "Password";
                }
            })
        });
    </script>
    <script src="./js/captcha.js"></script>
</body>

</html>