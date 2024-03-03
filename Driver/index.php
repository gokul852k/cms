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
</head>

<body>
    <div class="wrapper">
        <form action="./home.php" method="post">
            <div class="heading">
                <h2>Welcome!</h2>
                <p>Sign In to your account</p>
            </div>

            <div class="input-group">
                <input type="text" id="username" class="input-field" placeholder="Username">
            </div>

            <div class="input-group">
                <input type="password" id="password" class="input-field" placeholder="Password">
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
    <script src="./js/captcha.js"></script>
</body>

</html>