<?php

ini_set('display_errors',0);

if (isset($_POST["contrasena"]) && $_POST["contrasena"] == "zIw7*bW1") {
	$db = mysqli_connect("localhost", "root", "", "dbp_clarocom", "3306");
	$tabla = "tbl_rconsultas";
	$fecha1 = date("Y-m-d"." 06:00:00");
	$fecha2= date("Y-m-d"." 21:00:00");

	$regs = 0;
	$file = '"Nro_Registro", "Nro_Cta","Documento","Nombre","Saldo_Movil","Nro_Linea","Tipo_Cliente", "Tipo_Internet", "Tipo_Plan_Hogar, "Tipo_Plan_Movil", "Fecha_Registro"';
	
	if($db && $tabla !== ""){
		if ($resultado = mysqli_query($db, "SELECT PKEST_NCODIGO, CON_RR_CUENTA, CON_RR_DOCUMENTO, CON_RR_NOMBRES, CON_CTAALDIA_SALDO, CON_CTAALDIA_LINEA, CON_MIENLACE_DATO1, CON_MIENLACE_DATO2, CON_MIENLACE_DATO3, CON_MIENLACE_DATO4, EST_CFECHA_REGISTRO FROM $tabla WHERE EST_CFECHA_REGISTRO BETWEEN '$fecha1' and '$fecha2';")) {
			while ($row = mysqli_fetch_assoc($resultado)) {
				$file .= "\r\n" . '"'.
					$row['PKEST_NCODIGO'].'","' .
					$row['CON_RR_CUENTA'].'","' . 
					$row['CON_RR_DOCUMENTO'].'","' .					 
					$row['CON_RR_NOMBRES'].'","'. 
					$row['CON_CTAALDIA_SALDO'].'","' . 					
					$row['CON_CTAALDIA_LINEA'].'","' .
					$row['CON_MIENLACE_DATO1'].'","'.
					$row['CON_MIENLACE_DATO2'].'","'.
					$row['CON_MIENLACE_DATO3'].'","'.
					$row['CON_MIENLACE_DATO4'].'","'.
					$row['EST_CFECHA_REGISTRO'].'"';
				$regs++;
			}
			mysqli_free_result($resultado);
					

			if ($regs > 0) {
				header("Pragma: public");
				header("Expires: 0");
				$filename = "_reporte_".date('YmdHis').".csv";
				header("Content-type: application/x-msdownload");
				header("Content-Disposition: attachment; filename=$filename");
				header("Pragma: no-cache");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			
				echo $file;	
			} else {
				
				echo "<script>				
				alert('No hay registros en este momento, por favor intentalo mas tarde');			
				window.location.href='reporte.php';			
				</script>";
			}
		} else {
			echo "<script>
			alert('Se presentó un inconveniente al procesar la información: Intente nuevamente.');
			window.location.href='reporte.php';
			</script>";
			//echo 'Se presentó un inconveniente al procesar la información: ' . PHP_EOL . mysqli_error($db) . PHP_EOL . 'Intente nuevamente.';
		}
	} else {
		echo "<script>
		alert('Se presentó un inconveniente al conectar con la base de datos.');
		window.location.href='reporte.php';
		</script>";
		//echo 'Se presentó un inconveniente al conectar con la base de datos. ' . PHP_EOL . mysqli_error($db) . "==";
	}
	mysqli_close($db);
} else {
	echo "<script>
	alert('La clave no es valida. Intente nuevamante');
	window.location.href='reporte.php';
	</script>";
}

?>
</html>