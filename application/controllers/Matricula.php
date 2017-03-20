<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula extends CI_Controller {

     function __construct(){
    parent::__construct();
      $this->load->library('session');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
  }

  public function index($id_curso = NULL){
      if($id_curso != NULL){
          $data['id_curso'] = $id_curso;
          $this->load->view('registrar_matricula', $data);

      }

  }

  public function agregar($id_curso = NULL){

        $this->load->model('Estudiante_model');
        $this->load->model('Matricula_model');

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('nota_final', 'nota_final', 'required');

       if ($this->form_validation->run() == FALSE){
           $data['id_curso'] = $id_curso;
           $this->load->view('registrar_matricula', $data);

        }else{

          $value['id'] = $this->input->post('id');
          $estudiante = new Estudiante_model($value);
          $aux = $estudiante->buscar_estudiante();

          if ($aux == 1){
              $value2['nota_final'] = $this->input->post('nota_final');
              $value2['id_estudiante'] = $this->input->post('id');
              $value2['id_curso'] = $id_curso;

              $matricula = new Matricula_model($value2);
              $aux1 = $matricula->registrar();
              if ($aux1 != FALSE){
                  echo "Estudiante matriculado";
              }else{
                  echo "Error al matricular estudiante";
              }


          }else{
              $data['id_curso'] = $id_curso;
              $this->load->view('registrar_matricula', $data);
         }
      }

      

  }

}