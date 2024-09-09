<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Bigbluebutton
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class BigbluebuttonController extends CI_Controller
{

    private $secret = 'hRCmE3KIewblr8SULmO4sBYB5nrMrhZqMygfwaVNeA';
    private $url = 'https://meet.iexe.edu.mx/bigbluebutton/api/';

    public function __construct()
    {
        // CORS headers
        parent::__construct();

        header('Access-Control-Allow-Origin: *'); // Permite todas las orígenes
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Métodos permitidos
        header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Headers permitidos
        $this->load->helper('url');
        $this->load->model("AsistenciasModel");
        $this->load->model("SesionesModel");
    }

    // Método para verificar si una sala está en ejecución
    public function is_meeting_running($meetingID)
    {
        // Crear la cadena para la llamada a la API
        $action = "isMeetingRunning";
        $params = "meetingID=" . urlencode($meetingID);

        // Crear la cadena de consulta con el checksum
        $checksum = sha1($action . $params . $this->secret);
        $url = $this->url . $action . "?" . $params . "&checksum=" . $checksum;

        // Realizar la solicitud
        $response = file_get_contents($url);

        // Convertir la respuesta de XML a un objeto PHP
        $xml = simplexml_load_string($response);

        // Verificar si la reunión está en ejecución y devolver el resultado
        return ($xml->running == 'true');
    }


    // Método para probar si una sala específica está en ejecución
    public function check_meeting($meetingID)
    {
        $isRunning = $this->is_meeting_running($meetingID);

        if ($isRunning) {
            echo "La sala está en ejecución.";
        } else {
            echo "La sala no está en ejecución.";
        }
    }

    public function crear_sala()
    {
        $codigo_moderador = $this->input->post('codigo_moderador');
        $codigo_alumno = $this->input->post('codigo_alumno');
        $titulo = $this->input->post('titulo');
        $session = $this->input->post('session');
        $docente = $this->input->post('docente');
        $idSesion = $this->input->post('idSesion');

        // Verificar si la sala ya está en ejecución
        if ($this->is_meeting_running($session)) {
            // Unirse a la sala si ya está en ejecución
            $meet = $this->docente_unirse($session, $codigo_moderador, $docente);
            echo json_encode(['status' => "Ok", 'url' => $meet]);
            return;
        }

        // Crear la sala si no está en ejecución
        $checksum_string = "createallowStartStopRecording=true&attendeePW={$codigo_alumno}&autoStartRecording=false&meetingID={$session}&moderatorPW={$codigo_moderador}&name=" . urlencode($titulo) . "&record=true&welcome=%3Cbr%3EBienvenido+a+%3Cb%3E%25%25CONFNAME%25%25%3C%2Fb%3E%21" . $this->secret;
        $checksum = sha1($checksum_string);
        $base_url = "{$this->url}create?allowStartStopRecording=true&attendeePW={$codigo_alumno}&autoStartRecording=false&meetingID={$session}&moderatorPW={$codigo_moderador}&name=" . urlencode($titulo) . "&record=true&welcome=%3Cbr%3EBienvenido+a+%3Cb%3E%25%25CONFNAME%25%25%3C%2Fb%3E%21&checksum={$checksum}";

        // Iniciar la solicitud cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $base_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            // Manejar errores cURL
            echo json_encode(['status' => "Error", 'message' => 'cURL Error: ' . curl_error($ch)]);
        } else {
            // Procesar la respuesta XML
            $xml = simplexml_load_string($response);

            if ($xml->returncode == 'SUCCESS') {
                // Sala creada exitosamente, actualizar la sesión y unirse
                $internalMeetingID = (string) $xml->internalMeetingID;
                $this->SesionesModel->update($idSesion, ['internalMeetingID' => $internalMeetingID]);
                $meet = $this->docente_unirse($session, $codigo_moderador, $docente);
                echo json_encode(['status' => "Ok", 'url' => $meet]);
            } elseif ($xml->messageKey == 'idNotUnique') {
                // El ID de la reunión ya existe, actualizar y unirse
                $internalMeetingID = (string) $xml->internalMeetingID;
                $this->SesionesModel->update($idSesion, ['internalMeetingID' => $internalMeetingID]);
                $meet = $this->docente_unirse($session, $codigo_moderador, $docente);
                echo json_encode(['status' => "Ok", 'url' => $meet]);
            } else {
                // Otro error al crear la sala
                echo json_encode(['status' => "Error", 'message' => (string) $xml->message]);
            }
        }

        curl_close($ch);
    }




    public function docente_unirse($meetId, $passwordUsuario, $docente)
    {
        $base_url = "";
        $checksum = sha1("joinfullName=" . urlencode($docente) . "&meetingID=$meetId&password=$passwordUsuario&redirect=true" . "hRCmE3KIewblr8SULmO4sBYB5nrMrhZqMygfwaVNeA");
        $base_url = "https://meet.iexe.edu.mx/bigbluebutton/api/join?fullName=" . urlencode($docente) . "&meetingID=$meetId&password=$passwordUsuario&redirect=true&checksum=" . $checksum;
        return $base_url;
    }

    public function alumno_unirse()
    {
        $meetId = $this->input->post('session'); // El ID de la reunión
        $passwordUsuario = $this->input->post('codigo_alumno'); // Contraseña del alumno
        $alumno = $this->input->post('alumno'); // Nombre del alumno
        $matricula = $this->input->post('matricula'); // Nombre del alumno



        // Verificar si la sala está en ejecución
        if ($this->is_meeting_running($meetId)) {
            // Generar la URL para unirse a la sala si ya está en ejecución
            $checksum = sha1("joinfullName=" . urlencode($alumno) . "&meetingID=$meetId&password=$passwordUsuario&redirect=true" . "hRCmE3KIewblr8SULmO4sBYB5nrMrhZqMygfwaVNeA");
            $base_url = "https://meet.iexe.edu.mx/bigbluebutton/api/join?fullName=" . urlencode($alumno) . "&meetingID=$meetId&password=$passwordUsuario&redirect=true&checksum=" . $checksum;


            // // Guardar el nombre del alumno en la base de datos
            $data = array(
                'matricula' => $matricula,
                'nombre' => $alumno,
                'session' => $meetId,
            );
            $this->AsistenciasModel->insert($data);

            // Devolver la URL de la reunión
            $response = array('status' => "success", 'url' => $base_url);
        } else {
            // Si la sala no está en ejecución, enviar un mensaje de error
            $response = array('status' => "error", 'message' => "La sala aún no está disponible. Intente nuevamente más tarde.");
        }

        // Enviar la respuesta como JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response))
            ->_display();
        exit;
    }

    public function ver_grabacion()
    {
        $apiUrl = "https://meet.iexe.edu.mx/bigbluebutton/api/getRecordings";
        $meetingID = $this->input->post('meetingID');
        $secret = "hRCmE3KIewblr8SULmO4sBYB5nrMrhZqMygfwaVNeA"; // Cambia este valor según tu configuración

        // Construir el query para la API
        $query = "meetingID=" . $meetingID;
        $checksum = sha1("getRecordings" . $query . $secret);

        // Construir la URL completa para la API
        $url = $apiUrl . "?" . $query . "&checksum=" . $checksum;

        // Inicializar cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Ejecutar la solicitud
        $response = curl_exec($ch);

        // Manejo de errores de cURL
        if (curl_errno($ch)) {
            echo json_encode(['status' => 'error', 'message' => 'Error de cURL: ' . curl_error($ch)]);
            return;
        }

        // Cerrar la conexión de cURL
        curl_close($ch);

        // Cargar el XML de la respuesta
        $xml = simplexml_load_string($response);
        if ($xml !== false) {
            // Convertir la respuesta XML a un array
            $responseArray = json_decode(json_encode($xml), true);

            // Verificar si hay grabaciones
            if (isset($responseArray['recordings']['recording'])) {
                $grabaciones = $responseArray['recordings']['recording'];

                // Manejar el caso de una sola grabación o múltiples grabaciones
                if (isset($grabaciones['recordID'])) {
                    // Solo hay una grabación, convertirla en un array
                    $grabaciones = [$grabaciones];
                }

                // Arreglo para almacenar la información de las grabaciones
                $recordingsInfo = [];
                foreach ($grabaciones as $grabacion) {
                    $recordingsInfo[] = [
                        'meetingID' => $grabacion['meetingID'],
                        'internalMeetingID' => $grabacion['internalMeetingID'],
                        'recordID' => $grabacion['recordID'], // Aquí está el recordID
                        'name' => $grabacion['name'],
                        'startTime' => date('Y-m-d H:i:s', $grabacion['startTime'] / 1000),
                        'endTime' => date('Y-m-d H:i:s', $grabacion['endTime'] / 1000),
                        'playbackURL' => $grabacion['playback']['format']['url'] // URL para reproducir la grabación
                    ];
                }

                // Devolver las grabaciones en formato JSON
                echo json_encode(['status' => 'success', 'recordings' => $recordingsInfo]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se encontraron grabaciones.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al analizar el XML.']);
        }
    }
}


/* End of file Bigbluebutton.php */
/* Location: ./application/controllers/Bigbluebutton.php */