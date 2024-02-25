<?php

function redimensionarImg($image, $medidaFinal) {
    // Paso 1: Obtener atributos de la imagen
    list($anchoOriginal, $alturaOriginal, $nroTipo) = getimagesize($image);

    // Paso 2: Crear variable "imagen" según el tipo
    switch($nroTipo) {
        case 1: 
            $imageOriginal = imagecreatefromjpeg($image);
            break;
        case 2:
            $imageOriginal = imagecreatefrompng($image);
            break;
    }

    
    // Paso 3: Calcular ancho y alto final
    if($anchoOriginal > $alturaOriginal){
        $anchoFinal = $medidaFinal;
        $aspecto = $anchoOriginal / $alturaOriginal;
        $altoFinal = $anchoFinal / $aspecto;

    } else{
        $altoFinal = $medidaFinal;
        $aspecto = $anchoOriginal / $alturaOriginal;
        $anchoFinal = $altoFinal * $aspecto;
    }

    // Paso 4: Crear lienzo en blanco para la nueva imagen
    $nuevaImagen = imagecreatetruecolor($anchoFinal, $altoFinal);
    

    // Paso 5: Copiar imagen original en el nuevo lienzo en blanco
    imagecopyresampled($nuevaImagen, $imageOriginal, 0, 0, 0, 0, $anchoFinal, $altoFinal, $anchoOriginal, $alturaOriginal);
    
    // Paso 6: Se destruye la imagen original para liberar memoria
    imagedestroy($imageOriginal);

    // Paso 7: Calidad de la imagen
    $calidad = 100;

    // Paso 8: Nombre de la imagen final
    $nombreImagen = time().'_'.$image;

    // Paso 9: Guardar imagen en directorio
    imagejpeg($nuevaImagen, "imagenes/$nombreImagen", $calidad);

    // Paso 10: Retorno el nombre de la nueva imagen
    return $nombreImagen;

}

//$nuevaImagen = redimensionarImg(, 863);
//echo '<img src="imagenes/'.$nuevaImagen.'">';

?>