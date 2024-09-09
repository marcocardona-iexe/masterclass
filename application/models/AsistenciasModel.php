<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Alumnos_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class AsistenciasModel extends CI_Model
{

  // ------------------------------------------------------------------------

  // Constructor
  public function __construct()
  {
    parent::__construct();
    // Cargar la base de datos
    $this->load->database();
    $this->table = 'asistencias';
  }

  // ------------------------------------------------------------------------

  // Método para crear un nuevo registro
  public function insert($data)
  {
    return $this->db->insert($this->table, $data);
  }

  // ------------------------------------------------------------------------

}

/* End of file Alumnos_model.php */
/* Location: ./application/models/Alumnos_model.php */