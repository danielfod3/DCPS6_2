<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?= validation_errors(); ?>

    <?php $documento = $curso['id']; ?>

    <?= form_open("curso/modificar/"."$documento"."/true")?>

    <label for="id">ID</label>
    <input type="input" name="id" value="<?php echo $curso['id'];?>" /><br />

    <label for="nombre">NOMBRE</label>
    <input type="input" name="nombre" value="<?php echo $curso['nombre'];?>" /><br />
    
    <label for="facultad">FACULTAD</label>
    <input type="input" name="facultad" value="<?php echo $curso['facultad'];?>" /><br />

   <input type="submit" name="modificar" value="Modificar" />

  <?= form_close()?>

  </body>
</html>
