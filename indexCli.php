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
    <title>Potrero de Ropa</title>
</head>
<?php  


session_start();
 $conexion= mysqli_connect("localhost","id17014916_potrerobd","PotreroBase1.0");
 mysqli_select_db($conexion,"id17014916_potrero_backend");
$cantCarr=0;
 if (isset($_SESSION['usuario'])) {
    $idusuario=$_SESSION['usuario'];
    $consultaCantidad="SELECT SUM(cantidad) as itemsCarrito FROM carrito WHERE idusuario='$idusuario' AND estadoCompra='pausado'";
    $result=mysqli_query($conexion,$consultaCantidad);
    $datosCantidad=mysqli_fetch_array($result);


    $consultaNombre="SELECT nombre FROM usuarios WHERE idusuario=$idusuario";
    $resultNombre=mysqli_query($conexion,$consultaNombre);/*guardo en dato el resultado de la consulta que es un objeto, el cual debo convertir en un array asociativo*/
    $dato=mysqli_fetch_array($resultNombre);
    $nombre=$dato['nombre'];
    if (!is_null($datosCantidad['itemsCarrito'])) {
        $cantCarr=$datosCantidad['itemsCarrito'];
    }
}


?>

<body>
    <div class="container-fluid" style="background: linear-gradient(to top, #660033 0%, #003300 100%);">
        <div class="row py-3 justify-content-center align-items-center my-3"
            style="background: linear-gradient(to bottom, #660033 0%, #003300 100%);">
            <div class="col-sm-12 col-md-6">
                <div class="row p-2">
                    <h1 class="text-warning text-center">Potrero de Ropa</h1>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">

                <div class="row">
                    <?php if (!isset($_SESSION['usuario'])) {?>

                    <div class="col-4 col-sm-4">
                        <div class="row p-2">

                            <a class="text-warning text-center text-decoration-none  rounded-circle"
                                href="registro.php">Registrate <br> <i
                                    class="material-icons px-4">assignment_ind</i></a>
                        </div>
                    </div>
                    <div class="col-4 col-sm-4">
                        <div class="row p-2">
                            <a class="text-warning text-center text-decoration-none rounded-circle"
                                href="login.php">Ingresá <br><i class="material-icons px-3">login</i></a>
                        </div>
                        
                    </div>
                    <div class="col-4 col-sm-4">
                            <div class="row p-2">
                                <a href="carrito.php"
                                    class="text-warning text-center  rounded-circle"><?php echo($cantCarr);?> <br><i
                                        class="material-icons">shopping_cart</i></a>
                            </div>
                        </div>
                    <?php } else{ ?>

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
                    <div class="col-4 col-sm-4">
                        <div class="row p-2">
                            <a href="usuario.php"
                                class="text-warning text-center  rounded-circle"><?php echo($nombre);?> <br><i
                                    class="material-icons">account_circle</i></a>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>



        <div class="row m-4">
            <div class="row">
                <!--Buzos-->
                <div class="col-sm-12 m-1">
                    <div class="row p-2">
                        <h5 class="text-warning">Buzos</h5>
                    </div>
                    <div class="row">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row justify-content-center align-items-center text-center">
                                        <div class="col-4 col-sm-4">
                                            <a class="w-100 h-100" href="articulo.php?id=1"> <img src="img/buz1.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                        </div>
                                        <div class="col-4 col-sm-4">

                                            <a class="w-100 h-100" href="articulo.php?id=6"><img src="img/buz2.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                            </img>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <a class="w-100 h-100" href="articulo.php?id=11"> <img src="img/buz3.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row justify-content-center align-items-center text-center">
                                        <div class="col-4 col-sm-4">
                                            <a class="w-100 h-100" href="articulo.php?id=16"> <img src="img/buz4.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                        </div>
                                        <div class="col-4 col-sm-4">

                                            <a class="w-100 h-100" href="articulo.php?id=21"><img src="img/buz5.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                            </img>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <a class="w-100 h-100" href="articulo.php?id=26"> <img src="img/buz6.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--Remeras-->
                <div class="col-sm-12 m-1">
                    <div class="row p-2">
                        <h5 class="text-warning">Remeras</h5>
                    </div>
                    <div class="row w-85 p-2">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row justify-content-center align-items-center text-center">
                                        <div class="col-4 col-sm-4">
                                            <a class="w-100 h-100" href="articulo.php?id=31"> <img src="img/rem1.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                        </div>
                                        <div class="col-4 col-sm-4">

                                            <a class="w-100 h-100" href="articulo.php?id=36"><img src="img/rem2.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                            </img>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <a class="w-100 h-100" href="articulo.php?id=41"> <img src="img/rem3.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row justify-content-center align-items-center text-center">
                                        <div class="col-4 col-sm-4">
                                            <a class="w-100 h-100" href="articulo.php?id=46"> <img src="img/rem4.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <a class="w-100 h-100" href="articulo.php?id=51"> <img src="img/rem5.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <a class="w-100 h-100" href="articulo.php?id=56"> <img src="img/rem6.jpg"
                                                    class="d-block w-100 rounded-3" alt=""></a>
                                        </div>
                                    </div>

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--Pantalones-->
                    <div class="col-sm-12 m-1">
                        <div class="row p-2">
                            <h5 class="text-warning">Pantalones</h5>
                        </div>
                        <div class="row">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row justify-content-center align-items-center text-center">
                                            <div class="col-4 col-sm-4">
                                                <a class="w-100 h-100" href="articulo.php?id=61"> <img src="img/pan1.jpg"
                                                        class="d-block w-100 rounded-3" alt=""></a>
                                            </div>
                                            <div class="col-4 col-sm-4">

                                                <a class="w-100 h-100" href="articulo.php?id=66"><img src="img/pan2.jpg"
                                                        class="d-block w-100 rounded-3" alt=""></a>
                                                </img>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <a class="w-100 h-100" href="articulo.php?id=71"> <img src="img/pan3.jpg"
                                                        class="d-block w-100 rounded-3" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row justify-content-center align-items-center text-center">
                                            <div class="col-4 col-sm-4">
                                                <a class="w-100 h-100" href="articulo.php?id=76"> <img src="img/pan4.jpg"
                                                        class="d-block w-100 rounded-3" alt=""></a>
                                            </div>
                                            <div class="col-4 col-sm-4">

                                                <a class="w-100 h-100" href="articulo.php?id=81"><img src="img/pan5.jpg"
                                                        class="d-block w-100 rounded-3" alt=""></a>
                                                </img>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <a class="w-100 h-100" href="articulo.php?id=86"> <img src="img/pan6.jpg"
                                                        class="d-block w-100 rounded-3" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <h6>Footer</h6>
                    </div>
                </div>

            </div>




        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
        </script>
</body>

</html>