<?php
 $conexion= mysqli_connect("127.0.0.1","root","");
 mysqli_select_db($conexion,"potrero_backend");
 $tipoprenda= $_POST['tipo-prenda'];// $_POST se utiliza para enviar datos desde el html a la base seleccionada, por eso idicamos el nombre del campo dentro de corchetes
 $marca= $_POST['marca'];
 $talle= $_POST['talle'];
 $precio= $_POST['precio'];
 $descripcion= $_POST['descripcion'];

$consulta="INSERT INTO ropa (`id-ropa`,`tipo-prenda`,marca,talle,precio, descripcion) VALUES('','$tipoprenda','$marca','$talle','$precio','$descripcion')";
mysqli_query($conexion,$consulta);
header('location: listar.php');
?>