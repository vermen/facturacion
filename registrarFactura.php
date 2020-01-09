<?php
if (isset($_POST['guardar'])) {
    require_once("config.php");

    $config = new Config();

    $config-> setCaregoriaNombre($_POST['categoriaNombre']);
    $config-> setDescripcion($_POST['descripcion']);
    $config-> setImagen($_POST['imagen']);

    $config-> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='facturas.php'</script>";
}
?>