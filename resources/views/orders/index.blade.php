@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">{{ __('View Orders') }}</h1>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">User</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Total</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="px-4 py-2 border">{{ $order->id }}</td>
                <td class="px-4 py-2 border">{{ $order->user->name }}</td>
                <td class="px-4 py-2 border">{{ $order->status }}</td>
                <td class="px-4 py-2 border">{{ $order->total }}</td>
                <td class="px-4 py-2 border">
                    <a href="{{ route('orders.show', $order) }}" class="text-blue-500">{{ __('View') }}</a>
                    <a href="{{ route('orders.edit', $order) }}" class="text-green-500 ml-2">{{ __('Edit') }}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
