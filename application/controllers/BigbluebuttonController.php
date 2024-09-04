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
        header('Access-Control-Allow-Origin: *'); // Permite todas las orígenes
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Métodos permitidos
        header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Headers permitidos

        parent::__construct();
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

        // Verificar si la sala ya está en ejecución
        if ($this->is_meeting_running($session)) {
            // Unirse a la sala si ya está en ejecución
            $meet = $this->docente_unirse($session, $codigo_moderador, $docente);
            echo json_encode(array('status' => "Ok", "url" => $meet));
            return;
        }

        // Intentar crear la sala si no está en ejecución
        $checksum = sha1("createallowStartStopRecording=true&attendeePW=" . $codigo_alumno . "&autoStartRecording=false&meetingID=" . $session . "&moderatorPW=" . $codigo_moderador . "&name=" . urlencode($titulo) . "&record=true&welcome=%3Cbr%3EBienvenido+a+%3Cb%3E%25%25CONFNAME%25%25%3C%2Fb%3E%21" . $this->secret);
        $base_url = $this->url . "create?allowStartStopRecording=true&attendeePW=" . $codigo_alumno . "&autoStartRecording=false&meetingID=" . $session . "&moderatorPW=" . $codigo_moderador . "&name=" . urlencode($titulo) . "&record=true&welcome=%3Cbr%3EBienvenido+a+%3Cb%3E%25%25CONFNAME%25%25%3C%2Fb%3E%21&checksum=" . $checksum;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $base_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'cURL Error: ' . curl_error($ch);
        } else {
            $xml = simplexml_load_string($response);

            if ($xml->returncode == 'SUCCESS') {
                // Sala creada exitosamente, unirse a la sala
                $meet = $this->docente_unirse($session, $codigo_moderador, $docente);
                echo json_encode(array('status' => "Ok", "url" => $meet));
            } elseif ($xml->messageKey == 'idNotUnique') {
                // La sala ya existe, simplemente unirse
                $meet = $this->docente_unirse($session, $codigo_moderador, $docente);
                echo json_encode(array('status' => "Ok", "url" => $meet));
            } else {
                // Error al crear la sala
                echo "Error al crear la sala: " . $xml->message;
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

        // Verificar si la sala está en ejecución
        if ($this->is_meeting_running($meetId)) {
            // Generar la URL para unirse a la sala si ya está en ejecución
            $checksum = sha1("joinfullName=" . urlencode($alumno) . "&meetingID=$meetId&password=$passwordUsuario&redirect=true" . "hRCmE3KIewblr8SULmO4sBYB5nrMrhZqMygfwaVNeA");
            $base_url = $this->url . "join?fullName=" . urlencode($alumno) . "&meetingID=$meetId&password=$passwordUsuario&redirect=true&checksum=" . $checksum;

            // // Guardar el nombre del alumno en la base de datos
            // $this->load->model('AlumnoModel');
            // $data = array(
            //     'nombre' => $alumno,
            //     'session_id' => $meetId,
            //     'fecha_unido' => date('Y-m-d H:i:s')
            // );
            // $this->AlumnoModel->guardarAlumno($data);

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


    public function Optener_grabaciones()
    {
        $apiUrl = "https://test-install.blindsidenetworks.com/bigbluebutton/api/getRecordings";
        $meetingID = "100";
        $recordID = "5824d396489474e2ce674c6c29374164827542ab-1724883468105";
        $secret = "8cd8ef52e8e101574e400365b55e11a6";

        $query = "meetingID=" . $meetingID . "&recordID=" . $recordID;
        $checksum = sha1("getRecordings" . $query . $secret);

        $url = $apiUrl . "?" . $query . "&checksum=" . $checksum;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error de cURL: ' . curl_error($ch);
        } else {
            $xml = simplexml_load_string($response);
            if ($xml !== false) {
                $responseArray = json_decode(json_encode($xml), true);

                var_dump($responseArray);
            } else {
                echo 'Error al analizar el XML.';
            }
        }

        curl_close($ch);
    }
}


/* End of file Bigbluebutton.php */
/* Location: ./application/controllers/Bigbluebutton.php */