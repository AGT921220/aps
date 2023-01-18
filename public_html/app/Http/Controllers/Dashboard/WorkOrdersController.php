<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Erp\Client\Application\Find\ClientFinder;
use App\Bussines\Erp\Client\Application\Search\ClientSearcher;
use App\Bussines\Erp\WorkOrder\Application\Create\WorkOrderCreator;
use App\Bussines\Erp\WorkOrder\Application\Search\WorkOrderSearcher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkOrdersController extends Controller
{
    private $clientSearcher;
    private $workOrderCreator;
    private $workOrderSearcher;
    private $clientFinder;
    public function __construct(
        ClientFinder $clientFinder,
        ClientSearcher $clientSearcher,
        WorkOrderCreator $workOrderCreator,
        WorkOrderSearcher $workOrderSearcher
    ) {
        $this->clientSearcher = $clientSearcher;
        $this->workOrderCreator = $workOrderCreator;
        $this->workOrderSearcher = $workOrderSearcher;
        $this->clientFinder = $clientFinder;
    }
    public function index()
    {
        $items = $this->workOrderSearcher->_invoke()->toArray();
//        return $items;
        return view('dashboard.contenido.ordenes_trabajo.index', compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = $this->clientSearcher->_invoke()->toArray();
        if ($clients['total'] < 1) {
            return redirect('/clientes')->with('mensaje', 'Agrega primero un Cliente.');
        }

        return view('dashboard.contenido.ordenes_trabajo.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $clientId = $request->input('client_id');

        if (!$this->clientFinder->__invoke($clientId)) {
            return back()->with('error', 'El cliente no existe.');
        }
        $this->workOrderCreator->__invoke(
            $clientId,
            $request->input('quantity'),
            $request->input('material'),
            $request->input('print_colors'),
            $request->input('unit_price'),
            $request->input('observations'),
            $request->input('delivery_date')
        );
        return back()->with('success', 'Orden Agregada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
