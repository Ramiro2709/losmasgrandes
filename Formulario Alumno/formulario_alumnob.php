<html>

<head>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css" />
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Formulario.css" />
    <?php error_reporting(0); ?>

    <style>
body{
    background-color:#e0ebf9;
    margin-right: 120px;
    margin-left: 120px;
    }
    #tx_error{
        color: red;
        margin-left: 10px;
    }
    .col-md-7{
        border-color: black;
    }
    a{
        font-weight: bold;
    }
    data
    {
        width: 100%;
    }

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

<script>
    $(document).ready(function()
    {
        
        //$('#DNI').mask('00.000.000');
    });
</script>

    <?php
        function mostrar_alumno($Valor) {
            
            $link = mysql_connect('localhost','root');
            $DNI = $_POST['DNI'] ;
            $Legajo = $_POST['Legajo'] ;
            if ($DNI == null || $Legajo == null)
            {
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
            mysql_select_db('base1',$link);
            $result = mysql_query(
                "SELECT *
                FROM valumnos2 
                WHERE documento=$DNI
                    AND legajo=$Legajo  
                ", $link);

            if (mysql_result($result,0,0)>0)
            {
                $Nombre = mysql_result($result, 0, "alumnon");
                $F_Nac = mysql_result($result, 0, "fnacimiento");
                $Sexo = mysql_result($result, 0, "sexoid");
                if ($Sexo == 1)
                {
                    $Sexo = "Masculino";
                }
                else if ($Sexo == 2)
                {
                    $Sexo = "Femenino";
                }
                $Curso = mysql_result($result, 0, "curson");
                $Preceptor = mysql_result($result, 0, "preceptorn");
                
                $asd = 123;
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
</head>
    

    <div>
     <nav class ="navbar navbar-light bg-light">
             <a href="/" class="navbar-brand">Formulario de Consulta</a>     
     </nav>
     
     <div id="botones">
            <tr>
                    <form action="formulario_alumno.php" method="POST">
                        <p>Nro de DNI:    <input type="number" id="DNI"  name="DNI" placeholder="Ingrese solo Numeros" > </p>
                        <p>Nro de Legajo: <input type="password" maxlength="4" pattern="[0-9]*" id="Legajo" name="Legajo"placeholder="Ingrese solo Numeros"></p>
                        <p><input type="submit" value="Buscar" name="submit" id="submit"> <span id="tx_error"></span></p>
                    </form>
            </tr>
     </div>
    
     
     <div class="col-md-7" id="Tablas">
                
                 <table class="table table-bordered">
                    <h2>Alumno:</h2>
                     <thead> 
                         <tr>
                             <th>Apellido y Nombre</th>
                             <th>Fecha de Nacimiento</th>
                             <th>Sexo</th>
                             <th>Curso Actual</th>
                             <th>Preceptor/a</th>
                         </tr>
                     </thead>
                     <tbody name="data">
                          <td name="Nombre" id="Nombre"></td> 
                          <td name="f_nac" id="f_nac"></td> 
                          <td name="sexo" id="sexo"></td> 
                          <td name="curso" id="curso"></td>
                          <td name="preceptor" id="preceptor"></td>
                     </tbody>
                 </table>
             </div>
        <button id="botonLimpiar" onclick="limpiar()" >Limpiar</button>
        
    <body>



    </body>
</html>