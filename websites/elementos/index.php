<!DOCTYPE html>
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
    
    <!--Debajo está la fuente del input "Siguiente"-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Joan&display=swap" rel="stylesheet">
    <!---->
    
    <!--Debajo está la fuente de los números de Elementos-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <!---->
    
    <!--Logo-->
    <link rel="icon" href="icono.png">
    <!---->

    <link rel="stylesheet" href="paso1.css">
    <title>Cantidad de Elementos</title>
</head>
<body>

    <form action="paso2.php" method="get">
        <label>Listas dinamicas</label>
        <input type="number" class="max" name="cant"  placeholder="Máximo 5 elementos" min="1" max="5">
        <input type="submit" class="min" name="envio" value="Siguiente" >
    </form>

</body>
</html>