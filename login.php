<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Ingreso</title>

</head>

</style>

<body class="blogin">
    <?php 
    $conexion= mysqli_connect("localhost","id17014916_potrerobd","PotreroBase1.0");
    mysqli_select_db($conexion,"id17014916_potrero_backend");
    $loginExitoso=true;
    if (isset($_POST['email'] )&& isset($_POST['password'])) {
        
        $email= $_POST['email'];
        $password= $_POST['password'];
      
       
       $consulta="SELECT * FROM usuarios WHERE (email='$email') AND (password='$password')";
        $login=mysqli_query($conexion,$consulta);
        if (mysqli_num_rows($login)==1) {/*la funcion mysqli_num_row trae la cantidad de filas resultantes del select que hicimos, como deberia tratarse de un solo usuario deberia ser una sola fila */
           $usuario=mysqli_fetch_array($login);
           session_start();
           $_SESSION['usuario']=$usuario['idusuario']; /*Creo una sesion para que el usuario se valide como tal */
           if ($usuario['rol']=='administrador') {
               header('location: index.html');
           }else{
           header('location: usuario.php');
           }
        }else{
            $loginExitoso=false;
        }
    }

  
    
    
    ?>

    <div class=" container-fluid">
        <div class="row py-4 px-0 justify-content-center align-items-center mb-3 " style="background: linear-gradient(to bottom, #003300 0%, #660033 100%); ">
            <div class="col-sm-12 col-md-6 ">
                <div class="row ">
                    <h1 class="text-warning text-center ">Potrero de Ropa</h1>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 ">
                <div class="row ">
                    <div class="col-6 col-sm-6 ">
                        <div class="row justify-content-center ">
                            <a class="text-warning text-center text-decoration-none w-50 " href="indexCli.php ">Inicio<br> <i class="material-icons px-4 ">fast_rewind</i></a>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 ">
                        <div class="row justify-content-center ">
                            <a class="text-warning text-center text-decoration-none w-50 " href="registro.php">Registrate <br><i class="material-icons px-3 ">assignment_ind</i></a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center p-2">
            <div class="col-sm-12">
                <div class="row justify-content-center text-center p-2 mx-4">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-sm-12 col-md-6">
                            <img class="img-fluid border border-warning rounded-circle w-25 h-25 p-2" src="img/user.png" alt="">
                        </div>
                    </div>
                    <h2 class="text-center text-warning p-2 m-0">Login</h2>
                    <div class="row justify-content-center align-items-center m-0 p-1">
                        <div class="col-sm-12  col-12 col-md-6 col-lg-6 text-center">
                            <form class="row p-2 m-0" id="forma" name="forma" method="POST" action="login.php">
                                 <div class="row p-2">  
                                <div class="col-sm-6"><div class="row"><label class="text-warning" for="nombre ">Email:</label></div></div>                                
                                <div class="col-sm-6"><div class="row"><input class=" border-1 border-warning bg-transparent" type="email" name="email" id="email" value=" " required="true"></div></div>
                                </div> 


                            <div class="row p-2">
                            <div class="col-sm-6"><div class="row"><label class="text-warning" for="password">Password</label></div></div>                               
                                   
                            <div class="col-sm-6"><div class="row"><input class="border-1 border-warning text-warning bg-transparent" type="password" name="password" id="password"  required="true"></div></div>
                                </div>  


                                
                                <?php if ($loginExitoso==false) {?>
                                <div class="row justify-content-center"><div class="col-sm-12 col-md-9 p-1 m-0"> <div class="row justify-content-center"><h6 class="text-light bg-danger p-2 m-1 text-center h-100 w-100">¡Usuario  o  contraseña no validos!</h6> </div></div></div>
                               <?php } ?>
                                <div class="row justify-content-center p-2">
                                    <div class="col-sm-6">
                                        <input class="text-light border border-light rounded-pill px-3 fs-5 bg-warning text-center" type="submit" value="Entrar " style="text-shadow:2px 1px 2px#003300">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>