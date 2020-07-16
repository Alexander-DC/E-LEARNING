<?php

/*require_once: permite incluir el fichero(archivo) por una sola vez, este
require copia tal cual el codigo y lo pega aqui con dicha sentencia(require_once)
*/
require_once "include/initialize.php";
//iset: Determina si una variable está definida(existe) y no( ono existe) es NULL.
//direccionsa al index si cumple la condicion
if (isset($_SESSION['StudentID'])) {
    # code...
    redirect('index.php');
}
?>

<style type="text/css">
  body {
    background-color: #fff;
  }
</style>

<!DOCTYPE html>

<html lang="en">
<head>

  <title>Login</title>
  <meta charset="UTF-8">
  <!-- Posicionarlo en internet, viewport:adaptar sitio web a dispotivios moviles en todos los navegadores  content: palabras clave de la pagina -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--Direccionamiento externo a la web-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet" media="screen">

<!-- Direccionar al documento css-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>css/main.css">
<!--===============================================================================================-->
</head>
<body>

  <div class="limiter">
    <div class="container-login100">
           <?php check_message();?>
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilte>
          <img src="<?php echo web_root; ?>images/janobe.png" alt="IMG">
        </div>

        <form class="login100-form validate-form" action="" method="POST">
          <span class="login100-form-title">
            Member Login
          </span>
          <!--CASILLA USUARIO-->
          <div class="wrap-input100 validate-input" >
            <!--Casilla donde ingresa el username-->
            <input class="input100" type="text" name="user_email" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <!--fa fa-user: icono de usuario-->
              <!--Aria es aumentar la accesibilidad de los contenidos dinámicos y de los componentes de interfaces dinámicas desarrollados con HTML, JavaScript, Ajax y tecnologías asociadas.-->
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>
          <!--CASILLA CONTRASEÑA-->
          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="user_pass" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <!--BOTOM-->
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="btnLogin">
              Login
            </button>
          </div>

          <div class="text-center p-t-136"> <!--Bootstrap-->
            <a class="txt5" href="register.php">
              Create your Account
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>



  <?php

//_POST VARIABLE YA PREDEFINIDA, SI EXITE ALGO ESCRITO en el botom?
if (isset($_POST['btnLogin'])) { //btnLogin es el name de escrito antes
    //POST  va recibir el dato de user_email, y lo va a pasar a $email
    $email   = trim($_POST['user_email']); //TRIM borra espacios en blanco los costados
    $upass   = trim($_POST['user_pass']);
    $h_upass = sha1($upass); //contraseña, lo encriptamos  $upass

    if ($email == '' or $upass == '') {

        message("Invalid Username and Password!", "error");
        redirect(web_root . "login.php");

    } else {
        //crea un nuevo objeto de miembro Estudiante
        $student = new Student();
        //make use of the static function, and we passed to parameters
        //hacer uso de la función estática, y pasamos a los parámetros
        $res = $student::studentAuthentication($email, $h_upass);
        if ($res == true) {
            // redirect(web_root."index.php");
            //$_SESSION ARAY ASOCIATIVO, nombre de sesion StudenID
            echo $_SESSION['StudentID'];
            header("Location: index.php");
        } else {
            message("Account does not exist! Please contact Administrator.", "error");
            redirect(web_root . "login.php");
        }
    }
}
?>

<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.js"></script>
<script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo web_root; ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo web_root; ?>vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>