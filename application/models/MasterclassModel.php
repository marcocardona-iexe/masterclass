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

    public function getByAccesoDocente($correo, $codigo_docente)
    {
        $query = $this->db->get_where($this->table, ['correo_docente' => $correo, "codigo_docente" => $codigo_docente]);

        // Verifica si se encontró al menos un resultado
        if ($query->num_rows() > 0) {
            // Retorna el campo 'session' del primer resultado

            return $query->row()->session;
        } else {
            return false;
        }
    }
    public function verifica_codigo_docente($codigo_docente)
    {
        $query = $this->db->get_where($this->table, ["codigo_docente" => $codigo_docente]);
        // Verifica si se encontró al menos un resultado
        if ($query->num_rows() > 0) {
            // Retorna el campo 'session' del primer resultado
            return true;
        } else {
            return false;
        }
    }
    public function verifica_codigo_alumno($codigo_alumno)
    {
        $query = $this->db->get_where($this->table, ["codigo_alumno" => $codigo_alumno]);
        // Verifica si se encontró al menos un resultado
        if ($query->num_rows() > 0) {
            // Retorna el campo 'session' del primer resultado
            return true;
        } else {
            return false;
        }
    }



    public function getBySession($session)
    {
        return $this->db->get_where($this->table, ['session' => $session])->row();
    }

    public function getByCodigoAlumno($codigo_alumno)
    {
        return $this->db->get_where($this->table, ['codigo_alumno' => $codigo_alumno])->row();
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
