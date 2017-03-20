<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Crear curso</title>
  </head>
  <body>
     <?= validation_errors(); ?>
    <?= form_open("Curso/registrar/validar")?>

    <label for="id">ID</label>
    <input type="input" name="id" placeholder="Id del Curso" /><br />

    <label for="nombre">NOMBRE</label>
    <input type="input" name="nombre" /><br />
    
    <label for="facultad">FACULTAD</label>
    <input type="input" name="facultad" /><br />

   <input type="submit" name="registrar" value="Registrar" />

  <?= form_close()?>
  </body>
</html>