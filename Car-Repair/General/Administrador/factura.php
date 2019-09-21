<?php
	
	include_once (__DIR__."\..\BaseDatos\Consultas.php");
	function crear_mecanico($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass){
		$c = create_mecanico($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass); 
		if($c == ""){
			return true;
		}
		return false;
	}
	function create_mecanico($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass){
		$res = agregar_mecanico($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass);
		if($res == 1){
			return "";
		}
		else if($res == "incompleto"){
			return "Error al agregar al mecánico. Los campos 'CUI' y 'Nickname' son obligatorios.";
		} else {
			return "Error al agregar al mecánico. Por favor verifique los datos.";
		}
	}
 	function agregar_mecanico($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass){
 		if($cui==null || $nickname==null){
 			return "incompleto";
 		}
 		$consulta = "insert into empleado values('".$cui."','".$nombre."', '".$nickname."', '".$pass."', '".$correo."', '".$direccion."', '".$telefono."','".$nit."','".date("Y/m/d")."',1,1);";
 		return insertar($consulta);
 	}


 	function actualizar_mecanico($cui_anterior,$cui,$nombre,$correo,$nit,$direccion,$telefono,$fechaContratacion,$estado,$nickname,$pass){
 		if(update_mecanico($cui_anterior,$cui,$nombre,$correo,$nit,$direccion,$telefono,$fechaContratacion,$estado,$nickname,$pass) == ""){
 			return true;
 		}
 		return false;
 	}
	function update_mecanico($cui_anterior,$cui,$nombre,$correo,$nit,$direccion,$telefono,$fechaContratacion,$estado,$nickname,$pass){
		$res = editar_mecanico($cui_anterior,$cui,$nombre,$correo,$nit,$direccion,$telefono,$fechaContratacion,$estado,$nickname,$pass);
		if($res == 1){
			return "";
		} else if($res == "incompleto"){
			return "Error al agregar al mecánico. Los campos 'CUI' y 'Nickname' son obligatorios.";
		} else {
			return "Error al agregar al mecánico. Por favor verifique los datos.";
		}
	}
 	function editar_mecanico($cui_anterior,$cui,$nombre,$correo,$nit,$direccion,$telefono,$fechaContratacion,$estado,$nickname,$pass){
 		if($cui==null || $nickname==null){
 			return "incompleto";
 		}
 		$consulta =  "update empleado set cui = ".$cui.", nombre ='".$nombre."', nickname='".$nickname."', pass='".$pass."', correo='".$correo."', direccion='".$direccion."', telefono='".$telefono."',nit='".$nit."',fechaContratacion='".$fechaContratacion."',tipo=1,estado='".$estado."' where cui = ".$cui_anterior.";";
 		return insertar($consulta);
 	}

 	function eliminar_mecanico($cui){
 		if($cui ==null){
 			return false;
 		}
 		insertar("delete from empleado where cui = ".$cui.";");
 		return true;
 	}
?>