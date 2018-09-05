<html>
    <head>
        
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <link rel="stylesheet"s href="Sources/css2.css" type="text/css">
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <?php
        include ("conexionphp.php"); 
        

        $DNI = $_POST['DNI'] ;
        //$Legajo = $_POST['Legajo'] ;
        //echo $DNI;

        $result = mysql_query(
                "SELECT *
                FROM valumnos2 
                WHERE documento=$DNI"
               , $con);
            $row = mysql_fetch_row($result);

        if ($row != NULL)
                {
                    $Nombre = $row[2];
                    $Curso = $row[7];
                    $Preceptor = $row[8];
                    $Legajo = $row[4];
        
            $jquery = "
        <script>
        $(document).ready(function()
        {
            $('#Nombre').html('$Nombre');
            $('#curso').html('$Curso');
            $('#preceptor').html('$Preceptor');
            $('#DNI').html('$DNI');
            $('#Legajo').html('$Legajo');
            //$('#DNI').val($DNI);
            $('#Legajo').val( $Legajo);
        }); 
        </script>
        ";
        echo $jquery;
    }
    else echo "asdasd";
        ?>
    </head>
    <body>
        <div id="Botones">
            <button id="Atras" value="<-"></button>
            <button id="Desplegable" value="_"></button>
        </div>
        <div id="Cuerpo">
            <div id="Foto">
                <img src="Sources/logo.png" width="50" height="50">
                <h1 id="Nombre"></h1>
                <h2 id="DNI"></h2>
            </div>
            
            
            <div class="Campo">
                <div class="Icono">
                
                </div>
                <div class="Info">
                    <h1 class="Dato">??????????</h1>
                    <h2 class="Desc">Telefono</h2>
                </div> 
            </div>
            
            
            <div class="Campo">
                <div class="Icono">
                
                </div>
                <div class="Info">
                    <h1 class="Dato">????????????</h1>
                    <h2 class="Desc">Domicilio</h2>
                </div> 
            </div>
            
            
            <div class="Campo">
                <div class="Icono">
                
                </div>
                <div class="Info">
                    <h1 class="Dato" id="curso"></h1>
                    <h2 class="Desc">Curso</h2>
                </div> 
            </div>
            
            
            <div class="Campo">
                <div class="Icono">
                
                </div>
                <div class="Info">
                    <h1 class="Dato" id="preceptor"></h1>
                    <h2 class="Desc">Preceptor</h2>
                </div> 
            </div>
            
            
            <div class="Campo">
                <div class="Icono">
                
                </div>
                <div class="Info">
                    <h1 class="Dato" id="Legajo"></h1>
                    <h2 class="Desc">Legajo</h2>
                </div> 
            </div>
            
            
            <div class="Campo">
                <div class="Icono">
                
                </div>
                <div class="Info">
                    <h1 class="Dato">??????????????</h1>
                    <h2 class="Desc">Pare/Madre/Tutor</h2>
                </div> 
            </div>
        </div>
    </body>
</html>