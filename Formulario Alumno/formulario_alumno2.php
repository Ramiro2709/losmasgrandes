<html>
<header>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css" />
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <?php error_reporting(0); ?>
</header>
    
<style>
    #tx_error{color: red; margin-left: 10px;}
    /*body{background-image: url(indu.jpg); background-repeat: no-repeat; background-size: cover;}*/
    body{/*background: -webkit-linear-gradient(top, rgba(15,32,39,1) 0%,rgba(32,58,67,1) 25%,rgba(44,83,100,1) 50%,rgba(44,83,100,1) 77%,rgba(15,32,39,1) 100%) background: -webkit-linear-gradient(top, rgba(131,164,212,1) 0%,rgba(182,251,255,1) 50%,rgba(131,164,212,1) 100%); background-color: #243B55;*/ background-image: url(gradient1.jpg);}
    nav{-webkit-border-radius: 51px 51px 0px 0px;}
    .navbar-brand{margin: 0px; border-color: black; padding: 15px;}
    .container{/*background: -webkit-linear-gradient(top, #1e5799 0%,#7db9e8 100%);*/ margin-top: 55px; padding:0px; background-color:#fff; padding-bottom: 35px; -webkit-border-radius: 51px 51px 51px 51px; /*background-image:url(indu2.jpg);background-repeat: no-repeat;background-size: cover;*/ -webkit-box-shadow: 15px 13px 26px 0px rgba(0,0,0,0.75)}
    .dentro{padding: 25px;}
    .datos{-webkit-border-radius: 10px;padding: 3px; border-style: none; background-color: rgba(0,0,0,0.1);}
    .consulta{-webkit-border-radius: 25px;padding: 5px 45px 5px 45px; background-color:cornflowerblue; -webkit-box-shadow: 5px 3px 16px 0px rgba(0,0,0,0.35); border-style: none;}
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
        echo "<div class='div_alerta'> </div>";
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
    mysql_select_db('basep',$link);
    $result = mysql_query("SELECT * FROM valumnos2 WHERE documento=$DNI AND legajo=$Legajo",$link);
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
<div class="container">
     <nav class ="navbar navbar-light bg-light">
             <a href="/" class="navbar-brand">Formulario de Consulta</a>     
     </nav>
    <div class="dentro">
     <div class="jumbootron" id="botones">
            <tr>
                    <form name="" action="formulario_alumno2.php" method="POST">
                        <p>Nro de DNI: <br><input type="number" class="datos" id="DNI" name="DNI" placeholder="Ingrese solo numeros"></p>
                        <p>Nro de Legajo: <br><input type="password" class="datos" id="Legajo" name="Legajo" placeholder="Ingrese solo numeros"></p> 
                        <input type="submit" value="Consultar" class="consulta" name="submit" id="submit"> <span id="tx_error"></span>
                    </form>          
            </tr>
        </div> 
        
                 <table class="table table-bordered">
                     <thead> 
                         <tr>
                             <th scope="col">Nombre</th>
                             <th scope="col">Fecha de nacimiento</th>
                             <th scope="col">Sexo</th>
                             <th scope="col">Curso</th>
                             <th scope="col">Preceptor</th>
                         </tr>
                     </thead>
                     <tbody>  
                          <td name="Nombre" id="Nombre" scope="row">
                          </td> 
                          <td name="f_nac" id="f_nac">
                          </td> 
                          <td name="sexo" id="sexo">
                          </td> 
                          <td name="curso" id="curso">
                          </td>
                          <td name="preceptor" id="preceptor">

                          </td>
                     </tbody>
                 </table>
        
         <button id="botonLimpiar" onclick="limpiar()">Limpiar</button>

        </div>
 </div>
</html>