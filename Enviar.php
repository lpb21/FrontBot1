<?php

setlocale(LC_ALL, "es_CO");
date_default_timezone_set('America/Bogota');
header('Access-Control-Allow-Origin: *');

try {
    $db = mysqli_connect("localhost", "root", "", "dbp_clarocom", "3306");
	$tabla = "tbl_rconsultas";	
	$nroRef = $_POST["nroRef"];
	$nroCta = $_POST["nroCta"];
    $fecha = date("Y-m-d H:i:s");
	$estado =('Activo');
	$estConsul =('Pendiente');
	
	//if($db && $tabla !== ""){

		$ConsultaSQL = "SELECT CON_RR_DOCUMENTO FROM $tabla WHERE CON_RR_DOCUMENTO ='$nroRef';";/* AND CON_CTAALDIA_SALDO IS NULL;";*/
		 //echo $ConsultaSQL;
		 //exit;
			if ($Result1 = $db->query($ConsultaSQL)){
			$CantidadResultados = $Result1->num_rows;
    			if ($CantidadResultados == 0) {	
					//echo ("prueba 123");
					//exit;
		//Ingresa los datos del formulario
					if ($Result2 = $db->query("INSERT INTO $tabla (CON_RR_DOCUMENTO,EST_CFECHA_REGISTRO, CON_RR_CUENTA, CON_RR_ESTADO,EST_CONSULTA) VALUES ('$nroRef','$fecha','$nroCta','$estado','$estConsul');")){

						echo "Success1";
					}else{
						echo "error";
					}
						 
				} else {
							echo "Success2";
							
						}
						mysqli_close($db);
					}else{
						
						echo "error";
					}
				} catch (\Exception $e) {
						echo 'Se presentó un inconveniente al procesar la información. Actualiza la pagina e intenta nuevamente';
}
?>