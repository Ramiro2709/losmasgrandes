<?php
function mostrar_alumno($Valor) {
    
    $link = mysql_connect('localhost','root');
    $DNI = $_POST['DNI'] ;
    $Legajo = $_POST['Legajo'] ;
    //echo $DNI;    //mostra
    //echo $Legajo;  // mostrar
    if ($DNI == null || $Legajo == null)
    {
        echo "<script type='text/javascript'>alert('message');</script>";
        //echo "<div class='div_alerta'> </div>";
        echo "
        <script>
        $(document).ready(function()
        {
            $('#tx_error').html('Ingresar DNI y Legajo');
            $('#DNI').val($DNI);
            $('#Legajo').val( $Legajo);
        }); 
        </script>
        ";
        return;
    } 
    //echo $link;
    mysql_select_db('datos_alumnos',$link);
    $result = mysql_query("SELECT * FROM valumnos WHERE documento=$DNI AND legajo=$Legajo",$link);
//echo $result;
$row = mysql_fetch_row($result);
//echo $row[0];

    if ($row!= NULL)
    {
        $Nombre =  $row[1];
        $F_Nac = $row[4];
        $Sexo = $row[5];
        if ($Sexo == 1)
        {
            $Sexo = "Masculino";
        }
        else if ($Sexo == 2)
        {
            $Sexo = "Femenino";
        }
        $Curso = $row[6];
        $Preceptor = $row[7];
        
        $jquery = "
        <script>
        $(document).ready(function()
        {
            $('#Nombre').html('$Nombre');
            $('#f_nac').html('$F_Nac');
            $('#sexo').html('$Sexo');
            $('#curso').html('$Curso');
            $('#preceptor').html('$Preceptor');
            $('#DNI').val($DNI);
            $('#Legajo').val( $Legajo);
        }); 
        </script>
        ";
        echo $jquery;
    } else
    {
        echo "
        <script>
        $(document).ready(function()
        {
            $('#tx_error').html('No se encuentra alumno con ese DNI y legajo');
            $('#DNI').val($DNI);
            $('#Legajo').val( $Legajo);
        }); 
        </script>
        ";
    }    
}

if(isset($_POST['submit']))
    {
        mostrar_alumno();
    } 
?>
<html>
<header>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css" />
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <?php error_reporting(0); ?>
    
<style>
    #tx_error{color: red; margin-left: 10px;}
    body{background-image: url(gradient1.jpg);}
    nav{-webkit-border-radius: 51px 51px 0px 0px;}
    .navbar-brand{margin: 0px; border-color: black; padding: 15px;}
    .container{margin-top: 55px; padding:0px; background-color:#fff; padding-bottom: 35px; -webkit-border-radius: 51px 51px 51px 51px; /*background-image:url(indu2.jpg);background-repeat: no-repeat;background-size: cover;*/ -webkit-box-shadow: 15px 13px 26px 0px rgba(0,0,0,0.75);}
    .datos{-webkit-border-radius: 15px;padding: 3px; border-style: none; background-color: rgba(0,0,0,0.1);}
    .consulta{-webkit-border-radius: 25px;padding: 10px 45px 10px 45px; background-color:#fff; -webkit-box-shadow: 3px 1px 6px 0px rgba(0,0,0,0.35); border-style: none;}
    #formulario{margin-left: 35px;}
    button{padding: 10px 45px 10px 45px; background-color:#fff;-webkit-border-radius: 25px; margin-left: 35%;-webkit-box-shadow: 3px 1px 6px 0px rgba(0,0,0,0.35); border-style: none;}
</style>
<script type="text/javascript">
    function limpiar(){
            document.getElementById("DNI").value = null;
            document.getElementById("Legajo").value = null;
            document.getElementById("Nombre").innerHTML = "";
            document.getElementById("f_nac").innerHTML = "";
            document.getElementById("sexo").innerHTML = "";
            document.getElementById("curso").innerHTML = "";
            document.getElementById("preceptor").innerHTML = "";
        }
</script>
</header>
  

<body>
<div class="container">
     <nav class ="navbar navbar-light bg-light">
             <a href="/" class="navbar-brand">Formulario de Consulta</a>     
     </nav><br>
        <form name="" action="formulario_alumno2_1.php" method="POST" id="formulario">
            <p>Nro de DNI: <br><input type="number" class="datos" id="DNI" name="DNI" placeholder="Ingrese solo numeros"></p>
            <p>Nro de Legajo: <br><input type="password" class="datos" id="Legajo" name="Legajo" placeholder="Ingrese solo numeros"></p> 
            <input type="submit" value="Consultar" class="consulta" name="submit" id="submit"> <span id="tx_error"></span>
        </form><br>       
        <table class="table table-bordered">
                    <h2>Alumno:</h2>
                     <thead> 
                         <tr>
                             <th>Nombre</th>
                             <th>Fecha de nacimiento</th>
                             <th>Sexo</th>
                             <th>Curso</th>
                             <th>Preceptor</th>
                         </tr>
                     </thead>
                     <tbody>
                        <tr id="tabla">
                          <td scope="row" name="Nombre" id="Nombre"></td> 
                          <td scope="row" name="f_nac" id="f_nac"></td> 
                          <td scope="row" name="sexo" id="sexo"></td> 
                          <td scope="row" name="curso" id="curso"></td>
                          <td scope="row" name="preceptor" id="preceptor"></td>
                          </tr>
                     </tbody>
        </table><br>
         <button id="botonLimpiar" onclick="limpiar()">Limpiar</button>
</div>
</body>
</html>
