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
    
    <!--Fuente de cada elemento-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <!---->

    <!--Logo-->
    <link rel="icon" href="icono.png">
    <!---->
    
    <link rel="stylesheet" href="paso3.css">
    <title>Lista por pantalla</title>
</head>
<body>

<?php

        $opcion = $_GET['opcion'];
        $cant = $_GET['cant'];
        echo '<p>Listas dinamicas</p>';
        
        switch($opcion){
        case 'Ordenada':{
            echo '<ul>';
            for($i=1;$i<=$cant;$i++){
                echo '<li>'.$_GET['elementos'.$i].'</li>';
            }
            echo '</ul>';
            break;
        }

        case 'Numerada':{
            echo '<ol>';
            for($i=1;$i<=$cant;$i++){
                echo '<li>'.$_GET['elementos'.$i].'</li>';
            }
            echo '</ol>';
            break;
        }

        default:{
            echo 'Opcion Invalida';
            break;
        }
    }
?>

</body>
</html>