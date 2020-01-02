<?php
	include_once('conexion.php');
	session_start();

	$correo = $_POST['correo'];
	$clave = $_POST['clave'];

	$usuario = $db->query("SELECT * FROM usuarios WHERE correo='$correo' AND clave='$clave'");

	if(mysqli_num_rows($usuario)>0)
	{
		$datosUsuario = mysqli_fetch_array($usuario);

		$_SESSION['rol']=$datosUsuario['rol'];
		$_SESSION['user_id'] = $datosUsuario['id'];
		$_SESSION['userActive'] = $datosUsuario['nombres'].' '.$datosUsuario['apellidos'];

		header('location:../home.php');
	}
	else
	{
		echo "<script>alert('Datos incorrectos');location.href='../';</script>";
	}

	mysqli_close($db);