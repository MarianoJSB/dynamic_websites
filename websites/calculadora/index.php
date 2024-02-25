<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imagenes/calculadora.png">
	<link rel="stylesheet" href="css/style.css">
	<title>Calculadora</title>
</head>
<body>

	<h1>Calculadora</h1>
	<form method="get">

	<label class="texto1">Primer numero</label>
	<input type="number" name="num1" class="numeros" placeholder="Ingrese el primer numero">

	<label class="texto1">Segundo numero</label>
	<input type="number" name="num2" class="numeros" placeholder="Ingrese el segundo numero">

	<label class="ope">Elegir operacion</label>
	<div class="imagenes">
	<input type="radio" name="opcion" value="suma" style="visibility:hidden" id="1">
	<label for="1"><img src="imagenes/operadores/mas.png" alt="Suma" title="Suma"></label>
	
	<input type="radio" name="opcion" value="resta" style="visibility:hidden" id="2">
	<label for="2"><img src="imagenes/operadores/resta.png" alt="Resta" title="Resta"></label>

	<input type="radio" name="opcion" value="multiplicacion" style="visibility:hidden" id="3">
	<label for="3"><img src="imagenes/operadores/multiplicacion.png" alt="Multiplicacion" title="Multiplicacion"></label>

	<input type="radio" name="opcion" value="division" style="visibility:hidden" id="4">
	<label for="4"><img src="imagenes/operadores/division.png" alt="Division" title="Division"></label>
	</div>
	<input type="submit" name="calcular" value="Calcular" class="envio">	

	</form>

<?php

	if(isset($_GET['calcular'])){
		$opcion = $_GET['opcion'];
		$num1 = $_GET['num1'];
		$num2 = $_GET['num2'];
	
	switch($opcion){
		case 'suma': {
			$resultado = $num1 + $num2;
			break;
		}
		case 'resta': {
			$resultado = $num1 - $num2;
			break;
		}
		case 'multiplicacion': {
			$resultado = $num1 * $num2;
			break;
		}
		case 'division': {
			$resultado = $num1 / $num2;
			break;
		}
		default:
            echo 'Opcion Invalida';
            break;
		
	}
	echo '<p>El resultado es: '.$resultado.'</p>';
}
	

?>

</body>
</html>