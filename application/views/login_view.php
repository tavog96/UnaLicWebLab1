<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>/css/login.css">
    </head>

    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first">
                    <img src="<?php echo base_url();?>/img/doge.png" id="icon" alt="User Icon" />
                    <h1>Doge News</h1>
                </div>

                <!-- Login Form -->
                <form>
                    <a class="btngoogle btn btn-primary" type="button" href="<?php echo 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me'). '&redirect_uri=' . urlencode(APP_CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . APP_CLIENT_ID . '&access_type=online' ?>">Login with Google</a>
                    <a class="btngithub btn btn-primary ml-4" type="button" href="https://github.com/login/oauth/authorize?<?php echo 'client_id='.GITHUB_APP_CLIENT_ID?>&<?php echo 'redirect_uri='.urlencode(GITHUB_APP_CLIENT_REDIRECT_URL)?>">
                            Login with Github 
                        </a>
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="#">Go to the Site</a>
                </div>
            </div>
        </div>
    </body>

    </html>