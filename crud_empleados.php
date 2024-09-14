<?php

if (!empty($_POST)){
    $id = utf8_decode($_POST["txt_id"]);
    $codigo = utf8_decode($_POST["txt_codigo"]);
    $nombres = utf8_decode($_POST["txt_nombres"]);
    $apellidos = utf8_decode($_POST["txt_apellidos"]);
    $direccion = utf8_decode($_POST["txt_direccion"]);
    $telefono = utf8_decode($_POST["txt_telefono"]);
    $idPuesto = utf8_decode($_POST["drop_puesto"]);
    $nacimiento =utf8_decode($_POST["txt_fn"]);

    $sql = "";


    if (isset($_POST["btn_agregar"])) {
        $sql = "INSERT INTO empleados(codigo, nombres, apellidos, direccion, telefono, fecha_nacimiento, id_puesto) VALUES ('".$codigo."','".$nombres."','".$apellidos."', '".$direccion."', '".$telefono."', '".$nacimiento."', ".$idPuesto.")";

    }

    if (isset($_POST["btn_actualizar"])) {
        $sql = "UPDATE empleados SET codigo='".$codigo."',nombres='".$nombres."',apellidos='".$apellidos."',direccion='".$direccion."',telefono='".$telefono."',fecha_nacimiento='".$nacimiento."',id_puesto=".$idPuesto." WHERE id_empleado = ".$id.";";

    }

    if (isset($_POST["btn_borrar"])){
        $sql = "DELETE FROM empleados WHERE id_empleado = ".$id.";";

    }

    
      include("datos_conexion.php");
      $db_conexion = mysqli_connect ($db_host,$db_user,$db_pass,$db_db);

      
      
      if ($db_conexion->query($sql) === true) {
          $db_conexion->close();
          header("Location: /tarea1_php/empleado.php");
          exit();
      }else {
        echo "Error: " . $sql ."<br>".$db_conexion ->error;
      }

    

}



  ?>