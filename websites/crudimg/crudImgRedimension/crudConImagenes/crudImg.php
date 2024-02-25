<?php
    include("conexion.php");
    include("redimensionarImg.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD con Image</title>
    <link rel="stylesheet" href="styles/crudImg.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1>CRUD de Usuarios</h1>
    <h2>Registrar</h2>
    <h2>Actualizar</h2>
    <h2>Eliminar</h2>

    <!-- Formulario de perfil -->
    <form action="" enctype="multipart/form-data" method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre" placeholder="Ingrese su nombre" required>
        <label>Contraseña</label>
        <input type="password" name="contra" placeholder="Ingrese su contraseña" required>
        <label>Foto</label>
        <input type="file" name="foto" placeholder="Ingrese una foto">
        <input type="submit" name="registrar" value="Ingresar">
    </form>

    <!-- Redimensionamos la imagen ingresada, la guardamos y mostramos -->
    <?php
        // Si se presiona el input de enviar el formulario se ejecuta el if
        if(isset($_POST['registrar'])) {
            // Traemos los valores ingresados en el form
            $nombre = $_POST['nombre'];
            $contra = $_POST['contra'];

            // Si se subió una foto se ejecuta el condicional if, de lo contrario le mostramos una foto nuestra por default
            if(is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $dirFoto = $_FILES['foto']['tmp_name'];
                $nameFoto = $_FILES['foto']['name'];

                // Movemos la foto ingresada en la raíz de nuestro proyecto
                move_uploaded_file($dirFoto, $nameFoto);

                // Redimensionamos la foto y la guardamos en una variable $foto
                $foto = redimensionarImg($nameFoto, 200, 100);

                // Elimina la imagen original guardada en la raíz del proyecto
                unlink($nameFoto);

                // Mostramos la foto ingresada en el form
                // echo '<img src="imagenes/'.$foto.'">';

            } else {
                // En caso de que no se puede cargar la foto se mostrará una por default, que será "Si"
                $foto = 'minion.jpg';
            }

            $sqlInsert = "INSERT INTO usuarios(nombre, contrasena, foto) VALUES ('$nombre', '$contra', '$foto')";
            $consultaInsert = mysqli_query($conexion, $sqlInsert);
        }
    ?>

    <!-- Muestra de registros de usuarios de la db -->
    <h2>Listado de usuarios</h2>
    <?php
        // Realizamos una query para mostrar todos los registros de la tabla "usuarios"
        $sql = "SELECT * FROM usuarios";
        // Realizamos una query con los datos de la conexión al servidor junto a la sentencia SQL a ejecutar
        $consulta = mysqli_query($conexion, $sql);
        
        if(isset($_GET['idEliminar'])) {
            // Eliminamos la foto vinculada al id_usuario seleccionado para eliminar del directorio de la carpeta "imagenes"
            $idEliminar = $_GET['idEliminar'];
            $fotoEliminar = "SELECT foto FROM usuarios WHERE id_usuario='$idEliminar'";
            $buscarFoto = mysqli_query($conexion, $fotoEliminar);
            if($buscarFoto != "") {
                $registroFoto = mysqli_fetch_assoc($buscarFoto);
                // |
            }

            // Una vez eliminada la foto eliminamos el registro
            $eliminar = "DELETE FROM usuarios WHERE id_usuario='$idEliminar'";
            $consultaEliminar = mysqli_query($conexion, $eliminar) ? print("<script>alert('Confirme la eliminación'); window.location = 'crudImg.php' </script>") : print("<script>alert('ERROR al eliminar') window.location = 'crudImg.php' </script>");
        }

        if(isset($_GET['idEditar'])){
            $idEditar = $_GET['idEditar'];
            $sql_c = "SELECT * FROM usuarios WHERE id_usuario= '$idEditar'";
            $consulta_e = mysqli_query($conexion, $sql_c);
            $registro_e = mysqli_fetch_assoc($consulta_e);
            echo '<form action="" method="post">
            <label>Nombre actual</label>
            <input type="text" name="nuevoNombre" value="'.$registro_e['nombre'].'">
            <label>Contraseña actual</label>
            <input type="text" name="nuevaContra" value="'.$registro_e['contrasena'].'">
            <label>Imagen actual</label>
            <input type="hidden" name="fotoPrevia" value="'.$registro_e['foto'].'">
            <img src="imagenes/'.$registro_e['foto'].'">
            <input type="submit" name="actualizar" value="Actualizar">
            </form>';
            /**/
        }

        if(isset($_POST['actualizar'])) {
            $nuevoNombre = $_POST['nuevoNombre'];
            $nuevaContra = $_POST['nuevaContra'];
            $fotoPrevia = $_POST['fotoPrevia'];


            $sql_editar = "UPDATE usuarios SET nombre = '$nuevoNombre', contrasena = '$nuevaContra' WHERE id_usuario = '$idEditar'";
            $consulta_editar =  mysqli_query($conexion, $sql_editar) ? print("<script>alert('Confirme la edicion'); window.location = 'crudImg.php' </script>") : print("<script>alert('ERROR al editar') window.location = 'crudImg.php' </script>");
            // if(is_uploaded_file($_FILES['foto']['tmp_name'])) {
            //     $dirFotoNueva = $_FILES['foto']['tmp_name'];
            //     $nameFotoNueva = $_FILES['foto']['name'];

            //     // Movemos la foto ingresada en la raíz de nuestro proyecto
            //     $archivoNuevo = move_uploaded_file($dirFotoNueva, $nameFotoNueva);
                
            //     // Redimensionamos la foto y la guardamos en una variable $fotoNueva
            //     $foto = redimensionarImg($nameFotoNueva, 100, 100);

            //     // Elimina la imagen original guardada en la raíz del proyecto
            //     unlink($nameFotoNueva);
            // } else {
            //     $foto = $fotoPrevia;
            // }
            

        }

        // Si las rows(filas(registros de la db)) son 0, se mostrará un mensaje de "tabla vacía"
        if(mysqli_num_rows($consulta) == 0){
            echo 'No hay usuarios';
        } else{
            // En caso contrario, por cada registro de la tabla "usuarios" se mostrará un div con su información
            while($registro = mysqli_fetch_assoc($consulta)){
                echo '<div class="usuario">
                <img src="imagenes/'.$registro['foto'].'" alt="">
                <div class="datos">
                    <p>Id: '.$registro['id_usuario'].'</p>
                    <p>nombre: '.$registro['nombre'].'</p>
                    <p>Contraseña: '.$registro['contrasena'].'</p>
                    <div class="iconos">
                        <a href="crudImg.php?idEditar='.$registro['id_usuario'].'"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="crudImg.php?idEliminar='.$registro['id_usuario'].'"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>
            </div>';
            }
        }
    ?>
</body>
</html>