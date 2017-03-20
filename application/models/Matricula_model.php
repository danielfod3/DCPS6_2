<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula_model extends CI_Model {

	private $nota_final;
    private $id_curso;
    private $id_estudiante;


	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->nota_final = isset($value->nota_final)? $value->nota_final : null;
                $this->id_curso = isset($value->id_curso)? $value->id_curso : null;
                $this->id_estudiante = isset($value->id_estudiante)? $value->id_estudiante : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'nota_final':
            case 'id_curso':
            case 'id_estudiante':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}


	public function registrar() {
		$data = [
			'nota_final' => $this->nota_final,
            'id_curso' => $this->id_curso,
            'id_estudiante' => $this->id_estudiante,
		];

		return $this->db->insert('matricula', $data);
	}

	public function obtener_todas() {
		$query = $this->db->get('matricula');

		$result = [];

		foreach ($query->result() as $key=>$curso) {
			$result[$key] = new Matricula_model($curso);
		}
		return $result;
	}

	// public function obtener_datos() {
	//    $query = $this->db->get_where('matricula', ['id' => $this->id]);
	// 	$result = $query->result();
	// 	if (empty($result)) {
	// 		return FALSE;
	// 	} else {
	// 		$this->id = $result[0]->id;
	// 		$this->nombre = $result[0]->nombre;
	// 		$this->facultad = $result[0]->facultad;
	// 		return $this;
	// 	}
	// }
}