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

        $this->load->view("template/head");
        $this->load->view("template/header");
        $this->load->view("template/menu");

        $this->load->view("nueva_sesion");
        $this->load->view("template/footer", array("js" => "nueva_sesion.js"));
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
        $this->load->view("template/head");
        $this->load->view("template/header");
        $this->load->view("template/menu");

        $this->load->view("lista_salas", $data);
        $this->load->view("template/footer", array("js" => "lista_sesiones.js"));
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
        $config['upload_path'] = './assets/images/banners_sesiones/'; // Directorio donde se almacenará la imagen
        $config['allowed_types'] = 'jpg|jpeg|png'; // Tipos de archivos permitidos
        //$config['max_size'] = 2048; // Tamaño máximo del archivo en kilobytes (2MB)

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


    // Método para devolver la imagen correspondiente para el día
    public function get_masterclass()
    {
        // Obtener la fecha actual
        $current_date = date('Y-m-d');

        // Inicializar variable para la respuesta
        $response = [];

        // Primero buscar sesiones con fechas mayores o iguales a la fecha actual
        $this->db->select('*');
        $this->db->from('sesiones');
        $this->db->where('fecha >=', $current_date); // Solo fechas iguales o mayores a la fecha actual
        $this->db->where('tipo', 'MASTERCLASS'); // Solo fechas mayores a la fecha actual

        $this->db->order_by('fecha', 'ASC'); // Ordenar por fecha ascendente
        $query = $this->db->get();

        // Si hay sesiones con fechas futuras o la fecha actual
        if ($query->num_rows() > 0) {
            $results = $query->result_array();

            // Verificar si la fecha actual coincide con alguna fecha de la sesión
            foreach ($results as $session) {
                if ($session['fecha'] == $current_date) {
                    // Si la fecha es igual, retornar toda la información de ese registro
                    $response = [
                        'status' => 'success',
                        'data' => $session
                    ];
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode($response));
                    return; // Termina el método después de enviar la respuesta
                }
            }

            // Si no hay coincidencia, calcular el número de días hasta la primera sesión futura
            $days_until_first_session = (strtotime($results[0]['fecha']) - strtotime($current_date)) / (60 * 60 * 24);

            // Rotar las imágenes de acuerdo a los días transcurridos
            $index = $days_until_first_session % count($results); // Módulo para rotación
            $image_to_show = $results[$index]; // Obtener la imagen correspondiente

            // Armar la respuesta
            $response = [
                'status' => 'success',
                'data' => $image_to_show
            ];
        } else {
            // Si no hay fechas futuras ni sesión para hoy, devolver un mensaje de error
            $response = [
                'status' => 'error',
                'message' => 'No hay imágenes disponibles para hoy ni para fechas futuras.'
            ];
        }

        // Enviar la respuesta en formato JSON
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($response));
    }

    public function get_taller()
    {
        // Obtener la fecha actual
        $current_date = date('Y-m-d');

        // Inicializar variable para la respuesta
        $response = [];

        // Primero buscar sesiones con fechas mayores o iguales a la fecha actual
        $this->db->select('*');
        $this->db->from('sesiones');
        $this->db->where('fecha >=', $current_date); // Solo fechas iguales o mayores a la fecha actual
        $this->db->where('tipo', 'TALLER'); // Solo fechas mayores a la fecha actual

        $this->db->order_by('fecha', 'ASC'); // Ordenar por fecha ascendente
        $query = $this->db->get();

        // Si hay sesiones con fechas futuras o la fecha actual
        if ($query->num_rows() > 0) {
            $results = $query->result_array();

            // Verificar si la fecha actual coincide con alguna fecha de la sesión
            foreach ($results as $session) {
                if ($session['fecha'] == $current_date) {
                    // Si la fecha es igual, retornar toda la información de ese registro
                    $response = [
                        'status' => 'success',
                        'data' => $session
                    ];
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode($response));
                    return; // Termina el método después de enviar la respuesta
                }
            }

            // Si no hay coincidencia, calcular el número de días hasta la primera sesión futura
            $days_until_first_session = (strtotime($results[0]['fecha']) - strtotime($current_date)) / (60 * 60 * 24);

            // Rotar las imágenes de acuerdo a los días transcurridos
            $index = $days_until_first_session % count($results); // Módulo para rotación
            $image_to_show = $results[$index]; // Obtener la imagen correspondiente

            // Armar la respuesta
            $response = [
                'status' => 'success',
                'data' => $image_to_show
            ];
        } else {
            // Si no hay fechas futuras ni sesión para hoy, devolver un mensaje de error
            $response = [
                'status' => 'error',
                'message' => 'No hay imágenes disponibles para hoy ni para fechas futuras.'
            ];
        }

        // Enviar la respuesta en formato JSON
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($response));
    }
}


/* End of file MasterclasController.php */
/* Location: ./application/controllers/MasterclasController.php */
