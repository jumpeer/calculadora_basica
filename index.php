<?php
	require("funciones.php");

	$op = "";
	$par1 = "";
	$par2 = "";

	$error = false;
	$mensaje_par1 = "";
	$mensaje_par2 = "";
	$mensaje_op = "";

	if(isset($_POST["op"]))
	{
		if(!empty($_POST["op"]))
		{
			$op = trim($_POST["op"]);

			switch($op)
			{
				case "+": 					 
					break;
		
				case "-": 					
					break;

				case "*": 					
					break;
		
				case "/": 					
					break;

				default: 
					$error = true;
					$mensaje_op = "<br>El operador ingresado es incorrecto";
			}
		}
		else
		{
			$error = true;
			$mensaje_op = "<br>Ingrese el Operador";
		}
	}
	
	if(isset($_POST["par1"]))
	{
		if(trim($_POST["par1"]) != "")
		{
			$par1 = intval($_POST["par1"], 10);
		}
		else
		{
			$error = true;
			$mensaje_par1 = "<br>Ingrese Número 1";
		}
	}

	if(isset($_POST["par2"]))
	{
		if(trim($_POST["par2"]) != "")
		{
			$par2 = intval($_POST["par2"], 10);
		}
		else
		{
			$error = true;
			$mensaje_par2 = "<br>Ingrese Número 2";
		}
	}

	$resultado = "";
	if(!$error)
	{
		switch($op)
		{
			case "+": $resultado = sumar($par1, $par2); break;
	
			case "-": $resultado = restar($par1, $par2); break;

			case "*": $resultado = multiplicar($par1, $par2); break;
	
			case "/": 
				if($par2 != 0)
				{
					$resultado = dividir($par1, $par2);
				}
				else
				{
					$resultado = "ERROR División por 0";
				}; break;

			default: $resultado = "Ingrese la Operación";
		}
	}
	else
	{
		$resultado = "Faltan Numeros";
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>CALCULADORA</title>			    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
	
	<!--<link rel="stylesheet" type="text/css" href="estilo.css" />-->	
</head>
<body>
	<br/>
	<div class="cointainer">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="row">
				<form action="calculadora.php" method="POST" class="form-horizontal">
					<div class="panel panel-primary class">
						<div class="panel-heading">Calculadora</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="par1" class="control-label col-md-4">Numero 1:</label>
								<div class="col-md-8">                        	
									<input type="number" name="par1" value="<?php echo $par1;?>" class="form-control">
									<font color="red"><?php echo $mensaje_par1;?></font>
								</div>
							</div>
							<div class="form-group">
								<label for="par2" class="control-label col-md-4">Numero 2:</label>
								<div class="col-md-8">                        	
									<input type="number" name="par2" value="<?php echo $par2;?>" class="form-control">
									<font color="red"><?php echo $mensaje_par2;?></font>
								</div>
							</div>
							<div class="form-group">
								<label for="op" class="control-label col-md-4">Operador:</label>
								<div class="col-md-8">                        	
									<input type="text" name="op" value="<?php echo $op;?>" class="form-control">
									<font color="red"><?php echo $mensaje_op;?></font>
								</div>
							</div>
							<div class="form-group"> 
								<div class="col-md-offset-4 col-md-8">
									<input type="submit" name="enviar" value="Resultado" class="btn btn-primary btn-block">
								</div>
							</div> 
						</div>
					</div>				
				</form>
			</div>
			<div class="row">				
				<div class="jumbotron">
					<div class="container">
						<h2>Resultado</h2> 
						<p><?php echo $resultado;?></p>						
					</div>
				</div>									
			</div>			
		</div>
		<div class="col-md-4"></div>
	</div>

	<script src="js/vendor/jquery-1.11.2.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
</body>
</html>