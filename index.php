<?php
session_start();
if (!empty($_SESSION['active'])) {
    header('location: src/');
} else {
    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Ingrese usuario y contraseña
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        } else {
            require_once "conexion.php";
            $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
            $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));
            $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$user' AND clave = '$clave'");
            mysqli_close($conexion);
            $resultado = mysqli_num_rows($query);
            if ($resultado > 0) {
                $dato = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $dato['idusuario'];
                $_SESSION['nombre'] = $dato['nombre'];
                $_SESSION['user'] = $dato['usuario'];
                header('Location: src/');
            } else {
                $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Contraseña incorrecta
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                session_destroy();
            }
        }
    }
}
?>




<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="assets/css/css/linearicons.css">
	<link rel="stylesheet" href="assets/csscss/owl.carousel.css">
	<link rel="stylesheet" href="assets/csscss/themify-icons.css">
	<link rel="stylesheet" href="assets/csscss/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/css/nouislider.min.css">
	<link rel="stylesheet" href="assets/css/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/css/main.css">
</head>

<body>



	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="assets/img/LOGO.png" alt="">
						
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>ENTRA A TU CUENTA</h3>
						<form class="row login_form" action="" id="login-form" method="post" >
							<div class="col-md-12 form-group">
							<input type="text" class="input-field form-control" name="usuario" id="usuario" placeholder="Usuario" autocomplete="off" required>
							</div>
							<div class="col-md-12 form-group">
							<input type="password" class="input-field form-control" name="clave" id="clave" placeholder="Contraseña" autocomplete="off" required>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
								<?php echo (isset($alert)) ? $alert : '' ; ?>
									
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="Login" class="primary-btn">Entrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	</div>
	<script src="assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
	<script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script>
        var rootProp = document.documentElement.style;
        var mode = true;

        function changeMode() {
            if (mode) {
                darkMode();
            } else {
                lightMode();
            }
            mode = !mode;
        }

        function lightMode() {
            rootProp.setProperty("--background1", "rgba(230, 230, 230)");
            rootProp.setProperty("--shadow1", "rgba(119, 119, 119, 0.5)");
            rootProp.setProperty("--shadow2", "rgba(255, 255, 255, 0.85)");
            rootProp.setProperty("--labelColor", "black");
        }

        function darkMode() {
            rootProp.setProperty("--background1", "rgb(9 25 33)");
            rootProp.setProperty("--shadow1", "rgb(0 0 0 / 45%)");
            rootProp.setProperty("--shadow2", "rgb(255 255 255 / 12%)");
            rootProp.setProperty("--labelColor", "rgb(255 255 255 / 59%)");
        }
    </script>


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>