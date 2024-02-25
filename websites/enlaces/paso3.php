<?php
    $fondo = $_GET['fondo'];
    $letra = $_GET['letra'];
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <link rel="stylesheet" href="css/paso3.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300&display=swap" rel="stylesheet">
        <link rel="icon" href="Imagenes/logo.png">
    <title>Enlace 3</title>
    
<?php
    echo '<style>

    a{
        display: inline-block;
        background-color:'.$fondo.' ;
        color: '.$letra.';
        font-size: 48px;
        font-family: "Akshar", sans-serif;
        border-bottom: 2px solid '.$fondo.';
        margin-top:5px;
        margin-left: 40px;
        margin-right: 10px;
        padding: 5px;
        border-radius: 5px;
        text-decoration: none;
    }

    a:hover{
        background-color:'.$fondo.' ;
        color: '.$letra.';
        border-bottom: 2px solid '.$letra.' ;
        border-top: 2px sol1id '.$letra.' ;
        transition-delay:.1s;
    }
    </style>';
    
?>
</head>
<body>
<?php

    if(isset($_GET['enviar'])){
        $cant = $_GET['cant'];

        for($i=1;$i<=$cant;$i++){
            $url = $_GET['url'.$i];
            $nombre = $_GET['nombre'.$i];
            echo '<div>';
            echo '<a href="'.$url.'" target="_blank">'.$nombre.'</a>';
            echo '</div>';
        }
    }
?>
</body>
</html>