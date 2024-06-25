<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Conta Corrente - {{ $proprietario['nome'] }}
            </h2>
            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-pagamento')" class="ms-3">
                {{ __('Adicionar Pagamento') }}
            </x-primary-button>
        </div>
    </x-slot>
    <div>
        <div>
            @if(session('status')) <x-alert type="info" :message="session('status')"></x-alert>
            @endif
        </div>
        <div class="flex gap-4 px-6 py-4 bg-gray-50 dark:bg-gray-700 items-center justify-between font-semibold text-lg mb-4">
            <p class="px-6 py-4">
                Divida: {{ $proprietario['divida'] }} €
            </p>
            <p class="px-6 py-4">
                Por Liquidar: {{ $proprietario['divida_atual'] }} €
            </p>
        </div>
        @if(count($proprietario['pagamentos']))
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full max-w-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            Montante
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Data do pagamento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Metodo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Criado em
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proprietario['pagamentos'] as $pagamento)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                        <td class="px-6 py-4">
                            {{ $pagamento['valor'] }} €
                            </th>
                        <td class="px-6 py-4">
                            {{ date('d/m/Y', strtotime($pagamento['data'])) }}
                            </th>
                        <td class="px-6 py-4 uppercase">
                            {{ $pagamento['metodo'] }}
                        </td>
                        <td class="px-6 py-4 uppercase">
                            {{ date('d/m/Y', strtotime($pagamento['created_at'])) }}
                        </td>
                        <td class="px-6 py-4">
                            <form method="post" action="{{ route('conta.delete', 
                                    [
                                        'proprietario' => $proprietario['id'],
                                        'id' => $pagamento['id'] 
                                    ]) 
                                    }}" class="p-6">
                                @csrf
                                @method('delete')

                                <x-danger-button class="ms-3">
                                    {{ __('Apagar') }}
                                </x-danger-button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="max-w-sm flex item-center justify-center">
            <div class="space-y-4 text-center">
                <h2 class="font-medium text-lg text-gray-800 mb-4">Sem Pagamentos para mostrar!</h2>

            </div>
        </div>
        @endif
    </div>
    @include('conta.create-pagamento-form')
</x-app-layout>