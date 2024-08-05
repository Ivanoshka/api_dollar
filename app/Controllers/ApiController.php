<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Client;

class ApiController extends BaseController
{
    public function getDollarValue()
    {
        // Crear una instancia del cliente HTTP
        $client = service('curlrequest');

        // Realizar la solicitud GET a la API
        $response = $client->request('GET', 'https://api.exchangerate-api.com/v4/latest/USD');

        // Obtener el cuerpo de la respuesta
        $data = $response->getBody();

        // Decodificar el JSON a un array asociativo
        $dataArray = json_decode($data, true);

        // Mostrar los datos
        return view('dollar_value', ['rates' => $dataArray['rates']]);
    }

    
}
