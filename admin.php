
<?php
ob_start();
session_start();
define('DIR_APPLICATION', str_replace('\'', '/', realpath(dirname(__FILE__))) . '/');

include(DIR_APPLICATION."config.php");
$msg = 'none';
$sql = '';

if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['pass']) && $_POST['pass'] != '')
{

		$sql= mysqli_query($link, "SELECT * FROM tbl_admin aa WHERE aa.username = '".make_safe($_POST['username'])."' and aa.passwd = '".make_safe($_POST['pass'])."'");

	if($row = mysqli_fetch_array($sql)){
		//here success
		          
            
			$arr = array(
				'username'	=> $row['username'],
				'pass'  => $row['passwd']
			);


			$_SESSION['objLogin'] = $arr;  

            header("Location: index.html");
		}
		
        else{
			$_SESSION['objLogin'] = $row;
		}

}
else
{
        $msg = 'block';
    }

function make_safe($variable)
{
   $variable = strip_tags($variable);
   return $variable;
}

?>


<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" role="form" id="form" method="post">
                    <span class="login100-form-title">
                        Yönetici Girişi
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Kullanıcı Adı Zorunlu">
                        <input class="input100" type="text" name="username" placeholder="Kullanıcı Adı">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Şifre zorunlu">
                        <input class="input100" type="password" name="pass" placeholder="Şifre">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type= "submit" id="login">
                            Giriş
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Unuttum
                        </span>
                        <a class="txt2" href="#">
                            Kullanıcı Adı / Şifre?
                        </a>
                    </div>


                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main2.js"></script>

</body>
</html>