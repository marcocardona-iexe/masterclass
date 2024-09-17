<?php
date_default_timezone_set('America/Mexico_City');

defined('BASEPATH') or exit('No direct script access allowed');


class SesionesController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("SesionesModel");
        $this->load->model("UsuariosModel");
    }

    public function nueva_sesion()
    {
        $this->load->view("nueva_sesion");
    }



    public function index()
    {
        $datasesiones = $this->SesionesModel->getAll();
        foreach ($datasesiones as $s) {
            //if (!empty($s->internalMeetingID)) {  // Verifica si internalMeetingID no está vacío o nulo
            // Corrige la etiqueta de cierre y asegura que el evento onclick esté bien formado
            $s->session = "<a href='#' onclick='ver_grabaciones(\"{$s->session}\", 1'>" . $s->session . "</a>";
            //}
        }
        $data = array(
            "sesiones" => $datasesiones
        );
        $this->load->view("lista_salas", $data);
    }


    public function get_talleres()
    {
        $dataTaller = $this->SesionesModel->get_talleres_fecha_anterior(date('Y-m-d'));

        // Configurar la respuesta HTTP adecuada
        $response = array(
            "status" => "success",
            "data" => array(
                "talleres" => $dataTaller,
            )
        );
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response))
            ->_display();
        exit;
    }



    public function get_session($session)
    {
        // Obtener los datos de la sesión
        $dataSession = $this->SesionesModel->getBySession($session);

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




    public function agregar_sesion()
    {
        // Configuración de carga de imagen
        $config['upload_path'] = './assets/images/bannes_sesiones/'; // Directorio donde se almacenará la imagen
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
            $imagePath = base_url() . 'assets/images/banners_sesiones/' . $uploadData['file_name'];

            // Obtener datos del formulario y añadir la ruta de la imagen
            $dataInsert = $this->input->post();
            $dataInsert['imagen'] = $imagePath;
            $dataInsert['status'] = 1;
            $dataInsert['session'] = $dataInsert['tipo'] . "-" . date('YmdHi');

            // Intentar guardar los datos en la base de datos
            if ($this->SesionesModel->create($dataInsert)) {
                // Respuesta de éxito en JSON
                echo json_encode(array('status' => 'success', 'message' => 'Datos guardados correctamente.'));
            } else {
                // Manejar error al guardar en la base de datos
                echo json_encode(array('status' => 'error', 'message' => 'Error al guardar los datos en la base de datos.'));
            }
        }
    }



    public function acceso_docente()
    {
        $this->load->view("acceso_docente");
    }

    public function validar_acceso_sesion()
    {
        $data = $this->input->post();

        // Primero, verificar si el correo pertenece a un docente
        $session = $this->SesionesModel->getByAccesoDocenteCodigo($data['correo'], $data['codigo']);
        if ($session) {
            echo json_encode(["acceso" => 1, "session" => $session, "admin" => 0]);
            return;
        }

        // Si no es un docente, verificar si el correo existe en la tabla de TI 
        $existeAdmin = $this->UsuariosModel->getByCorreo($data['correo']);
        if ($existeAdmin) {
            // Verificar si el código está asociado a un docente
            $session = $this->SesionesModel->getByAccesoCodigoDocente($data['codigo']);
            if ($session) {
                echo json_encode(["acceso" => 1, "session" => $session, "admin" => 1, "moderador" => $existeAdmin->nombre]);
            } else {
                echo json_encode(["acceso" => 0, "mensaje" => "Acceso denegado. No se encontró la sesión."]);
            }
        } else {
            echo json_encode(["acceso" => 0, "mensaje" => "Acceso denegado. Correo no encontrado."]);
        }
    }


    public function verifica_codigo_docente($codigo_moderador)
    {
        $response = $this->SesionesModel->verifica_codigo_docente($codigo_moderador);
        echo json_encode(["existe" => $response]);
    }

    public function verifica_codigo_alumno($codigo_alumno)
    {
        $response = $this->SesionesModel->verifica_codigo_alumno($codigo_alumno);
        echo json_encode(["existe" => $response]);
    }
}


/* End of file MasterclasController.php */
/* Location: ./application/controllers/MasterclasController.php */
