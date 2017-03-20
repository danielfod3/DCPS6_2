<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar Estudiante</title>
  </head>
  <body>
     <?= validation_errors(); ?>
    <?= form_open("Estudiante/registrar/validar")?>

    <label for="id">ID</label>
    <input type="input" name="id" placeholder="Documento de identidad" /><br />

    <label for="nombre">NOMBRE</label>
    <input type="input" name="nombre" /><br />
    
    <label for="edad">EDAD</label>
    <input type="input" name="edad" /><br />

   <input type="submit" name="registrar" value="Registrar" />

  <?= form_close()?>
  </body>
</html>