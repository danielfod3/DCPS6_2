<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listar Cursos</title>
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
				FACULTAD
			</th>
      </tr>
      <tr>
        <?php
        for ($i=0; $i < $cantidad ; $i++) {
          $nueva = ${"curso".($i+1)} ;?>
          <tr>
             <td><center><?= $nueva->id?></center></td>
             <td><center><?= $nueva->nombre?></center></td>
             <td><center><?= $nueva->facultad?></center></td>
          </tr>
        <?php  } ?>
    </table>
  </body>
</html>
