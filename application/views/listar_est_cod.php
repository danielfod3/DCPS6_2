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
			   <th>ID_matricula</th>
				<th>Nota_final</th>
				<th>Id_curso</th>
				<th>Id_estudiante</th>
				
			</tr>
			<tr>
				<td><center><?= $matricula->id?></center></td>
				<td><center><?= $matricula->nota_final?></center></td>
				<td><center><?= $matricula->id_curso?></center></td>
				<td><center><?= $matricula->id_estudiante?></center></td>
			</tr>
			<tr>
				<th>id</th>
				<th>nombre</th>
				<th>facultad</th>
			</tr>

                 <?php 
				 //echo "<p><pre>".var_dump($cursos)."</pre></p>";
				 foreach ($cursos as $curso) {?>
            <tr>
                 <td><center><?=$curso->id?></center></td>
                 <td><center><?=$curso->nombre?></center></td>
                 <td><center><?=$curso->facultad?></center></td>
            </tr>
				 <?php } ?>
			<tr>
				 <th>id</th>
				 <th>nombre</th>
                 <th>edad</th>
			</tr>
                 <?php 
				 //echo "<p><pre>".var_dump($estudiantes)."</pre></p>";
				 foreach ($estudiantes as $estudiante) {?>
            <tr>
                 <td><center><?=$estudiante->id?></center></td>
                 <td><center><?=$estudiante->nombre?></center></td>
                 <td><center><?=$estudiante->edad?></center></td>
            </tr>
				 <?php } ?>
	</table>
  </body>
</html>
