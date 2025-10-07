<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-gray-200 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="min-w-full border border-gray-300 text-sm">
                    <thead class="">
                        <tr>
                            <th class="border px-3 py-2 text-left">User</th>
                            @foreach ($statuses as $status)
                                <th class="border px-3 py-2 text-center">{{ $status->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-3 py-2">{{ $user->name }}</td>
                                @foreach ($statuses as $status)
                                    
                                    <td class="border px-3 py-2 text-center">
                                        {{ $user->orders->where('status_id', $status->id)->count() }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
