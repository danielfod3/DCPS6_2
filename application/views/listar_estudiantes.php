<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listar Estudiantes</title>
  </head>
  <body>
  <?= validation_errors(); ?>
    <?= form_open("Estudiante/listar/bot")?>

    <label for="edad">Edad mínima</label>
    <input type="input" name="edad"/><br />

    <input type="submit" name="registrar" value="Registrar" />

  <?= form_close()?>
    <table>
      <tr>
        <tr>
			<th>
				ID
			</th>
			<th>
				NOMBRE
			</th>
			<th>
				EDAD
			</th>
      </tr>
      <tr>
        <?php
        for ($i=0; $i < $cantidad ; $i++) {
          $nueva = ${"estudiante".($i+1)} ;?>
          <tr>
             <td><center><?= $nueva->id?></center></td>
             <td><center><?= $nueva->nombre?></center></td>
             <td><center><?= $nueva->edad?></center></td>
          </tr>
        <?php  } ?>
    </table>
  </body>
</html>
