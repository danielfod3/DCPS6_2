<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model {

	private $id;
	private $nombre;
	private $facultad;


	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->id = isset($value->id)? $value->id : null;
				$this->nombre = isset($value->nombre)? $value->nombre : null;
				$this->facultad = isset($value->facultad)? $value->facultad : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'id':
			case 'nombre':
			case 'facultad':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}


	public function registrar() {
		$data = [
			'id' => $this->id,
			'nombre' => $this->nombre,
			'facultad' => $this->facultad,
		];

		return $this->db->insert('curso', $data);
	}

	public function obtener_todas() {
		$query = $this->db->get('curso');

		$result = [];

		foreach ($query->result() as $key=>$curso) {
			$result[$key] = new Curso_model($curso);
		}
		return $result;
	}

	public function obtener_datos() {
		$query = $this->db->get_where('curso', ['id' => $this->id]);
		$result = $query->result();
		if (empty($result)) {
			return FALSE;
		} else {
			$this->id = $result[0]->id;
			$this->nombre = $result[0]->nombre;
			$this->facultad = $result[0]->facultad;
			return $this;
		}	
	}

	public function obtener_curso($id) {

        $query = $this->db->get_where('curso', array('id' => $id));
        return $query->row_array();
	}


	public function actualizar() {
		$data = [
			'id' => $this->id,
			'nombre' => $this->nombre,
			'facultad' => $this->facultad
		];

		return $this->db->update('curso', $data, array('id' => $this->id));
	}

	public function obtener_curso_por_mtricula($matricula) {

		$cursos= [];

		$query = $this->db->get_where('curso', array('id' => $matricula->id_curso));

		foreach ($query->result() as $key=>$curso) {
			$cursos[$key] = new Curso_model($curso);
		}

		return $cursos;

		//var_dump($cursos);



}
}
