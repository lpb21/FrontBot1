<?php 

//include 'index.php';
//$nroCta = $_POST["nroCta"];

$db = mysqli_connect("localhost", "root", "", "dbp_clarocom", "3306");
$tabla = "tbl_rconsultas";

 ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css" type="text/css" media="screen">
    <link rel="shortcut icon" type="image/jpg" href="img/RedBot.png" />
    <title>Claro Comercial</title>
</head>

<body>
<div class="contenedor">
		<form action="#" class="formulario" id="formulario" name="formulario" method="GET">
			<div class="contenedor-inputs">
				<input type="text" name="cedula" placeholder="cedula">
				<!-- <input type="text" name="nroref" placeholder="nroref"> -->

				<!-- <div class="sexo">
					<input type="radio" name="sexo" id="hombre" value="hombre">
					<label class="label-radio hombre" for="hombre">Hombre</label>

					<input type="radio" name="sexo" id="mujer" value="mujer">
					<label class="label-radio mujer" for="mujer">Mujer</label>
				</div>

				<div class="terminos">
					<input type="checkbox" name="terminos" id="terminos">
					<label for="terminos">Acepto Terminos y Condiciones</label>
				</div> -->

				<ul class="error" id="error"></ul>
			</div>

			<button type="submit" class="btn" method="get">Consultar datos</button>
		</form>
		<!-- <div class="tabla">
			<table>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Sexo</th>
				</tr>			
			</table>
		</div> -->
	</div>
	<!-- //<script src="formulario.js"></script> -->
<?php 
$cedula=$_GET['cedula'];
//$nroref=$_POST['nroref'];

		//$ConsultaSQL="SELECT PKEST_NCODIGO, CON_MIENLACE_DATO1, CON_RR_DOCUMENTO, CON_RR_NOMBRES, CON_RR_CIUDAD, CON_RR_ULTPAGO, CON_RR_SALDO_ACT, CON_RR_RENTA_MEN, EST_CFECHA_REGISTRO, CON_CTAALDIA_SALDO, CON_CTAALDIA_LINEA, CON_RR_ESTADO from dbp_clarocom.tbl_rconsultas where CON_RR_DOCUMENTO is not null AND CON_RR_DOCUMENTO = '".$cedula."' AND CON_CTAALDIA_SALDO is not null limit 1;";// order// by PKEST_NCODIGO asc  ;
		$ConsultaSQL= "SELECT EST_CONSULTA, CON_RR_CUENTA, CON_RR_DOCUMENTO,CON_RR_NOMBRES, CON_CTAALDIA_SALDO,CON_CTAALDIA_LINEA, CON_MIENLACE_DATO1, CON_MIENLACE_DATO2, CON_MIENLACE_DATO3, CON_MIENLACE_DATO4, CON_RR_ESTADO FROM dbp_clarocom.tbl_rconsultas WHERE CON_RR_DOCUMENTO = '".$cedula."' ORDER BY PKEST_NCODIGO ASC limit 1;";
        //echo $ConsultaSQL;
        //exit;

        $result=mysqli_query($db,$ConsultaSQL);
        

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

    <div id="pricing-table" class="clear">
        <div class="plan">
            <h3><span>C.al dia</span></h3>
            <!-- <a class="signup" href="">Sign up</a> -->
            <ul>
                <li><b>Nro Doc: </b> <?php echo $mostrar['CON_RR_DOCUMENTO'] ?></li>
                <li><b>Nombre: </b> <?php echo $mostrar['CON_RR_NOMBRES'] ?></li>
                <li><b>Saldo: </b><?php echo $mostrar['CON_CTAALDIA_SALDO'] ?></li>
                <li><b>Nro Linea: </b><?php echo $mostrar['CON_CTAALDIA_LINEA'] ?></li>
                <li><b>Plan Datos:</b><?php echo $mostrar['CON_MIENLACE_DATO4'] ?></li>
            </ul>
            <?php 
	 ?>
        </div>
        <!-- <div class="plan" id="most-popular">
            <h3>Professional<span>$29</span></h3>
            <a class="signup" href="">Sign up</a>
            <ul>
                <li><b>5GB</b> Disk Space</li>
                <li><b>50GB</b> Monthly Bandwidth</li>
                <li><b>10</b> Email Accounts</li>
                <li><b>Unlimited</b> subdomains</li>
            </ul>
        </div> -->
        <!-- <div class="plan"> -->
            <!-- <h3><span>M.Enlace</span></h3>
             <a class="signup" href="">Sign up</a> -->
           <!--  <ul>
                <li><b>Nro de Cuenta: </b></li>
                <li><b>Ciudad: </b></li>
                <li><b>Fecha Ult Pago: </b></li>
                <li><b>Saldo Act: </b></li>
                <li><b>Renta Mensual: </b></li>
            </ul> -->
            
        <!-- </div> -->
        <div class="plan">
            <h3><span>M.Enlace</span></h3>
            <!-- <a class="signup" href="">Sign up</a> -->
            <ul>
                <li><b>Cuenta RR: </b> <?php echo $mostrar["CON_RR_CUENTA"] ?></li>
                <li><b>Tipo Cliente: </b> <?php echo $mostrar["CON_MIENLACE_DATO1"] ?></li>
                <li><b>Internet: </b> <?php echo $mostrar['CON_MIENLACE_DATO2'] ?></li>
                <li><b>Plan TV: </b> <?php echo $mostrar['CON_MIENLACE_DATO3'] ?></li>
                <!-- <li><b>Plan Datos: </b> <?php/* echo $mostrar['CON_MIENLACE_DATO4'] */?></li> -->
            </ul>
        </div>
        <?php 
	}
	 ?>
        <form action="index.php">    <!-- http://172.70.7.23:8081/"> -->
            <div class="button"> 
            <input type="submit" id="button" value="Validar nuevamente" style="cursor:pointer"> 
            </div>
        </form>
    </div>
</body>
</html>