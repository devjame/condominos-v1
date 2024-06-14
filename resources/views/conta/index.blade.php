<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Conta Corrente") }}
            </h2>
        </div>
    </x-slot>
        <div>
            @if (count($dividasProprietarios))
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full max-w-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-4">
                                    Proprietário
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Divida Atual
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($dividasProprietarios as $divida)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $divida['nome'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $divida['saldoAtual'] }} €
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('conta.corrente', ['id' => $divida['id'] ]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver Mais</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="max-w-sm flex item-center justify-center">
                    <div class="space-y-4 text-center">
                        <h2 class="font-medium text-lg text-gray-800 mb-4">Sem dividas para mostrar!</h2>
                        <p class="text-base text-gray-600 mb-4">Para mostras as dividas, tens de adicionar orçamentos e proprietários.</p>
                    </div>
                </div>
            @endif
        </div>
</x-app-layout>
