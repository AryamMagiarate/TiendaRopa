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


<body class="bregistro">
    <?php  

    $conexion= mysqli_connect("localhost","id17014916_potrerobd","PotreroBase1.0");
    mysqli_select_db($conexion,"id17014916_potrero_backend");
    $consulta="SELECT*FROM usuarios";
    $result= mysqli_query($conexion,$consulta);
  
    $mensaje;
    $emailregistrado=false;
    $registroexitoso=false;


if (isset($_REQUEST['enviar'])) {/*comprueba primero que existe la variable enviar, que solo existe si apretamos el boton enviar en este caso */
   
    $nombre= $_POST['nombre'];// $_POST se utiliza para enviar datos desde el html a la base seleccionada, por eso idicamos el nombre del campo dentro de corchetes
    $apellido= $_POST['apellido'];
    $password= $_POST['password'];
    $email= $_POST['email'];
    $rol='cliente';
    while ($reg=mysqli_fetch_array($result)) {
        if ($reg['email']==$email) {
            $emailregistrado=true;
              
    }
}
   if ($emailregistrado==false) {
    $consulta="INSERT INTO usuarios (idusuario, nombre, apellido, password, email, rol) VALUES ('','$nombre','$apellido','$password','$email','$rol')";

    mysqli_query($conexion,$consulta); 
    $registroexitoso=true;
    
   }
   
    
  
 
  

}
?>
    <div class="container-fluid">
        <div class="row py-4 px-0 justify-content-center align-items-center mb-3" style="background: linear-gradient(to bottom, #660033 0%, #003300 100%);">
            <div class="col-sm-12 col-md-6">
                <div class="row">
                    <h1 class="text-warning text-center">Potrero de Ropa</h1>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <div class="row justify-content-center">
                            <a class="text-warning text-center text-decoration-none  w-50" href="indexCli.php">Inicio<br> <i class="material-icons px-4">fast_rewind</i></a>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6">
                        <div class="row justify-content-center">
                            <a class="text-warning text-center text-decoration-none w-50" href="login.php">Ingresá <br><i class="material-icons px-3">login</i></a>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="row mt-4 mx-2 py-4 justify-content-center">

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6">
                    <div class="row justify-content-center"><img class="w-25 h-25" src="img/usuario.png" alt=""></div>
                    <h1 class="text-warning text-center">Registro de Usuarios</h1>
                </div>
            </div>
            <div class="contenido col-sm-12  col-md-6 p-3 text-warning">

                <form action="registro.php" method="POST" name="registrousuarios" class="position-relative top-50 start-50 translate-middle m-0 p-4">
                    <div class="row justify-content-center align-items-center  mx-3">
                    <?php if ($registroexitoso) {
                                echo ('<p class="text-warning border border-danger text-center mt-2">¡Registro Exitoso! ¡Ingrese a su Cuenta!</p>');
                            } ?>
                        <div class="col-sm-12 col-md-3 p-1">
                            <label class="w-100 p-1 text-center" for="email">Email </label>
                        </div>
                        <div class="col-sm-12 col-md-9 p-1">
                            <input class="w-100 p-1" type="email" required placeholder="...@email.com " id="email" name="email">
                            <?php if ($emailregistrado) {
                                echo ('<p class="text-warning border border-danger text-center mt-2">El email ingresado ya esta registrado!</p>');
                            } ?>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center mx-3">
                        <div class="col-sm-12 col-md-3 p-1">
                            <label class="w-100 p-1 text-center" for="nombre">Nombre </label>
                        </div>
                        <div class="col-sm-12 col-md-9 p-1">
                            <input class="w-100 p-1" type="text" required placeholder="...Nombre " id="nombre " name="nombre">
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center  mx-3">
                        <div class="col-sm-12 col-md-3 p-1">
                            <label class="w-100 p-1 text-center" for="apellido ">Apellido </label>
                        </div>
                        <div class="col-sm-12 col-md-9 p-1">
                            <input class="w-100 p-1" type="text " required placeholder="...Apellido " id="apellido " name="apellido">
                        </div>
                    </div><div class="row justify-content-center align-items-center  mx-3">
                        <div class="col-sm-12 col-md-3 p-1">
                            <label class="w-100 p-1 text-center" for="password">Contraseña</label>
                        </div>
                        <div class="col-sm-12 col-md-9 p-1">
                            <input class="w-100 p-1" type="password" required placeholder="...invente una contraseña " id="password" name="password">
                        </div>
                    </div>

                    <div class="row justify-content-center align-items-center  mx-3">

                        <button class="bg-warning text-light w-50 p-1 m-2 rounded-pill border border-light fs-4" style="text-shadow: 2px 1px 2px #330f21;" name="enviar" type="submit">Enviar</button>


                    </div>
                    








                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h1>Fin pagina</h1>
            </div>
        </div>
    </div>

</body>

</html>