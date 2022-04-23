<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "constant/header.php"; ?>  

    <link rel="stylesheet" href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('asset/theme/css/Login-Form-Clean.css') ?>" />


</head>

<body>
    <div class="login-clean">
        <form method="post" action="<?php echo base_url("Clogin") ?>">
            <h2 class="sr-only">Login Form</h2>
            <h1 style="font-size: 25px;text-align: center;margin-top: -25px;font-weight: bold;">KECAMATAN CIPUTAT</h1>
            <h1 style="font-size: 25px;text-align: center;margin-top: 0;"></h1>
            <div class="illustration"></div>
            <div class="form-group"><input class="form-control" type="text" name="username" id="username" placeholder="username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" id="password" placeholder="password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
        </form>
    </div>


    <script src="<?php echo base_url('asset/theme/js/jquery.min.js') ?>" />
    </script>
    <script src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js') ?>" />
    </script>
    <script src="<?php echo base_url('asset/theme/js/bs-animation.js') ?>" />
    </script>
    <script src="<?php echo base_url('asset/theme/js/aos.js') ?>" />
    </script>

</body>

</html>