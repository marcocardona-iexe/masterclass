<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterclassModel extends CI_Model
{

    private $table = "masterclass";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Método para crear un nuevo registro
    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Método para obtener un registro por ID
    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function getBySession($session)
    {
        return $this->db->get_where($this->table, ['session' => $session])->row();
    }

    // Método para obtener todos los registros
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    // Método para actualizar un registro
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Método para eliminar un registro
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}

/* End of file MasterclassModel.php */
/* Location: ./application/models/MasterclassModel.php */
