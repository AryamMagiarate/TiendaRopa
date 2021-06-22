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
$art=$_GET['id'];
 $conexion= mysqli_connect("127.0.0.1","root","");
 $consulta="SELECT*FROM ropa WHERE `id-ropa`='$art'";


 mysqli_select_db($conexion,"potrero_backend"); // Funcion de seleccion de la base de datos donde voy a hacer consultas que requiere dos parametros, la variable donde alojo la conexion y el nombre de la base de datos
 $datos= mysqli_query($conexion,$consulta); 
 $reg=mysqli_fetch_array($datos);




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
                              <a class="text-warning text-center text-decoration-none  w-50" href="indexCli.html">Inicio<br> <i class="material-icons px-4">fast_rewind</i></a>
                        </div>
                    </div>
                        
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="row">
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


                    <div class="col-4 col-sm-4">
                        <div class="row p-2">
                            <a href="carrito.html" class="text-warning text-center  rounded-circle">0 <br><i class="material-icons">shopping_cart</i></a>
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
                                    <h5 class="card-title text-primary">Buzo Nike</h5>
                                    <?php if ($reg['descripcion']){ ?>
                                    <p class="card-text"> <b><?php echo $reg['descripcion']; ?>
                                    <?php } ?></b></p>
                                    <?php if ($reg['precio']){ ?>
                                    <h6 class="text-primary text-center">$<?php echo $reg['precio']; ?></h6> <?php } ?></p>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                            <label class="btn btn-outline-primary" for="btnradio1"> S </label>

                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio2"> M </label>

                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio3"> L </label>

                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio4"> XL </label>

                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio5"> XXL </label>
                                    </div>
                                    <a href="carrito.html" class="btn btn-primary">Comprar</a>
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