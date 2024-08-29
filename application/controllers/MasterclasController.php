<?php
defined('BASEPATH') or exit('No direct script access allowed');


class MasterclasController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("MasterclassModel");
    }

    public function index()
    {
        $this->load->view("lista_masterclass");
    }

    public function nueva_masterclass()
    {
        $this->load->view("nueva_masterclass");
    }

    public function agregar_masterclass()
    {
        // Configuración de carga de imagen
        $config['upload_path'] = './assets/images/bannes_masterclass/'; // Directorio donde se almacenará la imagen
        $config['allowed_types'] = 'jpg|jpeg|png'; // Tipos de archivos permitidos
        $config['max_size'] = 2048; // Tamaño máximo del archivo en kilobytes (2MB)

        $this->load->library('upload', $config);

        // Intentar cargar la imagen
        if (!$this->upload->do_upload('imagen')) {
            // Manejar error de carga y devolver JSON
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(array('status' => 'error', 'message' => $error));
        } else {
            // Obtener información del archivo subido
            $uploadData = $this->upload->data();

            // Ruta del archivo que se guardará en la base de datos
            $imagePath = 'assets/images/bannes_masterclass/' . $uploadData['file_name'];

            // Obtener datos del formulario y añadir la ruta de la imagen
            $dataInsert = $this->input->post();
            $dataInsert['imagen'] = $imagePath;
            $dataInsert['session'] = "masterclass-" . date('Ymd');
            $dataInsert['link'] = 'http://127.0.0.1/masterclass/acceso/' . "masterclass-" . date('Ymd');

            // Intentar guardar los datos en la base de datos
            if ($this->MasterclassModel->create($dataInsert)) {
                // Respuesta de éxito en JSON
                echo json_encode(array('status' => 'success', 'message' => 'Datos guardados correctamente.'));
            } else {
                // Manejar error al guardar en la base de datos
                echo json_encode(array('status' => 'error', 'message' => 'Error al guardar los datos en la base de datos.'));
            }
        }
    }

    public function acceso_docente($session)
    {
        $dataMasterclass = $this->MasterclassModel->getBySession($session);
        $data = array(
            "masterclass" => $dataMasterclass
        );
        $this->load->view("acceso_docente", $data);
    }
}


/* End of file MasterclasController.php */
/* Location: ./application/controllers/MasterclasController.php */
