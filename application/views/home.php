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
    <ul>
    <li><a href="<?php echo site_url('Estudiante/registrar/formulario')?>">Registrar Estudiante</a></li>
    <li><a href="<?php echo site_url('Curso/registrar/formulario')?>">Crear Curso</a></li>
    <li><a href="<?php echo site_url('Estudiante/listar')?>">Listar Estudiantes</a></li>
    <li><a href="<?php echo site_url('Curso/listar')?>">Listar Cursos</a></li>
    <li><a href="<?php echo site_url('Matricula/buscar_codigof/formulario')?>">Listar datos estudiante dado su id</a></li>
    </ul>
  </body>
</html>
