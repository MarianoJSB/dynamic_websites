<?php
//Conexion con la base de datos//
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
    <title>Registrarse</title>
</head>
<body>
    <h1>Registrarse</h1>
    <form action="" method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre" id="" placeholder="Ingrese su nombre" required>
        <label>Contraseña</label>
        <input type="password" name="contra" id="" placeholder="Ingrese su contraseña" required>
        <input type="submit" name="enviar" value="Ingresar">
    </form>
<?php
//Registrar usuarios//
if(isset($_POST['enviar'])){

    $nombre = $_POST['nombre'];
    $contra = $_POST['contra'];

    //Consulta para seleccionar el nombre y la conraseña de todos los usuarios//
    $sql1 = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND contrasena = '$contra'";
    $consulta = mysqli_query($conexion, $sql1);
    //Array asociativo del registro//
    $registro = mysqli_fetch_assoc($consulta);

    //mysqli_num_rows: Devuelve el numero de filas que les pases por los parentesis//
    if(mysqli_num_rows($consulta) > 0){//Preguntamos si la cantidad de filas consultada es mayor a 0, quiere decir que ese usuario ya existe//
            //Le avisamos que ese usuario ya existe y que puede ir a su perfil con el link//
            echo 'Ese usuario ya existe. Podes ir a tu perfil';
            echo '<a href="perfil.php?id_usuario='.$registro['id_usuario'].'">Perfil</a>';
    }else{
        //Insertamos el nuevo usuario que no se haya registrado antes//
        $ingresarUsuario = "INSERT INTO usuarios (nombre, contrasena) values ('$nombre', '$contra')";
        $insertar = mysqli_query($conexion, $ingresarUsuario);
        //Lo redirigimos al login para que pueda iniciar sesion//
        header("location:login.php");
    }
}
?>
</body>
</html>