<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::get();
        return view('dashboard.content.supplier.index', compact('suppliers'));
    }
    public function create()
    {
        return view('dashboard.content.supplier.create');
    }
    public function store(Request $request)
    {
        $supplier = new Supplier();
        $supplier->company_name = $request->input('company_name');
        $supplier->person_name = $request->input('person_name');
        $supplier->phone = $request->input('phone');
        $supplier->second_phone = $request->input('second_phone');
        $supplier->email = $request->input('email');
        $supplier->second_email = $request->input('second_email');
        $supplier->save();

        return back()->with('success', 'Proveedor Agregado');
    }
}
