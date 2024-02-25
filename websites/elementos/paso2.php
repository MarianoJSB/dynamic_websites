<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Fuente del título-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">
    <!---->

    <!--Fuente del "Siguiente" submit-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500&display=swap" rel="stylesheet">
    <!---->

    <!--Fuente de los elementos-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <!---->

    <!--Logo-->
    <link rel="icon" href="icono.png">
    <!---->

    <link rel="stylesheet" href="paso2.css">
    <title>Ingreso de elementos</title>
</head>
<body>

<form action="paso3.php" method="GET">

<?php

    $cant = $_GET['cant'];
    echo '<input type="hidden" name="cant" value="'.$cant.'">';
    echo '<div class="titulo">';
    echo '<label>Listas dinamicas</label>';
    echo '</div>';

    for($i=1; $i<=$cant; $i++){
        echo '<label>Elemento</label>';
        echo '<input class="input" type="text" name="elementos'.$i.'"  placeholder="Ingrese un elemento">';
        echo '<br>';
    }

?>

        <div class="radio2">
        <input type="radio" name="opcion" value="Ordenada" checked id="1">
        <label for ="1" class="opciones">Ordenada</label>

        <input type="radio" name="opcion" value="Numerada" id ="2">
        <label for ="2" class="opciones">Numerada</label>
        </div>
        
        <input type="submit" name="enviar" value="Siguiente" class="envio">
        
</form>

</body>
</html>