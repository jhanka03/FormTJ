<?php
    class basedatos{

        private $con;
		private $dbequipo='localhost';
		private $dbusuario='root';
		private $dbclave='';
		private $dbnombre='ingresob192';


        //constructor
		function __construct(){
			$this->conectar();
		}//fin constructor


        



        //función para conectarse a la base de datos
		public function conectar(){
			$this->con = mysqli_connect($this->dbequipo, $this->dbusuario, $this->dbclave, $this->dbnombre);

			if(mysqli_connect_error()){
				die("Error: No se pudo conectar a la base de datos: " . mysqli_connect_error() . mysqli_connect_errno());
			}

		}//fin funcion conectar

        public function login($usuario,$clave){
           $sql= "select count(*) as registros from usuarios where usuario='$usuario' and clave='$clave'";
           $resultado= mysqli_query($this->con, $sql);
           return $resultado;
        }  

        //función para insertar datos
        public function insertar_reservas($nombre,$celular,$correo,$presupuesto,$destino,$observaciones,$fecha){
            $sql = "INSERT INTO reservas(res_nombre,res_celular,res_correo,res_presupuesto,res_destino,res_observaciones,res_fecha)
            VALUES ('$nombre', '$celular', '$correo', '$presupuesto', '$destino', '$observaciones','$fecha');";
            $resultado = mysqli_query($this->con, $sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
        }//fin insertar_datos

//metodo para consultar informacion
public function leer_tabla(){
    $sql="select * from reservas";
    $resultado = mysqli_query($this->con,$sql);
    return $resultado;
}


//metodo para eliminar un registro
public function eliminar_reserva($id){
$sql="delete from reservas where res_id=$id";
$resultado = mysqli_query($this->con,$sql);

if ($resultado==true) {
    return true;
} else {
    return false;
}



}


//Métodos para actualizar registro
//Metodo para seleccionar el registro
public function seleccionar_reserva($id){
    $sql="SELECT * FROM reservas WHERE res_id=$id";
    $resultado = mysqli_query($this->con, $sql);
    $retorno = mysqli_fetch_object($resultado);
    return $retorno;

}

//Método para actualizar reserva
public function actualizar_reserva($id,$nombre,$celular,$correo,$fecha,$observaciones){
$sql ="UPDATE reservas SET res_nombre='$nombre', res_celular='$celular', 
res_correo='$correo', res_fecha='$fecha', 
res_observaciones='$observaciones' WHERE res_id=$id";


$resultado = mysqli_query($this->con, $sql);

if ($resultado==true) {
    return true;
} else {
    return false;
}


}



    }// fin clase basedatos


?>



    