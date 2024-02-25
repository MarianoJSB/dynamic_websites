<!--
  MegaVentasOnline.com está festejando su décimo aniversario entregando descuentos por todas las compras 
  mayores a $5000.Para esto cuenta con una pequeña ruleta de 3 posiciones[15%, 25%, 40%]que ustades deberan 
  simular con la funcion random rand(1,3) que dara como resultado al azar entre uno y tres .
  ingresando el importe de la compra el programa debera generar el siguinete mensaje: "Hoy (fecha), usted a 
  gastado(importe)$ y la suerte le ha otorgado un (15%,25%,40%) de descuento, con lo cual solo aboanara 
  (importe con descuento otorgado)$. date("d/m/y"); 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="imagenes/logo.png">

    <!--Fuente del body-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <!---->

    <!--Fuente del h1-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <!---->

    <!--Fuente del placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <!---->
    
    <link rel="stylesheet" href="css/estilo.css">
    <title>Megaventas online</title>
</head>
<body>
    
    <h1>Megaventas online</h1>
    
        <form method="get">
            <div class="x">
            <label>Precio de la compra</label>
            <input type="number" name="importe" placeholder="Ingresar monto de la compra" min=1 class="monto">
            <h3>¡Porcentajes posibles de descuento: 15%, 25% o 40%!</h3>
            </div>
            <div class="texto">
            <label>Fecha de la compra</label>
            <input type="date" name="fecha" class="fecha">
            </div>

            <input  type="Submit" name="calcular" value="Calcular Monto" class="envio">

        </form>
    
<?php

    if(isset($_GET['calcular'])) {
        $fecha= $_GET['fecha'];
        $importe= $_GET['importe'];
        $azar = rand(1,3);

        if($importe>=1){
            switch($azar) {
            case 1: {
                $azar = 15;
                $monto = ($importe * $azar)/100;
                break;
            }
            case 2: {
                $azar = 25;
                $monto = ($importe * $azar)/100;
                break;
            }
            case 3: {
                $azar = 40;
                $monto = ($importe * $azar)/100;
                break;
            }
        }
        echo '<div class="datos">';
        echo 'En la fecha del '.$fecha.', usted a gastado $'.$importe;
        echo '<br>';
        echo 'Se le otorga un '.$azar.'% de descuento, el descuento en pesos es de: $'.$monto;
        echo '<br>';
        echo 'El monto final a pagar es de $'.($importe-$monto);
        echo '</div>';
        } else {
            echo '<p class="else">¡Por favor ingrese el monto de la compra!</p>';
        }
        
    }

?>
</body>
</html>