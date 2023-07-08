<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Erp\Client\Application\Search\ClientSearcher;
use App\Http\Controllers\Controller;

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
    public function create()
    {
        $clients = $this->clientSearcher->_invoke()->toArray();
        return view('dashboard.content.quotation.create', compact('clients'));
    }
}
