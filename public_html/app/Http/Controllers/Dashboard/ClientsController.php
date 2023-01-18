<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Erp\Client\Application\Create\ClientCreator;
use App\Bussines\Erp\Client\Application\Find\ClientFinder;
use App\Bussines\Erp\Client\Application\Find\ClientFinderByName;
use App\Bussines\Erp\Client\Application\Search\ClientSearcher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    private $searcher;
    private $creator;
    private $finder;
    private $finderByName;
    public function __construct(
        ClientSearcher $clientSearcher,
        ClientCreator $clientCreator,
        ClientFinder $clientFinder,
        ClientFinderByName $clientFinderByName
    ) {
        $this->searcher = $clientSearcher;
        $this->creator = $clientCreator;
        $this->finder = $clientFinder;
        $this->finderByName = $clientFinderByName;
    }
    public function index()
    {
        $items = $this->searcher->_invoke()->toArray();

        return view('dashboard.contenido.clientes.index', compact('items'));
    }
    public function show(int $clientId)
    {
        $item = $this->finder->__invoke($clientId)->toArray();
        if (!$item) {
            return back()->with('mensaje', 'No existe el cliente.');
        }
        return view('dashboard.contenido.clientes.show', compact('item'));
    }
    public function create()
    {
        return view('dashboard.contenido.clientes.create');
    }

    public function store(Request $request)
    {
        if ($this->finderByName->__invoke($request->input('name'))) {
            return back()->with('mensaje', 'Ya existe un cliente con ese nombre.');
        }

        $this->creator->__invoke(
            $request->input('name'),
            $request->input('email'),
            $request->input('phone'),
            $request->input('street'),
            $request->input('colony'),
            $request->input('no_int'),
            $request->input('no_ext'),
            $request->input('cp'),
            $request->input('observations')
        );
        return back()->with('success', 'Cliente Agregado.');
    }
}
