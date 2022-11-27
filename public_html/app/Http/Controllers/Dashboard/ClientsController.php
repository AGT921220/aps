<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Erp\Client\Application\Search\ClientSearcher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    private $searcher;
    public function __construct(ClientSearcher $clientSearcher)
    {
        $this->searcher = $clientSearcher;
    }
    public function index()
    {
        $items = $this->searcher->_invoke()->toArray();

        return view('dashboard.contenido.clientes.index',compact('items'));
    }
    public function create()
    {

        return view('dashboard.contenido.clientes.create');
    }
}
