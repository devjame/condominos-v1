<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Orçamentos') }}
            </h2>
            <x-primary-button 
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'create-orcamento')"
                class="ms-3">
                {{ __('Adicionar') }}
            </x-primary-button>
        </div>
    </x-slot>
        <div>
            @if (count($orcamentos))
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full max-w-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-4">
                                    Rúbrica
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Valor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orcamentos as $orcamento)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $orcamento['rubrica'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $orcamento['valor'] }} €
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('orcamento.edit', ['id' => $orcamento['id'] ]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                                <th scope="row" class="px-6 py-4 font-medium text-lg text-gray-900 whitespace-nowrap dark:text-white">
                                    Total:
                                </th>
                                <td class="px-6 py-4">
                                    {{ $orcamentoTotal }} €
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                 <div class="max-w-sm flex item-center justify-center">
                    <div class="space-y-4 text-center">
                        <h2 class="font-medium text-lg text-gray-800 mb-4">Não tens nenhum orçamento!</h2>
                        <p class="text-base text-gray-600 mb-4">Adicione um novo orçamento.</p>
                        <x-primary-button 
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'create-orcamento')"
                        class="ms-3">
                        {{ __('Adicionar') }}
                        </x-primary-button>
                    </div>
                </div>
            @endif
    </div>
    @include('orcamento.create-orcamento-form')
</x-app-layout>
