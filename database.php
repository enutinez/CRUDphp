<?php 

/** Conexion a la base de datos
 * 
 */
class Database
{
	private $conexion;
	private $dbhost = "localhost";
	private $dbuser = "root";
	private $dbpass = "";
	private $dbname ="prueba";
	
	function __construct(){
		$this->connect_db();
	}
//CONEXION^**********************************************************************************************
	public function connect_db(){
		$this->conexion = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
		if (mysqli_connect_error()) {
			die("Fallo conexion a la base de datos.".mysqli_connect_error().mysqli_connect_error());
		}
	}

	public function sonitize ($var){
		$res = mysqli_real_escape_string($this->conexion,$var);
		return $res;
	}

	//CREAR*************************************************************************************************

	public function create($nombres, $apellidos, $celular, $correo){
		$sql = "INSERT INTO usuario (nombres, apellidos, celular, correo) VALUES ('$nombres','$apellidos','$celular','$correo')";
		$res = mysqli_query($this->conexion, $sql);

		if ($res) {
			return true;
		} else {
			return false;
		}
	}

//LEER**************************************************************************************************

	public function read(){
		$sql = "SELECT id_usuario, nombres, apellidos, celular, correo FROM usuario";
		$res = mysqli_query($this->conexion, $sql);
		if ($res) {
			return $res; 
		}
		
	}

	//TRAER UN SOLO REGISTRO*************************************************************************
			public function single_record($id){
			$sql = "SELECT * FROM usuario where id_usuario='$id'";
			$res = mysqli_query($this->conexion, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}

	//ACTUALIZAR*************************************************************************************
		public function update($nombres,$apellidos,$celular,$correo, $id){
			$sql = "UPDATE usuario SET nombres='$nombres', apellidos='$apellidos', celular='$celular', correo='$correo' WHERE id_usuario=$id";
			$res = mysqli_query($this->conexion, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

	//ELIMINAR*******************************************************************************************
		public function delete($id){
			$sql = "DELETE FROM usuario WHERE id_usuario=$id";
			$res = mysqli_query($this->conexion, $sql);
				if($res){
					return true;
				}else{
					return false;
				}
}



}

?>