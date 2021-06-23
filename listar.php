<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   
    <title>Lista</title>
</head>
<body class="bg-dark">
   <div class="container-fluid bg-dark">

   <div class="row p-3 m-1 text-center align-items-center">
            <div class="col-sm-6 h-100">
                <h1 class="text-info text-center w-100 h-100">Ver Prendas</h1>
            </div>
            <div class="col-sm-2 p-0">
                <div class="row m-1"> <a href="agregar.html" class="border border-info rounded-1  p-2 border border-info  text-decoration-none text-info w-100 h-100 text-center">Agregar</a></div>
            </div>
            <div class="col-sm-2 p-0">
                <div class="row m-1">
                    <a href="modificar.php" class="border border-info rounded-1 p-2 px-4 text-decoration-none text-info w-100 h-100 text-center">Modificar</a>
                </div>
            </div>
            <div class="col-sm-2 p-0">
                <div class="row m-1">
                    <a href="index.html" class="border border-info rounded-1 p-2 text-decoration-none text-info w-100 h-100 text-center">Inicio</a>
                </div>
            </div>
        </div>
<div class="row justify-content-center">
   
    <div class="col-sm-9">
<table class="table text-info fs-3">
  <thead>
    <tr>
      <th scope="col">codigo</th>
      <th scope="col">Tipo de Prenda</th>
      <th scope="col">Marca</th>
      <th scope="col">Talle</th>
      <th scope="col">Precio</th>
      <th scope="col">Descrip</th>
      <th scope="col">Dir img</th>
    </tr>
  </thead>

  <tbody >
  <?php
    // 1) Conexion
    $conexion= mysqli_connect("localhost","id17014916_potrerobd","PotreroBase1.0");
    $consulta="SELECT*FROM ropa";
    mysqli_select_db($conexion,"id17014916_potrero_backend"); // Funcion de seleccion de la base de datos donde voy a hacer consultas que requiere dos parametros, la variable donde alojo la conexion y el nombre de la base de datos
    $datos= mysqli_query($conexion,$consulta); //variable que guardara un string, definido por una consulta a la base de datos


    // ) Almacenamos los datos del envío POST
    // No se utiliza este paso en este caso puntual

    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla


    // 3) Ejecutar la orden y obtenemos los registros


    // 4) Mostrar los datos del registro
    while ($reg=mysqli_fetch_array($datos)) { ?>
    <tr>
      
      <td><?php echo $reg['id-ropa'];?></td> <!-- reg es la variable que sera un arreglo indexado, los indices como vamos son los nombres de los campos, por eso la instruccion fetch_array(), que indica que el string guardado en la variable 'datos' se convierta en un array -->
      <td><?php echo $reg['tipo-prenda']; ?></td>
      <td><?php echo $reg['marca']; ?></td>
      <td><?php echo $reg['talle']; ?></td>
      <td><?php echo $reg['precio']; ?></td>
      <td><?php echo $reg['descripcion']; ?></td>
      <td><?php echo $reg['direccionImagen']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</div>

    </div>


    
  
    
      
  
    
</body>
</html>
