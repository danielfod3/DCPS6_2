<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller {

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

    $this->load->model('Estudiante_model');

      if($opcion == "formulario"){

        $this->load->view('registrar_estudiante');

      }elseif ($opcion == "validar") {

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('edad', 'edad', 'required');
       
       if ($this->form_validation->run() == FALSE){

            $this->load->view('registrar_estudiante');

        }else{

          $value['id'] = $this->input->post('id');
          $value['nombre'] = $this->input->post('nombre');
          $value['edad'] = $this->input->post('edad');

          $estudiante = new Estudiante_model($value);
          $resultado = $estudiante->registrar();

          if($resultado == TRUE){
            echo "Estudiante registrado";
          }else{
            echo "Fallo al registrar estudiante";
          }

        }
        
      }
     
  }

  function listar(){

     $this->load->model('Estudiante_model');
     $resultado = $this->Estudiante_model->obtener_todas();

     $cantidad_estudiantes = count($resultado);
     for ($i=0; $i <  $cantidad_estudiantes; $i++) { 
       	$indice = "estudiante".($i+1);
      	$result[$indice] =  $resultado[$i];
     }

    $result['cantidad'] = $cantidad_estudiantes;
     $this->load->view('listar_estudiantes',$result);


  }
}