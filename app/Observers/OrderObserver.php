<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class OrderObserver
{
    /**
     * Cuando se crea una orden
     */
    public function created(Order $order): void
    {
        $this->regenerateJson();
    }

    /**
     * Cuando se actualiza una orden
     */
    public function updated(Order $order): void
    {
        $this->regenerateJson();
    }

    /**
     * Cuando se elimina una orden
     */
    public function deleted(Order $order): void
    {
        $this->regenerateJson();
    }

    /**
     * Método privado para regenerar el archivo JSON
     */
    private function regenerateJson()
    {
        // Trae todas las órdenes con usuario
        $orders = Order::with('user')->get();

        // Convierte a JSON bonito
        $jsonData = $orders->toJson(JSON_PRETTY_PRINT);

        // Guarda en storage/app/public/view_database.json
        Storage::disk('public')->put('view_database.json', $jsonData);
    }
}
