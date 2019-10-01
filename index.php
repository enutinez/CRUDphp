<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD</title>

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
                    <div class="col-sm-8"><h2>Listado de  <b>Usuarios</b></h2></div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar usuario</a>
                    </div>
                </div>
            </div>

            <?php 
            	include("database.php");
            	$usuarios = new Database();
            	$familia = new Database();
            	$listado = $usuarios->read();
            	

            	
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>E-mail</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                 
                <tbody>  
                <?php
                /**
                * LECTURA Y ASIGNACION DE DATOS EN LA TABLA****************************************************************
                */
                while ($row = mysqli_fetch_object($listado)) {
            		
            	$id = $row->id_usuario;
            	$nombres = $row->nombres;
            	$apellidos = $row->apellidos;
            	$celular = $row->celular;
            	$correo = $row->correo;


                ?> 

                <tr>
					<td><?php echo $nombres;?></td>
					<td><?php echo $apellidos;?></td>
					<td><?php echo $celular;?></td>
					<td><?php echo $correo;?></td>
					<td>
					<a href="update.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
					<a href="delete.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
					</td>
				</tr>	

                <?php } ?> 
                          
                </tbody>
            </table>
        </div>
    </div>     

</body>
</html>