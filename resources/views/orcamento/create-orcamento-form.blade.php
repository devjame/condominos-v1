<x-modal name="create-orcamento" :show="$errors->userDeletion->isNotEmpty()" focusable>
<section class="space-y-6">
    <header class="px-6 pt-6">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Adicionar Novo Orçamento') }}
        </h2>
    </header>
        <form method="post" action="{{ route('orcamento.store') }}" class="p-6">
            @csrf
            <div class="mt-6">
                <x-input-label for="rubrica" value="{{ __('Rúbrica') }}" class="sr-only" />

                <x-text-input
                    id="rubrica"
                    name="rubrica"
                    value="{{ old('rubrica') }}"
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
                    value="{{ old('valor') }}"
                    type="number"
                    step="0.01"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Valor') }}"
                />

                <x-input-error :messages="$errors->get('valor')" class="mt-2" />
            </div>

            <div class="mt-6 flex">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Adicionar') }}
                </x-primary-button>
            </div>
        </form>
</section>
</x-modal>