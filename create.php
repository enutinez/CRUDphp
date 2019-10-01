<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> CRUD prueba con base de datos</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

	 <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Agregar <b>Usuario</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
/*
*Implementacion del metodo Create.
******************************************************************************************************************
*/

include("database.php");
$usuarios = new Database();
$usuarios->connect_db();

if (isset($_POST) && !empty($_POST)) {
	
	$nombres = $usuarios->sonitize($_POST['nombres']);
	$apellidos = $usuarios->sonitize($_POST['apellidos']);
	$celular = $usuarios->sonitize($_POST['celular']);
	$correo = $usuarios->sonitize($_POST['correo']);


	$res = $usuarios->create($nombres,$apellidos,$celular,$correo);
	if ($res) {
		$mensaje= "Datos insertados con éxito";
						$class="alert alert-success";
					}else{
						$mensaje="No se pudieron insertar los datos";
						$class="alert alert-danger";
					}

?>
<div class="<?php echo $class?>">
	<?php echo $mensaje; ?>
</div>

<?php
}

/*
***************************************************************************************************************************
*/

?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombres" id="nombres" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Apellidos:</label>
					<input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Teléfono celular:</label>
					<input type="text" name="celular" id="celular" class='form-control' maxlength="15" required >
				</div>
				<div class="col-md-6">
					<label>Correo electrónico:</label>
					<input type="email" name="correo" id="correo" class='form-control' maxlength="64" required>
				
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     

</body>
</html>
