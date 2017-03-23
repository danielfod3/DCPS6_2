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
	<table>
			<tr>
			  <th>ID ESTUDIANTE</th>
				<th>NOMBRE </th>
				<th>CURSOS</th>
				
			</tr>
			<?php 
			foreach ($total as $datos) { ?>
			<tr>
			<td><center><?= $datos->id ?></center></td>
			<td><center><?= $datos->nombre ?></center></td>
			<td>
			<table>
			<tr>
			  <th>ID CURSO</th>
				<th>NOTA</th>
			</tr>
			<tr>
			  <td><center><?= $datos->id_curso ?></center></td>
			<td><center><?= $datos->nota_final ?></center></td>
			</tr>
			</table>
			</td>
			</tr>
			<?php } ?>
			
	</table>
  </body>
</html>
