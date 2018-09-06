<html>

<header>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css" />
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="Formulario.css" />
    
     <script type="text/javascript" src="Formulario.js"></script>
    <?php error_reporting(0); ?>
    </header>
    
<style>
    #tx_error{
        color: red;
        margin-left: 10px;
    }
</style>

<script>
    /*
    $(document).ready(function()
    {
        
    }
    */
</script>

  
<?php



function mostrar_alumno($Valor) {
    
    $link = mysql_connect('localhost','root');
    $DNI = $_POST['DNI'] ;
    $Legajo = $_POST['Legajo'] ;
    if ($DNI == null || $Legajo == null)
    {
        //echo "<script type='text/javascript'>alert('message');</script>";
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
    
    

    //return mysql_result($result, 0, $Valor);
    
    
    

    /*
    for ($i=0;$i<1000;$i++)
    {
        echo "Nombre: " .mysql_result($result, $i, 'alumnon')."<br>";
    }
    */
    
}

if(isset($_POST['submit']))
    {
        mostrar_alumno();
    } 
    
    
?>


    <div>
     <nav class ="navbar navbar-light bg-light">
             <a href="/" class="navbar-brand">Formulario de Consulta</a>     
     </nav>
     
     <div id="botones">
            <tr>
                    <form name="" action="formulario_alumno.php" method="POST">
                        <p>DNI:    <input type="number" id="DNI"  name="DNI"></p>
                        <p>Legajo: <input type="number" id="Legajo" name="Legajo"></p>
                        <!--<button class="btn btn-secondary" id="buscar" name="buscar" type="submit">Buscar Alumno</button> -->
                        <p><input type="submit" value="Buscar" name="submit" id="submit"> <span id="tx_error"></span></p>
                   
                    </form>
                        
                    </form>
                        
                        
      
            </tr>
     </div>
    
     
     <div class="col-md-7" id="Tablas">
                
                 <table class="table table-bordered">
                    <h2>Alumno:</h2>
                     <thead> 
                         <tr>
                             <!-- <th>Alumno</th> -->
                             <th>Nombre</th>
                             <th>Fecha de nacimiento</th>
                             <th>Sexo</th>
                             <th>Curso</th>
                             <th>Preceptor</th>
                         </tr>
                     </thead>
                     <tbody>
                            

                            
                          <td name="Nombre" id="Nombre">
                                <?php
                                    //echo mostrar_alumno("alumnon");
                                    //echo $Nombre;
                                ?>
                          </td> 
                          <td name="f_nac" id="f_nac">
                                <?php
                                    //echo mostrar_alumno("fnacimiento");
                                ?>
                          </td> 
                          <td name="sexo" id="sexo">
                                <?php
                                    //echo mostrar_alumno("sexoid");
                                ?>
                          </td> 
                          <td name="curso" id="curso">
                                <?php
                                    //echo mostrar_alumno("curson");
                                ?>
                          </td>
                          <td name="preceptor" id="preceptor">
                                <?php
                                    //echo mostrar_alumno("preceptorn");
                                ?>
                          </td>
                     </tbody>
                     <tbody>
                         <!--
                          <td>Materia</td> 
                          <td>nota</td> 
                          <td>numero inasistencias</td>
                          <td>periodo1</td>
                          -->
                     </tbody>
                 </table>
             </div>
     
             <div id="datos_alumno"></div>
 </div>

    <body>
        
    </body>
</html>