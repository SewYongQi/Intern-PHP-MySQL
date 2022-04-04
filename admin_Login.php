
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    

    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style1.css" rel="stylesheet" />


</head>
<div class="hero_area">
    <!-- header section strats -->

    <body class="sub_page" style="background: #435165;">
        


        <div class="form-wrap">
            <div class="tabs">
                <h3 class="signup-tab"><a href="#signup-tab-content">Student</a></h3>
                <h3 class="login-tab"><a class="active" href="#login-tab-content">Admin</a></h3>
            </div>
            <!--.tabs-->
    
            <div class="tabs-content">
                <div id="signup-tab-content">

                <div class="text-center">Student Login</div><br>
                <form class="login-form"  method="post" >
                        <input type="text" class="input" id="email" autocomplete="off" placeholder="Email" name="email">
                        <input type="password" class="input" id="pass" autocomplete="off" placeholder="Password" name="pass">

                        <button type="submit" class="button" value="Login" name="but1"><a href="index.php" class="text-light">Login</a></button>
                    </form>
                    <!--.login-form-->
                    
                   
                </div>
                <!--.signup-tab-content-->
                
                <div id="login-tab-content"  class="active">
                <div class="text-center">Welcome Back, Admin!</div><br>
                <form class="login-form"  method="post" >
                        <input type="text" class="input" id="email" autocomplete="off" placeholder="Email" name="email">
                        <input type="password" class="input" id="pass" autocomplete="off" placeholder="Password" name="pass">

                        <button type="submit" class="button" value="Login" name="but1"><a href="admin_index.php" class="text-light">Login</a></button>
                    </form>
                    
                    <!--.login-form-->
                    
                   
                </div>
                <!--.login-tab-content-->
            </div>
            <!--.tabs-content-->
        </div>
        <!--.form-wrap-->
</div>

</div><!-- tab-content -->


<!-- jQery -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<!-- popper js -->

<script type="text/javascript" src="js/login.js"></script>

</body>

</html>