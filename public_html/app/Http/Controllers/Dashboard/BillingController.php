<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;

class BillingController extends Controller
{
    public function index()
    {
        return view('dashboard.content.billing.index');
        return 'FACTURACION';
    }
    public function store(Request $request)
    {
        $xmlFiles = $request->file('xmlFiles');

        foreach ($xmlFiles as $xmlFile) {
            // Guardar el archivo en una ruta específica (por ejemplo, 'public/xml')
            $path = $xmlFile->store('xml', 'public');

            // Extraer datos importantes del archivo XML
            $data = $this->extractDataFromXML($path);

            dump($data);
            // Hacer algo con los datos extraídos, por ejemplo, almacenarlos en la base de datos
            // Ejemplo: Model::create($data);

            // Opcionalmente, eliminar el archivo XML después de extraer los datos
            // Storage::disk('public')->delete($path);
        }

        dd(4);
    }

    // private function extractDataFromXML($path)
    // {
    //     $xmlString = Storage::disk('public')->get($path);
    //     $xml = new SimpleXMLElement($xmlString);

    //     // Extraer los datos importantes del archivo XML y devolverlos como un arreglo
    //     $data = [
    //         'nombre' => (string)$xml->nombre,
    //         'edad' => (int)$xml->edad,
    //         // Agregar más campos según la estructura de tu archivo XML
    //     ];

    //     return $data;
    // }



    private function extractDataFromXML($path)
    {
        $xmlString = Storage::disk('public')->get($path);
        $xml = new SimpleXMLElement($xmlString);
        $xml = new SimpleXMLElement($xmlString);

        $date =date('Y-m-d H:i:s', strtotime((string) $xml['Fecha']));
        $data = [
            'transmitter_rfc' => (string) $xml->xpath('//cfdi:Comprobante/cfdi:Emisor')[0]['Rfc'],
            'receiver_rfc' => (string) $xml->xpath('//cfdi:Comprobante/cfdi:Receptor')[0]['Rfc'],
            'folio' => (string)$xml['Folio'],
            'total' => (float)$xml['Total'],
            'date'=>$date,
        ];

        return $data;
    }
}
