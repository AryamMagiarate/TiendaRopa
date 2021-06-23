<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">

    <title>Carrito de Compras</title>
</head>
<?php
 session_start();
 $conexion= mysqli_connect("localhost","id17014916_potrerobd","PotreroBase1.0");
 mysqli_select_db($conexion,"id17014916_potrero_backend");

 if (isset($_SESSION['usuario'])) {


 $idusuario=$_SESSION['usuario'];

 $consulta="SELECT carrito.idcarrito, carrito.cantidad, ropa.descripcion, ropa.talle, ropa.precio, ropa.direccionImagen
 FROM carrito
 inner join ropa ON carrito.`id-ropa`=ropa.`id-ropa`
 WHERE carrito.idusuario=$idusuario AND carrito.estadoCompra='pausado'";



 if (isset($_POST['cantidad'])&&isset($_POST['actualizar'])) {/*chequeamos que se hizo click en el boton actualizar */
 $cantidad=$_POST['cantidad'];
 $idcarrito=$_POST['actualizar'];
 $consultaActualizar="UPDATE carrito
 SET cantidad='$cantidad'
 WHERE idcarrito='$idcarrito'";
 mysqli_query($conexion,$consultaActualizar);

 }

 if (isset($_POST['eliminar'])) {
 $idcarrito=$_POST['eliminar'];
 $consultaEliminar="DELETE FROM carrito WHERE idcarrito='$idcarrito'";
 mysqli_query($conexion,$consultaEliminar);
 }
 $result=mysqli_query($conexion,$consulta);

 $total=0;

 $consultaCantidad="SELECT SUM(cantidad) as itemsCarrito FROM carrito WHERE idusuario='$idusuario' AND
 estadoCompra='pausado'";
 $resultcantidad=mysqli_query($conexion,$consultaCantidad);
 $datosCantidad=mysqli_fetch_array($resultcantidad);
 $cantCarr=$datosCantidad['itemsCarrito'];

 }else{
 header('location: login.php');
 }





?>

<body>


    <div class="container-fluid" style="background: linear-gradient(to top, #660033 0%, #003300 100%);">
        <div class="row py-3 justify-content-center align-items-center my-3"
            style="background: linear-gradient(to bottom, #660033 0%, #003300 100%);">
            <div class="col-sm-12 col-md-6">
                <div class="row p-2">
                    <h1 class="text-warning text-center">Tu Carrituou</h1>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="row">
                    <div class="col-4 col-sm-4">
                        <div class="row p-2">

                            <a class="text-warning text-center text-decoration-none  rounded-circle"
                                href="indexCli.php">Volver a Compras <br> <i
                                    class="material-icons px-4">shopping_bag</i></a>


                        </div>
                    </div>
                    <div class="col-4 col-sm-4">
                        <div class="row p-2">
                            <a class="text-warning text-center text-decoration-none rounded-circle"
                                href="salir.php">Salir<br><i class="material-icons px-3">login</i></a>
                        </div>
                    </div>


                    <div class="col-4 col-sm-4">
                        <div class="row p-2">
                            <a href="carrito.php"
                                class="text-warning text-center  rounded-circle"><?php echo($cantCarr);?> <br><i
                                    class="material-icons">shopping_cart</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php while ($reg=mysqli_fetch_array($result)) {
            $total +=$reg['cantidad']*$reg['precio']; ?>


        <div class="col-sm-12">
            <form action="carrito.php" method="POST">
                <div class="row justify-content-center align-items-center border border-warning w-75 p-2 m-2">
                    <div class="col-sm-6">
                        <img src="img/<?php echo($reg['direccionImagen']); ?>" alt="">
                    </div>
                    <div class="col-sm-6">
                        <div class="row justify-content-center align-items-center">
                            <h6 class="text-primary text-center">Descripcion</h6>
                            <h6 class="text-light text-center"><?php echo($reg['descripcion']); ?></h6>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <h6 class="text-primary text-center">Talle</h6>
                            <h6 class="text-light text-center"><?php echo($reg['talle']); ?></h6>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <h6 class="text-primary text-center">Precio</h6>
                            <h6 class="text-light text-center"><?php echo($reg['precio']); ?></h6>
                        </div>
                        <div class="row justify-content-center align-items-center m-2 p-2">
                            <h6 class="w-25 text-center text-light p-2">Cantidad</h6>
                            <input type="number" class="w-25 p-2" name="cantidad"
                                value="<?php echo($reg['cantidad']); ?>">
                            <button class="border border-light text-light bg-primary w-25 p-2" name="actualizar"
                                value="<?php echo($reg['idcarrito']); ?>">Actualizar</button>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <button class="text-center text-light border border-light bg-primary w-25" name="eliminar"
                                value="<?php echo($reg['idcarrito']); ?>">Eliminar</button>
                        </div>
                    </div>
            </form>

        </div>

        <?php } ?>

        <div class="row justify-content-center align-items-center w-75 m-2 p-2">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="text-center text-warning">TOTAL A PAGAR</h5>
                </div>
                <div class="col-sm-6">
                    <h5 class="text-center text-warning">$ <?php echo($total); ?></h5>
                </div>

            </div>

        </div>

        <div class="row justify-content-center align-items-center m-3 p-3">
            <div class="col-sm-12">
                <div class="row">
                    <h6 class="text-warning text-center">Hecho por: Mayra Magiarate</h6>
                </div>
            </div>
        </div>

    </div>

</body>

</html>