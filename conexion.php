<?php
    $host = "j8oay8teq9xaycnm.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $user = "bp6zmw3vxu5ci4o1";
    $clave = "m4addzo719h7rl72";
    $bd = "hhp6m5pp8nngynhl";
    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");
?>
