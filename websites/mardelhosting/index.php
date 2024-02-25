<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!--Fuente del título "Mardel Hosting"-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <!---->
    
    <!--Fuente de la clase "instancia"-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <!---->
    
    <!--Fuente del span del descuento-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
    <!---->
    
    <!--Fuente de las opciones-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <!---->
    
    <!--Fuente de el indicador de meses-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <!---->
    
    <!--Logo-->
    <link rel="icon" href="Imagenes/logo.png">
    <!---->
    <title>Página de Mardel Hosting</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="all">
        <form method="get">
            <div class="divh1">
                <div class="classh1">
                    <h1>Mardel Hosting</h1>
                </div>
            </div>
            
            <div class="classlegend">
                <legend class="legendtitulo">Elegir servicio</legend>
                
                <div class="opcionestodo">
                    <div class="packmediano">
                        <input type="radio" name="opcion" value="Mediano" style="visibility:hidden" class="punto" checked id="1">
                        <label for="1" class="mediano">Opcion Mediano<span class="fondosmensuales">$1200 mensuales</span></label>
                    </div>
        
                    <div class="packpro">
                        <input type="radio" name="opcion" value="Pro" style="visibility:hidden" class="punto" id="2">
                        <label for="2" class="pro">Opcion Pro <span class="fondosmensuales">$2200 mensuales</span></label>
                    </div>
                    
                    <div class="packmega">
                        <input type="radio" name="opcion" value="Mega" style="visibility:hidden" class="punto" id="3">
                        <label for="3" class="mega">Opcion Mega<span class="fondosmensuales">$4500 mensuales</span></label>
                    </div>
                </div>
                
                <div class="meses1">
                    <label class="instancia">Indique la cantidad de meses que se hospedará</label>
                    <div class="fondodescuento">
                        <label class="descuento" >*Por 12 meses o más, tenés un 20% de descuento*</label>
                    </div>
                </div>
            </div>
                <input type="number" name="meses" class="cantidadmeses" placeholder="Ingrese cantidad de meses" min="1">
                <div class="submit">
                <button type="submit" name="enviar" class="enviar" value="Calcular"><span>Calcular</span></button>
                </div>
        </form>
        
            
                <!--Apertura 1 php-->
                <?php
            if(isset($_GET['enviar'])){
                ?><!--Cierre 1 php-->
                
                <div class="return">
                    
                    <!--Apertura 2 php-->
                    <?php
                        $opcion = $_GET['opcion'];
                        $meses = $_GET['meses'];
                        
                        if ($meses >= 1){
                            switch($opcion){
                                case 'Mediano': {
                                    $precio = 1200;
                                    break;
                                }
                        
                                case 'Pro': {
                                    $precio = 2200;
                                    break;    
                                }
                        
                                case 'Mega': {
                                    $precio = 4500;
                                    break;
                                }
                        
                                default:{
                                    echo 'Opcion Invalida';
                                    break;
                                }
                            }
                        
                        echo 'El Plan de Hosting elegido: '.$opcion.' de $'.$precio.'/mes';
                    ?><!--Cierre 2 php-->
                    
                    <div class="montofinal">
                        
                        <!--Apertura 3 php-->
                        <?php    
                                if ($meses >= 12) {
                                    $descuento = ($precio*0.20);
                                    echo 'El descuento por un tiempo mayor al de doce meses es de: $'.$descuento.' ';
                                    $montofinal = $precio - $descuento;
                                    echo '<div>'.'El monto final a pagar es de: $'.$montofinal*$meses.'/año.'.'</div>';
                                } else if ($meses<=11 && $meses > 0){
                                    $montofinal = $precio*$meses;
                                    echo 'El monto final a pagar es de: $'.$montofinal;
                                } else {
                                    echo 'Error';
                                }
                        } else {
                                echo 'Error, ingrese cuantos meses se quedará en la estancia, por favor.';
                            }
                        ?><!--Cierre 3 php-->
                    </div>
                </div>
                <!--Apertura 4 php-->
                <?php
            }
                ?><!--Cierre 3 php-->
    </div>
</body>
</html>