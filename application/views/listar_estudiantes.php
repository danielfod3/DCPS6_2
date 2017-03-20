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
             <td><center><?= $estudiante[$i]->id?></center></td>
             <td><center><?= $estudiante[$i]->nombre?></center></td>
             <td><center><?= $estudiante[$i]->edad?></center></td>
          </tr>
        <?php  } ?>
    </table>
  </body>
</html>
