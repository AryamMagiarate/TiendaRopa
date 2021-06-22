
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Modificar</title>
</head>

<body class="bg-dark">
<?php
 $conexion= mysqli_connect("127.0.0.1","root","");
 mysqli_select_db($conexion,"potrero_backend");
 $datos=['id-ropa'=>'','tipo-prenda'=>'','marca'=>'','talle'=>'','precio'=>'','descripcion'=>'','direccionImagen'=>''];
 $tipoprenda='';
     $marca='';
     $talle='';
     $precio='';
     $idropa='';
     $descripcion='';
     $direccionImagen='';
    
 if (isset($_REQUEST['modificar'])) {/*comprueba primero que existe la variable modificar, que solo existe si apretamos el boton modificar en este caso */
    
     $tipoprenda= $_POST['tipo-prenda'];// $_POST se utiliza para enviar datos desde el html a la base seleccionada, por eso idicamos el nombre del campo dentro de corchetes
     $marca= $_POST['marca'];
     $talle= $_POST['talle'];
     $precio= $_POST['precio'];
     $idropa= $_POST['id-ropa'];
     $descripcion=$_POST['descripcion'];
     $direccionImagen=$_POST['direccionImagen'];
    
    
    
    
     
    $consulta="UPDATE ropa 
    SET `tipo-prenda`='$tipoprenda', marca ='$marca',talle='$talle', precio='$precio', descripcion='$descripcion', direccionImagen='$direccionImagen'
    WHERE `id-ropa`='$idropa'";
    mysqli_query($conexion,$consulta);
    header('location: modificar.php');
 }
 if (isset($_REQUEST['cargar'])) {
    $idropa= $_POST['id-ropa'];
     if (!$idropa.is_null) {
       
         $consulta="SELECT * FROM ropa WHERE `id-ropa`='$idropa'";
         $result= mysqli_query($conexion,$consulta);
         $datos=mysqli_fetch_array($result);
     }

 }
 
?>

    <div class="container-fluid bg-dark">

        <div class="row p-3 m-1 text-center align-items-center">
            <div class="col-sm-4 h-100">
                <h1 class="text-info text-center w-100 h-100">Modificar Prenda</h1>
            </div>
            <div class="col-sm-2 p-0">
                <div class="row m-1"> <a href="agregar.html" class="border border-info rounded-1  p-2 border border-info  text-decoration-none text-info w-100 h-100 text-center">Agregar</a></div>
            </div>
            <div class="col-sm-2 p-0">
                <div class="row m-1">
                    <a href="listar.php" class="border border-info rounded-1 p-2 px-4 text-decoration-none text-info w-100 h-100 text-center">Ver</a>
                </div>
            </div>
            <div class="col-sm-2 p-0">
                <div class="row m-1">
                    <a href="index.html" class="border border-info rounded-1 p-2 text-decoration-none text-info w-100 h-100 text-center">Inicio</a>
                </div>
            </div>
            <div class="col-sm-2 p-0">
                <div class="row m-1">
                    <a href="eliminar.html" class="border border-info rounded-1 p-2 px-4 text-decoration-none text-info w-100 h-100 text-center">Eliminar</a>
                </div>
            </div>
        </div>



        <div class="row justifi-content-center text-center text-info p-4">
            <div class="col-sm-6">
                <div class="row">
                    <img src="./img/eliminarPrenda.jpg" alt="">
                </div>

            </div>
            <div class="col-sm-6 ">
                <div class="row">
                    <form id="forma" name="forma" method="POST" action="modificar.php" class=" text-center w-100">
                        <div class="row m-3 ">
                            <label class="col-sm-4 text-end fs-4" for="id-ropa">Codigo:</label>
                            <input class="col-sm-4 border border-info" type="number" id="id-ropa" name="id-ropa" step="any" class="m-2" value="<?php echo $datos['id-ropa'];?>"><br>
                        </div>
                        <div class=" row m-3">
                            <label class="col-sm-4 text-end fs-4" for="tipo-prenda">Tipo de Prenda: </label>
                            <input class="col-sm-4 border border-info" type="text" id="tipo-prenda" name="tipo-prenda" class="m-3" value="<?php echo $datos['tipo-prenda'];?>"><br>
                        </div>
                        <div class="row m-3 ">
                            <label class="col-sm-4 text-end fs-4" for="marca">Marca:</label>
                            <input class="col-sm-4 border border-info" type="text" id="marca" name="marca"  class="m-3" value="<?php echo $datos['marca'];?>"><br>
                        </div>
                        <div class="row m-3">
                            <label class="col-sm-4 text-end fs-4" for="talle">Talle:</label>
                            <input class="col-sm-4 border border-info" type="text" id="talle" name="talle"  class="m-3" value="<?php echo $datos['talle'];?>"><br>
                        </div>
                        <div class="row m-3 ">
                            <label class="col-sm-4 text-end fs-4" for="precio">Precio:</label>
                            <input class="col-sm-4 border border-info" type="number" id="precio" name="precio" step="any" class="m-3" value="<?php echo $datos['precio'];?>"><br>
                        </div>
                        <div class="row m-3 ">
                            <label class="col-sm-4 text-end fs-4" for="precio">Descripcion</label>
                            <input class="col-sm-4 border border-info" type="text" id="descripcion" name="descripcion" class="m-3" value="<?php echo $datos['descripcion'];?>"><br>
                        </div>
                        <div class="row m-3 ">
                            <label class="col-sm-4 text-end fs-4" for="precio">Dir Imagen:</label>
                            <input class="col-sm-4 border border-info" type="text" id="precio" name="direccionImagen" class="m-3" value="<?php echo $datos['direccionImagen'];?>"><br>
                        </div>


                        <div class="row m-3 p-3 justify-content-center">
                            <div class="col-sm-3">
                                <input class="border border-info bg-dark text-center text-info rounded-3 fs-4 p-2" type="submit" name="modificar" value="Modificar">
                            </div>
                        </div>
                        <div class="row m-3 p-3 justify-content-center">
                            <div class="col-sm-3">
                                <input class="border border-info bg-dark text-center text-info rounded-3 fs-4 p-2" type="submit" name="cargar" value="Cargar Datos">
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>