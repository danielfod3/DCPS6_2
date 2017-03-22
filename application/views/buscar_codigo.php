<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Busqueda por Codigo</title>
  </head>
  <body>
  <?= validation_errors(); ?>
    <?= form_open("Matricula/buscar_codigof/validar")?>

    <label for="id_estu">Ingrese codigo estudiante</label>
    <input type="input" name="id_estu"/><br />

    <input type="submit" name="buscar" value="buscar" />

  <?= form_close()?>

  </body>

</html>
</html>
