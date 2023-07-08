<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Erp\Client\Application\Create\ClientCreator;
use App\Bussines\Erp\Client\Application\Search\ClientSearcher;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $searcher;
    private $creator;
    public function __construct(ClientSearcher $searcher, ClientCreator $creator)
    {
        $this->searcher = $searcher;
        $this->creator = $creator;
    }
    public function index()
    {
        $clients = $this->searcher->_invoke()->toArray();
        return view('dashboard.content.client.index', compact('clients'));
    }
    public function create()
    {
        return view('dashboard.content.client.create');
    }
    public function store(Request $request)
    {

        $this->creator->__invoke(
            $request->input('company_name'),
            $request->input('person_name'),
            $request->input('phone'),
            $request->input('email'),
            $request->input('second_phone'),
            $request->input('second_email')
        );

        return back()->with('success', 'Cliente Agregado');
    }
}
