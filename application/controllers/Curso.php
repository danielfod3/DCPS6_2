<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller {

  function __construct(){
    parent::__construct();
      $this->load->library('session');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
  }

  function index(){
  $this->load->view('home');
  }


  function registrar($opcion = NULL){

    $this->load->model('Curso_model');

      if($opcion == "formulario"){

        $this->load->view('registrar_curso');

      }elseif ($opcion == "validar") {

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('facultad', 'facultad', 'required');
       
       if ($this->form_validation->run() == FALSE){

            $this->load->view('registrar_curso');

        }else{

          $value['id'] = $this->input->post('id');
          $value['nombre'] = $this->input->post('nombre');
          $value['facultad'] = $this->input->post('facultad');

          $curso = new Curso_model($value);
          $resultado = $curso->registrar();

          if($resultado == TRUE){
            echo "Curso creado";
          }else{
            echo "Fallo al crear curso";
          }

        }
        
      }
     
  }

  function listar(){

     $this->load->model('Curso_model');
     $resultado = $this->Curso_model->obtener_todas();

     $cantidad_cursos = count($resultado);
     for ($i=0; $i <  $cantidad_cursos; $i++) { 
       	$indice = "curso".($i+1);
      	$result[$indice] =  $resultado[$i];
     }

    $result['cantidad'] = $cantidad_cursos;
     $this->load->view('listar_cursos',$result);


  }


public function modificar($id = null, $modificacion = null){
	 $this->load->model('Curso_model');

	if($id != null) {

	 $this->load->model('Curso_model');
	 $curso = $this->Curso_model->obtener_curso($id);

	 $data["curso"] = $curso;

	 if($modificacion == NULL){
	 	$this->load->view('modificar_curso',$data);
	 }else{
		 
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('facultad', 'facultad', 'required');		
			
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('modificar_curso',$data);
		}
		else
		{
          $value['id'] = $this->input->post('id');
          $value['nombre'] = $this->input->post('nombre');
          $value['facultad'] = $this->input->post('facultad');

			//$this->Curso->construc($value);
			$curse = new Curso_model ($value);
			if ($curse->actualizar()){
				$data["curso"] = $value;
				$this->load->view('modificar_curso',$data);
				echo "Modificado exitosamente";
			}
		}
	 }

 	}
	else {
		redirect('/curso/listar');
	 }


 }
}
