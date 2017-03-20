<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Matricular curso</title>
  </head>
  <body>
     <?= validation_errors(); ?>
    <?= form_open("Matricula/agregar/".$id_curso)?>

    <label for="id">ID</label>
    <input type="input" name="id" placeholder="Documento de identidad" /><br />

    <label for="nota final">NOTA FINAL</label>
    <input type="input" name="nota final"/><br />

    <input type="submit" name="registrar" value="Registrar" />

  <?= form_close()?>
  </body>
</html>