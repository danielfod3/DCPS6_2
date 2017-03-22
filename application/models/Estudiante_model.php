<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante_model extends CI_Model {

	private $id;
	private $nombre;
	private $edad;


	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->id = isset($value->id)? $value->id : null;
				$this->nombre = isset($value->nombre)? $value->nombre : null;
				$this->edad = isset($value->edad)? $value->edad : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'id':
			case 'nombre':
			case 'edad':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}


	public function registrar() {
		$data = [
			'id' => $this->id,
			'nombre' => $this->nombre,
			'edad' => $this->edad,
		];

		return $this->db->insert('estudiante', $data);
	}

	public function obtener_todas() {
		$query = $this->db->get('estudiante');

		$result = [];

		foreach ($query->result() as $key=>$estudiante) {
			$result[$key] = new Estudiante_model($estudiante);
		}
		return $result;
	}

	public function obtener_datos() {
		$query = $this->db->get_where('estudiante', ['id' => $this->id]);
		$result = $query->result();
		if (empty($result)) {
			return FALSE;
		} else {
			$this->id = $result[0]->id;
			$this->nombre = $result[0]->nombre;
			$this->edad = $result[0]->edad;
			return $this;
		}
	}

	public function buscar_estudiante() {
		$this->db->select('nombre')
		     ->from('estudiante')
			 ->where('id', $this->id);

		$res = count($this->db->get()->result());
		return $res;
	}

	public function obtener_especifico($edad_minima) {

		$res1 = [];
		$query = $this->db->get_where('estudiante', array('edad >=' => $edad_minima));

		foreach ($query->result() as $key=>$estudiante) {
			$res1[$key] = new Estudiante_model($estudiante);
		}
		return $res1;
	}


	public function obtener_estudiante_por_mtricula($matricula) {

		$estudiantes= [];

		$query = $this->db->get_where('estudiante', array('id' => $matricula->id_estudiante));

		foreach ($query->result() as $key=>$estudiante) {
			$estudiantes[$key] = new Estudiante_model($estudiante);
		}
		return $estudiantes;

}

}
