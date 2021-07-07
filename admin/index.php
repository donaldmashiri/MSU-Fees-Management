<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, maruti admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, maruti design, maruti dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Maruti is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>MSU Analysis</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/maruti-admin/" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/maruti-login.css" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
</head>

<body>
    <div id="loginbox">
        <form id="loginform" class="form-vertical" action="" method="POST">
            <div class="control-group normal_text">
                <h3>Midlands State University</h3>
            </div>

            <?php
                         if(isset($_POST['login'])){
                             $username = $_POST['username'];
                             $password = $_POST['password'];

                             if($username === 'admin' && $password === '12345'){
                                 header('location: home.php');
                             }else{
                                 echo "<p class='alert alert-danger'>Invalid credentials</p>";
                             }

                         }
                        ?>

            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-user"></i></span><input type="text" name="username"
                            placeholder="Username" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-lock"></i></span><input type="password" name="password"
                            placeholder="Password" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
               
                <span class="pull-right"><input type="submit" name="login" class="btn btn-success" value="Login" /></span>
            </div>
        </form>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/maruti.login.js"></script>
</body>

</html>