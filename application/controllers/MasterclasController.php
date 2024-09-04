<?php
date_default_timezone_set('America/Mexico_City');

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

    public function nueva_sesion()
    {
        $this->load->view("nueva_sesion");
    }

    public function get_session($session)
    {
        // Obtener los datos de la sesión
        $dataSession = $this->MasterclassModel->getBySession($session);

        if ($dataSession) {
            // Crear el array de respuesta
            $response = array(
                "status" => "success",
                "data" => array(
                    "fecha" => $dataSession->fecha,
                    "hora" => $dataSession->hora,
                    "titulo" => $dataSession->titulo,
                    "docente" => $dataSession->docente,
                    "codigo" => $dataSession->codigo_alumno,
                    "img" => $dataSession->imagen,
                )
            );
        } else {
            // En caso de que no se encuentre la sesión, enviar un error
            $response = array(
                "status" => "error",
                "message" => "Sesión no encontrada."
            );
        }

        // Configurar la respuesta HTTP adecuada
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response))
            ->_display();
        exit;
    }


    public function acceso_alumno()
    {
        $codigo_alumno = 'R2120O2V';
        $nombre_alumno = "Raul Sandoval";
        $matricula = "MCDA24C001";
        $dataSesion = $this->MasterclassModel->getByCodigoAlumno($codigo_alumno);


        $data['masterclass'] = $dataSesion;


        $fecha_sesion = $dataSesion->fecha;
        $hora_sesion = $dataSesion->hora;


        //Validamos que sea la fecha actual
        if ($fecha_sesion == date("Y-m-d")) {
            // Combina la fecha y la hora en una sola cadena
            $fecha_hora_sesion = $fecha_sesion . ' ' . $hora_sesion;

            // Crea un objeto DateTime para la fecha y hora de la sesión
            $datetime_sesion = new DateTime($fecha_hora_sesion);

            // Crea un objeto DateTime para la fecha y hora actual
            $datetime_actual = new DateTime();

            // Compara las fechas y horas
            if ($datetime_sesion >= $datetime_actual) {
                // La fecha y hora de la sesión son mayores o iguales a la fecha y hora actual
                $is_valid = 1;
            } else {
                // La fecha y hora de la sesión son menores a la fecha y hora actual
                $is_valid = 0;
            }

            $data['is_valid'] = $is_valid;
        } else {
            echo false;
        }

        $data['alumno'] = $nombre_alumno;
        $data['matricula'] = $matricula;
        $this->load->view("acceso_alumno", $data);
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
            $dataInsert['status'] = 1;
            $dataInsert['session'] = $dataInsert['tipo'] . "-" . date('YmdHi');
            $dataInsert['acceso_docente'] = 'http://127.0.0.1/masterclass/acceso-docente';
            $dataInsert['acceso_alumno'] = 'http://127.0.0.1/masterclass/acceso-alumno/' . $dataInsert['session'];

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

    public function sala($session)
    {
        $dataMasterclass = $this->MasterclassModel->getBySession($session);
        $data = array(
            "masterclass" => $dataMasterclass
        );
        $this->load->view("informacion_sala", $data);
    }

    public function acceso_docente()
    {
        $this->load->view("acceso_docente");
    }

    public function validar_accesomasterclass()
    {
        $data = $this->input->post();

        $session = $this->MasterclassModel->getByAccesoDocente($data['correo'], $data['codigo']);
        if ($session) {
            // La sesión existe, realizar alguna acción con la sesión
            // Ejemplo: cargar una vista con la sesión o redirigir al usuario
            echo json_encode(["acceso" => 1, "session" => $session]);
        } else {
            echo json_encode(["acceso" => 0, "mesage" => "Acceso denegado. No se encontró la sesión."]);
        }
    }

    public function verifica_codigo_docente($codigo_moderador)
    {
        $response = $this->MasterclassModel->verifica_codigo_docente($codigo_moderador);
        echo json_encode(["existe" => $response]);
    }

    public function verifica_codigo_alumno($codigo_alumno)
    {
        $response = $this->MasterclassModel->verifica_codigo_alumno($codigo_alumno);
        echo json_encode(["existe" => $response]);
    }
}


/* End of file MasterclasController.php */
/* Location: ./application/controllers/MasterclasController.php */
