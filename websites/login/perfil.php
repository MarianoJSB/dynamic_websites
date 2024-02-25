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
    <title>Perfil</title>
</head>
<body>
    <?php
    //Condicional para saber si existe el id_usuario pasado por el url//
    if(isset($_GET['id_usuario'])){
        $id = $_GET['id_usuario'];
        //Selecciomos al usuario con el id_usuario que le corresponda//
        $sql1 = "SELECT * FROM usuarios where id_usuario = '$id'";
        //Consulta//
        $query = mysqli_query($conexion, $sql1);
        //Utilizamos este array para obtener el nombre, el id y la contraseña del usuario//
        $registro = mysqli_fetch_assoc($query);
        //Variables de nombre y contraseña, traidas del array $registro//
        $nombre = $registro['nombre'];
        $contra = $registro['contrasena'];
        //Bienvenida al usuario//
        echo "<h2>¡Bienvenido $nombre!</h2>";
    }

    /* Borrar usuario */
    if(isset($_GET['eliminar'])){
        $id_eliminar = $_GET['eliminar'];
        $sql_eliminar = "DELETE FROM usuarios WHERE id_usuario = '$id_eliminar'";
        $eliminar = mysqli_query($conexion, $sql_eliminar) ? print("<script>alert('Registro eliminado'); window.location = 'perfil.php' </script>") : print("<script>alert('ERROR al eliminar') window.location = 'perfil.php' </script>");
        //Cuando elimina a un usuario vuelve al login ya que ese usuario no existe mas//
        header("location:login.php");
    }

    /* Editar usuario */
    if(isset($_GET['editar'])) {
        $id_editar = $_GET['editar'];
        $sql3 = "SELECT * FROM usuarios WHERE id_usuario = '$id_editar'";
        $buscarRegistro = mysqli_query($conexion, $sql3);
        $registro = mysqli_fetch_assoc($buscarRegistro);
        //Formulario del nuevo nombre y contrasena//
        echo '<form action="" method="post">
        <label>Nombre nuevo</label>
        <input type="text" name="nombreNuevo" value="'.$registro['nombre'].'" placeholder="Ingrese su nuevo nombre">
        <label>Contraseña nueva</label>
        <input type="text" name="contraNueva" value="'.$registro['contrasena'].'" placeholder="Ingrese su nueva contraseña">
        <input type="submit" name="modificar" value="Modificar">
        </form>';
    }

    /* Modificar usuario */
    if(isset($_POST['modificar'])){
        $nombreNuevo = $_POST['nombreNuevo'];
        $contraNueva = $_POST['contraNueva'];

        $sql4 = "UPDATE usuarios SET nombre = '$nombreNuevo', contrasena = '$contraNueva' WHERE id_usuario = '$id_editar'";

        $editar = mysqli_query($conexion, $sql4) ? print("Registro modificado") : print("ERROR al modificar");
    }

    ?>

    <table border=1>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contraseña</th>
        </tr>

        <tr>
            <?php
                echo '<td>'.$registro['id_usuario'].'</td>';
                echo '<td>'.$registro['nombre'].'</td>';
                echo '<td>'.$registro['contrasena'].'</td>';
                echo '<td><a href="perfil.php?editar='.$registro['id_usuario'].'">Editar</a><td>';
                echo '<td><a href="perfil.php?eliminar='.$registro['id_usuario'].'" onclick="return confirm(\'Confirma borrar registro\')">Eliminar</a><td>';
            ?>
        </tr>

    </table>

</body>
</html>