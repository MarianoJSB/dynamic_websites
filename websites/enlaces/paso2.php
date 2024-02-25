<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Prompt:wght@300&display=swap" rel="stylesheet">

    <!--Fuente de la página-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <!---->
    
    <link rel="icon" href="Imagenes/logo.png">
    <link rel="stylesheet" href="css/paso2.css">
    <title>Enlaces 2</title>
</head>
<body>

    <form action="paso3.php" method="GET">
        <?php
    
        $cant = $_GET['cant'];
        echo "<p>Enlaces</p>";
        echo '<br>';
    
        for($i=1; $i<=$cant; $i++){
            echo '<div>';
            echo '<label>Ingrese URL del enlace </label>';
            echo '<input class="input" type="url" name="url'.$i.'">';
            echo '</div>';
            echo '<div>';
            echo '<label>Ingrese nombre del enlace </label>';
            echo '<input class="input" type="text" name="nombre'.$i.'">';
            echo '</div>';
            echo '<br>';
        }
        echo '<input type="hidden" name="cant" value='.$cant.'>';
        ?>
    
        <label class="color">Color de fondo</label>
        <input type="color" name="fondo" class="color">
        <label class="color">Color de letra</label>
        <input type="color" name="letra" class="color">
        <input type="submit" name="enviar" value="Siguiente" class="enviar">

    </form>
</body>
</html>