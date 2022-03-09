<?php 

//include 'index.php';
//$nroCta = $_POST["nroCta"];

$db = mysqli_connect("localhost", "root", "", "dbp_clarocom", "3306");
//$fecha = $_POST["date"];
$nroRef = $_POST["nroRef"];
$nroCta = $_POST["nroCta"];

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
<?php 
        $ConsultaSQL ="SELECT ".$nroCta." FROM tbl_rconsultas WHERE PKEST_NCODIGO ='35';";
        //echo $ConsultaSQL;
        //exit;
		//$ConsultaSQL="SELECT PKEST_NCODIGO, CON_RR_CUENTA, CON_RR_DOCUMENTO, CON_RR_NOMBRES, CON_RR_CIUDAD, CON_RR_ULTPAGO, CON_RR_SALDO_ACT, CON_RR_RENTA_MEN, EST_CFECHA_REGISTRO, CON_CTAALDIA_SALDO, CON_CTAALDIA_LINEA, CON_RR_ESTADO FROM tbl_rconsultas WHERE CON_RR_DOCUMENTO IS NOT NULL AND CON_CTAALDIA_SALDO IS NOT NULL AND EST_CONSULTA = 'Validado' limit 1;";// order// by PKEST_NCODIGO asc  ;
		$result=mysqli_query($db,$ConsultaSQL);
        $ConsultaNombreRR="SELECT FROM";

		while($mostrar=mysqli_fetch_array($result)){
		 ?>


    <div id="pricing-table" class="clear">
        <div class="plan">
            <h3><span>C.al dia</span></h3>
            <!-- <a class="signup" href="">Sign up</a> -->
            <ul>
                <li><b>Nombre: </b> <?php echo $mostrar['CON_RR_NOMBRES'] ?></li>
                <li><b>Nro Doc: </b> <?php echo $mostrar['CON_RR_DOCUMENTO'] ?></li>
                <li><b>Saldo: </b><?php echo $mostrar['CON_CTAALDIA_SALDO'] ?></li>
                <li><b>Nro Linea: </b><?php echo $mostrar['CON_CTAALDIA_LINEA'] ?></li>
                <li><b>Dato 5: </b>'xxxxx'</li>
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
        <div class="plan">
            <h3><span>RR</span></h3>
            <!-- <a class="signup" href="">Sign up</a> -->
            <ul>
                <li><b>Nro de cuenta: </b><?php echo $mostrar["CON_RR_CUENTA"] ?></li>
                <li><b>Ciudad: </b><?php echo $mostrar["CON_RR_CIUDAD"] ?></li>
                <li><b>Fecha Ult Pago: </b><?php echo $mostrar['CON_RR_ULTPAGO'] ?></li>
                <li><b>Saldo Act: </b><?php echo $mostrar['CON_RR_SALDO_ACT'] ?></li>
                <li><b>Renta Mensual: </b><?php echo $mostrar['CON_RR_RENTA_MEN'] ?></li>
            </ul>
            <?php 
	
	 ?>
        </div>
        <div class="plan">
            <h3><span>Ascard</span></h3>
            <!-- <a class="signup" href="">Sign up</a> -->
            <ul>
                <li><b>Dato1</b> xxxx</li>
                <li><b>Dato2</b> xxxx</li>
                <li><b>Dato3</b> xxxx</li>
                <li><b>Dato4</b> xxxxxx</li>
                <li><b>Dato4</b> xxxxxx</li>
                
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