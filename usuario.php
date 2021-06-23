<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">    

    <title>Document</title>
</head>
<?php
session_start();/*inicio sesion para el usuario */
$conexion= mysqli_connect("localhost","id17014916_potrerobd","PotreroBase1.0"); /*conecto al motor de base de datos */
mysqli_select_db($conexion,"id17014916_potrero_backend");/*selecciono la base de datos con la que voy a trabajar */
if (isset($_SESSION['usuario'])) {
    $idusuario=$_SESSION['usuario'];
    $consulta="SELECT nombre FROM usuarios WHERE idusuario=$idusuario";
    $result=mysqli_query($conexion,$consulta);/*guardo en dato el resultado de la consulta que es un objeto, el cual debo convertir en un array asociativo*/
    $dato=mysqli_fetch_array($result);
    $nombre=$dato['nombre'];
}
?>
<body>
    
        <div class="container-fluid" style="background: linear-gradient(to top, #660033 0%, #003300 100%);">
            <div class="row py-3 justify-content-center align-items-center my-3" style="background: linear-gradient(to bottom, #660033 0%, #003300 100%);">
                <div class="col-sm-12 col-md-6">
                    <div class="row p-2">
                        <h1 class="text-warning text-center">¡Hola <?php echo($nombre);?>!</h1>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-4 col-sm-4">
                            <div class="row p-2">

                                <a class="text-warning text-center text-decoration-none  rounded-circle" href="indexCli.php">Ir a Compras<br> <i class="material-icons px-4">shopping_bag</i></a>


                            </div>
                        </div>
                        <div class="col-4 col-sm-4">
                            <div class="row p-2">
                                <a class="text-warning text-center text-decoration-none rounded-circle" href="carrito.php">Mis Compras <br><i class="material-icons px-3">inventory_2</i></a>
                            </div>
                        </div>


                        <div class="col-4 col-sm-4">
                            <div class="row p-2">
                                <a href="salir.php" class="text-warning text-center  rounded-circle">Salir<br><i class="material-icons">flight_takeoff</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
</body>

</html>