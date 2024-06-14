<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Orçamento') }}
            </h2>
        </div>
    </x-slot>
    <section class="space-y-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <header class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Editar Orçamento') }}
            </h2>
        </header>
            <form method="post" action="{{ route('orcamento.update', ['id' => $orcamento['id']] ) }}" class="max-w-lg">
                @csrf
                @method('patch')
                <div class="mt-6">
                    <x-input-label for="rubrica" value="{{ __('Rúbrica') }}" class="sr-only" />

                    <x-text-input
                        id="rubrica"
                        name="rubrica"
                        value="{{ $orcamento['rubrica'] }}"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Rúbrica') }}"
                    />

                    <x-input-error :messages="$errors->get('rubrica')" class="mt-2" />
                </div>
                <div class="mt-6">
                    <x-input-label for="valor" value="{{ __('Valor') }}" class="sr-only" />

                    <x-text-input
                        id="valor"
                        name="valor"
                        value="{{ $orcamento['valor'] }}"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Valor') }}"
                    />

                    <x-input-error :messages="$errors->get('valor')" class="mt-2" />
                </div>

                <div class="mt-6 flex ">
                    <x-secondary-link :href="route('orcamento.index')">
                        {{ __('Cancel') }}
                    </x-secondary-link>

                    <x-primary-button class="ms-3">
                        {{ __('Guardar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>