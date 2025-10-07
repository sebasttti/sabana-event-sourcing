<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-gray-200 overflow-hidden shadow-xl sm:rounded-lg p-6">

                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="">
                            <th class="border border-gray-300 px-4 py-2">{{ __('User')}}</th>
                            @foreach ($statuses as $s)
                                <th class="border border-gray-300 px-4 py-2 text-center">{{ $s->name }}</th>
                            @endforeach
                            <th class="border border-gray-300 px-4 py-2 text-center">{{__('Total')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users_with_orders as $user)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $user['user_name'] }}</td>
                                @foreach ($statuses as $s)
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        {{ $user['orders_by_status'][$s->id] ?? 0 }}
                                    </td>
                                @endforeach
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $user['total_orders'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
