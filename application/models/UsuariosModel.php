<?php
class UsuariosModel extends CI_Model
{

    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Asegura que la base de datos esté cargada
    }

    // Método para crear un nuevo usuario
    public function crearUsuario($datos)
    {
        return $this->db->insert('usuarios', $datos);
    }

    // Método para obtener todos los usuarios activos
    public function obtenerUsuariosActivos()
    {
        $this->db->where('estatus', 1); // Solo selecciona usuarios activos
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }

    // Método para obtener todos los usuarios sin importar el estatus u otras condiciones
    public function obtenerTodosLosUsuarios()
    {
        $query = $this->db->get('usuarios'); // Obtiene todos los registros de la tabla
        return $query->result_array();
    }


    // Método para obtener usuarios con condiciones específicas
    public function obtenerUsuariosConCondiciones($condiciones = array())
    {
        if (!empty($condiciones)) {
            $this->db->where($condiciones);
        }
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }

    // Método para obtener un solo usuario por ID
    public function obtenerUsuarioPorId($id)
    {
        $query = $this->db->get_where('usuarios', array('id' => $id, 'estatus' => 1));
        return $query->row_array();
    }

    // Método para actualizar un usuario
    public function actualizarUsuario($id, $datos)
    {
        $this->db->where('id', $id);
        return $this->db->update('usuarios', $datos);
    }

    // Método para "eliminar" un usuario (eliminación lógica)
    public function eliminarUsuario($id)
    {
        $this->db->where('id', $id);
        $datos = array('estatus' => 0); // Cambia el estatus a inactivo
        return $this->db->update('usuarios', $datos);
    }
}
