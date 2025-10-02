
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add :name', ['name' => __('Order')]) }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('orders.store') }}" method="POST" class="space-y-4 bg-gray-500 p-6 rounded shadow">
                @csrf
                <div>
                    <label>{{ __('User') }}</label>
                    <select name="user_id" class="border rounded w-full p-2">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>{{ __('Status') }}</label>
                    <input type="text" name="status" value="pending" class="border rounded w-full p-2">
                </div>

                <div>
                    <label>{{ __('Total') }}</label>
                    <input type="number" step="0.01" name="total" class="border rounded w-full p-2">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ __('Save') }}</button>
            </form>
        </div>
    </div>


</x-app-layout>
