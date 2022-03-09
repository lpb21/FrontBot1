<html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Llamado a la libreria sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="shortcut icon" type="image/jpg" href="img/RedBot.png" />
    <title>Claro Comercial</title>
</head>

<body>

    <script type="text/javascript">

        function send_data() {

            var enviar = document.getElementById('enviar_dato');
            //var nroRef = document.getElementById('nroRef').value;
            var nroRef = document.getElementById('nroRef').value
            var nroCta = document.getElementById('nroCta').value
            //var nombre = document.form_claro.nombre.value;

            if (nroRef == "") {
                //swal reemplaza el alert y hace el llamado a los objetos de la libreria SweetAlert
                swal('Oooops!', 'El campo de Nro de Cedula no puede estar vacio', 'error');
                nroRef.focus();
                return false;
            } else if (isNaN(nroRef)) {
                swal('Oooops!', 'El dato ingresado debe ser numerico', 'error');
                nroRef.focus();
                return false;
            } else if (nroCta == "") {
                swal('Oooops!', 'El campo no puede estar vacio', 'error');
                nroCta.focus();
                return false;
            } else if (isNaN(nroCta)) {
                swal('Oooops!', 'El dato ingresado debe ser numerico', 'error');
                nroCta.focus();
                return false;
            } else {
                nroRef = document.form_claro.nroRef.value;
                nroCta = document.form_claro.nroCta.value;


                $.ajax({
                    url:"/Enviar.php ",
                    method:"POST", //First change type to method here

                    data:{
                        nroRef: nroRef,
                        nroCta: nroCta // Second add quotes on the value.
                    },
                    success:function(response) {
                        console.log(response);
                        window.parent.window.alert("Registro Exitoso, Recuerda actualizar cada 5 para visualizar correctamente los datos");                
                        window.location = 'showInfo.php';
                },
                error:function(){
                    window.parent.window.alert("Ha ocurrido un error en el proceso de registro. Por favor, intenta nuevamente");
                }

                });


                /* var ajax = new XMLHttpRequest();
                ajax.open("POST", "Enviar.php", true);
                //ajax.open("POST", "showInfo.php", true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.send("nroRef=" + nroRef + "&nroCta=" + nroCta);
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        //window.parent.window.alert(ajax.responseText);
                        //window.parent.window.alert("¡Se ha realizado el registro de forma exitosa!");
                        document.form_claro.reset();
                        //<!-- Conversiones en thank you page-->
                        //sas_tmstp=Math.round(Math.random()*10000000000);
                        window.location = 'showInfo.php';
                    }
                    if (ajax.readyState != 4 && ajax.status != 200) {
                        window.parent.window.alert(ajax.responseText);
                        window.parent.window.alert("Ha ocurrido un error en el proceso de registro. Por favor, intenta nuevamente");
                        return false;
                    }
                } */
            }
        }
        
    </script>


    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
        <div>Verif. <span>Cliente</span></div>
    </div>
    <br>
    <form class="form_container" autocomplete="off" method="post" name="form_claro">
        <div class="login">
            <input type="text" placeholder="Nro de Cedula" id="nroRef" name="nroRef"> <!-- <br> -->
            <!--<input type="password" placeholder="password" name="password"><br>-->
        </div>
        <div class="nroCta">
            <input type="text" placeholder="Nro de Cuenta" id="nroCta" name="nroCta"> <!-- <br> -->
        </div>       
        <div class="send_form" action="Enviar.php" method="post">
            <input id="enviar_dato" type="button" value="Validar &#10095;" style="cursor:pointer" onclick="send_data();">
        </div>
    </form>
</body>

</html>
<?php
//include ("Enviar.php");

?>

