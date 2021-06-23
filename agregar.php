<?php
 $conexion= mysqli_connect("localhost","id17014916_potrerobd","PotreroBase1.0");
 mysqli_select_db($conexion,"id17014916_potrero_backend");
 $tipoprenda= $_POST['tipo-prenda'];// $_POST se utiliza para enviar datos desde el html a la base seleccionada, por eso idicamos el nombre del campo dentro de corchetes
 $marca= $_POST['marca'];
 $talle= $_POST['talle'];
 $precio= $_POST['precio'];
 $descripcion= $_POST['descripcion'];
 $direccionImagen= $_POST['direccionImagen'];


$consulta="INSERT INTO ropa (`id-ropa`,`tipo-prenda`,marca,talle,precio, descripcion,direccionImagen) VALUES('','$tipoprenda','$marca','$talle','$precio','$descripcion','$direccionImagen')";
mysqli_query($conexion,$consulta);
header('location: listar.php');
?>