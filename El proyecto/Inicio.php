<html>
    <head>
        <link rel="stylesheet" href="Sources/css1.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <?php
        /*
            include ("conexionphp.php"); 
            function mostrar_alumno() {
                $DNI = $_POST['DNI'] ;
            if ($DNI == null)
                {
                    echo "
                        <script>
                        $(document).ready(function()
                        {
                            $('#tx_error').html('Ingresar DNI');
                            $('#DNI').val($DNI);
                        }); 
                    </script>
                    ";
                    return;
                } 
            $result = mysql_query(
                "SELECT *
                FROM valumnos2 
                WHERE documento=$DNI"
               , $con);
            $row = mysql_fetch_row($result);
            if ($row == null)
                {
                    echo "
                    <script>
                    $(document).ready(function()
                    {
                        $('#tx_error').html('No se encuentra alumno con ese DNI');
                        $('#DNI').val($DNI);
                    }); 
                    </script>
                    ";
                }
                else
                    header ('location: datosper.php');
                    
            }

        if(isset($_POST['submit']))
        {
        mostrar_alumno();
        } 
        */
        ?>
    </head>
    <body class="body body2">
        <div class="container" id="Cuerpo">
            <div id="Logo">
                <img src="Sources/logo.png">
            </div>
            <form method="post" action="datosper.php" method="POST">
                <input type="text" id="DNI" name="DNI" placeholder="DNI del Alumno">
                <div id="Boton">
                    <input type="submit" id="submit" name="submit" value="Consultar">
                    <samp id="ttx_error"></samp>
                </div>
                
            </form>
        </div>
    </body>
</html>