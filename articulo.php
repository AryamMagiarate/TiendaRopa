<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Buzos</title>
</head>

<body>
<?php
 session_start();
$art=$_GET['id'];
 $conexion= mysqli_connect("localhost","id17014916_potrerobd","PotreroBase1.0");
 $consulta="SELECT*FROM ropa WHERE `id-ropa`='$art'";


 mysqli_select_db($conexion,"id17014916_potrero_backend"); // Funcion de seleccion de la base de datos donde voy a hacer consultas que requiere dos parametros, la variable donde alojo la conexion y el nombre de la base de datos
 $datos= mysqli_query($conexion,$consulta); 
 $reg=mysqli_fetch_array($datos);

/*Logica de carrito */
$cantCarr=0;
if (isset($_POST['btnradio'])&&isset($_POST['cantidad'])) {/*si existen las variables, variables que solo existiran si el usuario hizo click sobre 'agregar al carrito' */
if (isset($_SESSION['usuario'])) {
    $idusuario=$_SESSION['usuario'];
       
        $idropa=$_POST['btnradio'];
        $cantidad=$_POST['cantidad'];
        $fecha=date('Y-m-d H:i:s'); /*funcion de agredado de fecha de php, fecha actual hora actual al apretar submit */
        $estadoCompra='pausado';
        $consulAgregar="INSERT INTO carrito (idcarrito, idusuario, `id-ropa`, cantidad, fecha, estadoCompra) VALUES ('', '$idusuario', '$idropa', '$cantidad','$fecha','$estadoCompra')";
        mysqli_query($conexion,$consulAgregar);

    }else{
        header('location: login.php');
    }

    
}
    
if (isset($_SESSION['usuario'])) {
    $idusuario=$_SESSION['usuario'];
    $consultaCantidad="SELECT SUM(cantidad) as itemsCarrito FROM carrito WHERE idusuario='$idusuario' AND estadoCompra='pausado'";
    $result=mysqli_query($conexion,$consultaCantidad);
    $datosCantidad=mysqli_fetch_array($result);
    if (!is_null($datosCantidad['itemsCarrito'])) {
        $cantCarr=$datosCantidad['itemsCarrito'];
    }
   
   
}




?>


    <div class="container-fluid" style="background: linear-gradient(to top, #660033 0%, #003300 100%);">
        <div class="row py-3 justify-content-center align-items-center my-3" style="background: linear-gradient(to bottom, #660033 0%, #003300 100%);">
            <div class="col-sm-12 col-md-6">
                <div class="row p-2 justify-content-center">
                            <div class="col-6 col-sm-6">
                                <div class="row justify-content-center">
                                    <h1 class="text-warning text-center">Buzos</h1>
                                </div>
                            </div>
                
                    <div class="col-6 col-sm-6">
                        <div class="row justify-content-center">
                              <a class="text-warning text-center text-decoration-none  w-50" href="indexCli.php">Inicio<br> <i class="material-icons px-4">fast_rewind</i></a>
                        </div>
                    </div>
                        
                </div>
            </div>
           
            <div class="col-sm-12 col-md-6">

                <div class="row">
                <?php if (!isset($_SESSION['usuario'])) {?>
                    <div class="col-4 col-sm-4">
                        <div class="row p-2">

                            <a class="text-warning text-center text-decoration-none  rounded-circle" href="registro.php">Registrate <br> <i class="material-icons px-4">assignment_ind</i></a>


                        </div>
                    </div>
                    <div class="col-4 col-sm-4">
                        <div class="row p-2">
                            <a class="text-warning text-center text-decoration-none rounded-circle" href="login.php">Ingresá <br><i class="material-icons px-3">login</i></a>
                        </div>
                    </div>
                    <?php } else{ ?>
                        <div class="col-4 col-sm-4">
                            <div class="row p-2">
                                <a class="text-warning text-center text-decoration-none rounded-circle"
                                    href="salir.php">Salir<br><i class="material-icons px-3">login</i></a>
                            </div>
                        </div>
                        
                        <?php } ?>


                    <div class="col-4 col-sm-4">
                        <div class="row p-2">
                            <a href="carrito.php" class="text-warning text-center  rounded-circle"><?php echo($cantCarr);?> <br><i class="material-icons">shopping_cart</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="row  justify-content-center">

                            <div class="card text-center border-3  border-warning" style="width: 25rem;">
                                <img class="card-img-top" src="img/<?php echo $reg['direccionImagen'];?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title text-primary"><?php echo(strtoupper($reg['tipo-prenda'].' '.$reg['marca']));?></h5>
                                    <?php if ($reg['descripcion']){ ?>
                                    <p class="card-text"> <b><?php echo $reg['descripcion']; ?>
                                    <?php } ?></b></p>
                                    <?php if ($reg['precio']){ ?>
                                    <h6 class="text-primary text-center">$<?php echo $reg['precio']; ?></h6> <?php } ?></p>
                                    <form action="art4.php?id=<?php echo($art);?>" method="POST">
                                    <h6 class="text-primary text-center p-2">Seleccione el Talle</h6>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1"  value="<?php echo($art);?>" autocomplete="off" checked>
                                            <label class="btn btn-outline-primary" for="btnradio1"> S </label>

                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2"  value="<?php echo($art+1);?>" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio2"> M </label>

                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3"  value="<?php echo($art+2);?>" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio3"> L </label>

                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio4"  value="<?php echo($art+3);?>" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio4"> XL </label>

                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio5"  value="<?php echo($art+4);?>" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio5"> XXL </label>

                                            
                                    </div>
                                    <div>
                                            <div class="row  justify-content-center align-items-center text-center"> 
                                            <label for="cantidad" class="border border-primary text-primary p-2 m-2 mx-0 rounded-1 w-25 text-center">Cantidad</label>
                                            <input type="number" name="cantidad" value="1" class="border border-primary text-center text-light bg-primary m-2 p-2 mx-1 w-25">
                                            </div>
                                    <button class="border border-primary bg-primary text-light text-center m-2 p-2 rounded-3" type="submit">Agregar al Carrito</button>
                                    </div>
                                    
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row p-3 my-3 mx-0">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                                        <div class="row">
                                           <h6 class="text-warning text-center">Hecho por: Mayra Magiarate</h6> 
                                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="row justify-content-center"> <i class="material-icons text-warning text-center">mail</i> </div>
                    <div class="row justify-content-center"><h6 class="text-warning text-center">aryamdelsolar@gmail.com <br> aryamdelsolar@outlook.com</h6></div>
                    </div>
                  
                </div>
            </div>
        </div>

    </div>
   
</body>

</html>