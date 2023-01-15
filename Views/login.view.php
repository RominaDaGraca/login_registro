<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Session </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo"> Login </h1>
        <hr class="border">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
        <div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input class="usuario" type="text" name="usuario" placeholder="Usuario">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" name="password" placeholder="Contraseña">
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
			</div>
        </form>
        <p class="texto-registrate">
			¿ Aún no tienes cuenta  ?
			<a href="register.php">Registrate</a>
		</p>
    </div>
    
</body>
</html>