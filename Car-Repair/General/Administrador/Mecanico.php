<?php
	function create_mecanico($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass){
		return mensaje($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass);
	}
	function mensaje($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass){
		if(!agregar($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass)){
			return "\"alert alert-danger\"";
		}
		return "";
	}
	function agregar($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass){
		$res = agregar_mecanico($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass);
		if($res == "incompleto"){
			$GLOBALS['alerta'] = "Error al agregar al mecánico. Los campos 'CUI' y 'Nickname' son obligatorios.";
			return false;
		} else if($res == "error"){
			$GLOBALS['alerta'] = "Error al agregar al mecánico. Por favor verifique los datos.";
			return false;
		}
		$GLOBALS['alerta_tipo'] = "\"hidden\"";
		$GLOBALS['alerta'] = "";
		return true;
	}
 	function agregar_mecanico($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass){
 		if($cui==null || $nickname==null){
 			return "incompleto";
 		}
 		return insertar("insert into empleado values('".$cui."','".$nombre."', '".$nickname."', '".$pass."', '".$correo."', '".$direccion."', '".$telefono."','".$nit."','".date("Y/m/d")."',1,1);");
 	}
?>