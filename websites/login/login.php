<?php
//Conexion de la base de datos//
$server = 'localhost';
$user = 'id21732534_login';
$password = 'Marianoaguiar45@';
$database = 'id21732534_login';

$conexion = mysqli_connect($server, $user, $password, $database) or die('ERROR');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesion</title>
</head>
<body>
    <h2>Iniciar sesion</h2>
    <form action="" method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre" id="" placeholder="Ingrese su nombre">
        <label>Contraseña</label>
        <input type="password" name="contra" id="" placeholder="Ingrese su contraseña">
        <input type="submit" name="enviar" value="Ingresar">
    </form>

<?php
    if(isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $contra = $_POST['contra'];

        //Consulta para seleccionar el nombre y la conraseña de todos los usuarios//
        $sql1 = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND contrasena = '$contra'";
        $consulta = mysqli_query($conexion, $sql1);
        //Array asociativo del registro//
        $registro = mysqli_fetch_assoc($consulta);
        
        //mysqli_num_rows: Devuelve el numero de filas que les pases por los parentesis//
        if(mysqli_num_rows($consulta) > 0){//Preguntamos si la cantidad de filas consultada es mayor a 0, quiere decir que ese usuario ya existe//
            //Si ya existe lo redirigimos al perfil//
            header("Location: perfil.php?id_usuario=" . $registro['id_usuario']);
        }else{
            //En caso de la cantidad de filas consultas de 0, quiere decir que no existe ese usuario y se debe registrar//
            echo '<h3>¿No estás registrado?</h3>';
            echo '<a href="registrar.php">Registrate acá</a>';
            //Mostramos el link para redigir al registro de usuarios//
        }
}
?>
</body>
</html>