<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SesionesModel extends CI_Model
{

    private $table = "sesiones";

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

    public function getByAccesoCodigoDocente($codigo)
    {
        $query = $this->db->get_where($this->table, ['codigo_docente' => $codigo]);

        // Verifica si se encontró al menos un resultado
        if ($query->num_rows() > 0) {
            // Retorna el campo 'session' del primer resultado

            return $query->row();
        } else {
            return false;
        }
    }


    public function get_talleres_fecha_anterior($fecha)
    {
        // Se utiliza 'where' con el operador '<'
        $this->db->where('fecha <', $fecha);
        $query = $this->db->get($this->table);

        // Verifica si se encontró al menos un resultado
        if ($query->num_rows() > 0) {
            // Retorna el primer resultado completo (puedes especificar un campo si es necesario)
            return $query->result(); // o $query->row() si solo esperas un único registro
        } else {
            return false;
        }
    }




    public function getByAccesoDocenteCodigo($correo, $codigo_docente)
    {
        $query = $this->db->get_where($this->table, ['correo_docente' => $correo, "codigo_docente" => $codigo_docente]);

        // Verifica si se encontró al menos un resultado
        if ($query->num_rows() > 0) {
            // Retorna el campo 'session' del primer resultado

            return $query->row();
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
