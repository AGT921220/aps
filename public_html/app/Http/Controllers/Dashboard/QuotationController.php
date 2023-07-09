<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Erp\Client\Application\Search\ClientSearcher;
use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class QuotationController extends Controller
{
    private $clientSearcher;
    public function __construct(ClientSearcher $clientSearcher)
    {
        $this->clientSearcher = $clientSearcher;
    }
    public function index()
    {
        return 'COTIZACIONES';
    }
    public function show(int $quotationId)
    {
        return "Cotización con id $quotationId creada";
    }
    public function create()
    {
        $quotation = new Quotation();
        $clients = $this->clientSearcher->_invoke()->toArray();
        return view('dashboard.content.quotation.create', compact('clients'));
    }
    public function store(Request $request)
    {
        $quotationId = $this->createQuotation($request->input('client_id'));
        $quotationDetailsToInsert = $this->getQuotationDetailsToInsert(
                json_decode($request->input('quotation_details')),
                $quotationId
            );

        QuotationDetail::insert($quotationDetailsToInsert);

        return redirect("/quotations/$quotationId")->with('success', 'Cotización creada.');
    }
    private function getQuotationDetailsToInsert(array $quotationDetails, int $quotationId): array
    {
        $toInsert = [];
        $now = Carbon::now()->toDateString();
        foreach ($quotationDetails as $detail) {
            $toInsert[] = [
                'quotation_id' => $quotationId, 'code' => $detail->clave, 'quantity' => $detail->quantity,
                'product_id' => 
                // $detail->product ?? null
                null
                ,
                 'description' => $detail->description, 'unit_price' => $detail->unit_price,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        return $toInsert;
    }
    private function createQuotation(int $clientId): int
    {
        $quotation = new Quotation();
        $quotation->status = 'created';
        $quotation->user_id = auth()->user()->id;
        $quotation->client_id = $clientId;
        $quotation->save();
        return $quotation->id;
    }
}
