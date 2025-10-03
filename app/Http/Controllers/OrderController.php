<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Leer el archivo JSON desde storage
        $json = Storage::disk('public')->get('view_database.json');

        // 2. Convertir a arreglo de PHP
        $orders = json_decode($json, true);

        // 3. Pasar a la vista
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('orders.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // 1. Validar los datos
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'status'  => 'required|string|max:255',
        'total'   => 'required|numeric|min:0',
    ]);

    // 2. Crear la orden
    $order = Order::create($validated);

    // 3. Redirigir con mensaje de éxito
    return redirect()->route('orders.create')
                     ->with('success', __('Order created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroyViewDatabase()
    {
        // Sobrescribe con un array vacío en formato JSON
        Storage::disk('public')->put('view_database.json', json_encode([], JSON_PRETTY_PRINT));

        return view('orders.destroyViewDatabase');
    }

    public function regenerate()
    {
        // 1. Obtener todas las órdenes
    $orders = Order::with('user')->get();

    // 2. Convertir a JSON con formato bonito
    $jsonData = $orders->toJson(JSON_PRETTY_PRINT);

    // 3. Guardar en storage/app/public/view_database.json
    Storage::disk('public')->put('view_database.json', $jsonData);

        return view('orders.regenerate');
    }
}
