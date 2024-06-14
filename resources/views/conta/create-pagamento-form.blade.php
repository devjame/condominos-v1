<x-modal name="create-pagamento" :show="$errors->pagamentoCreate->isNotEmpty()" focusable>
<section class="space-y-6 ">
    <header class="px-6 pt-6">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Adicionar Novo Pagamento') }}
        </h2>
    </header>
        <form method="post" action="{{ route('conta.pagamento', 
            [
                'id' => $proprietario['id']
            ]) }}" class="p-6">
            @csrf
            <div class="mt-6">
                <x-input-label for="valor" value="{{ __('Montante') }}"  />

                <x-text-input
                    id="valor"
                    name="valor"
                    required
                    value="{{ old('valor') }}"
                    type="number"
                    step="0.01"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Montante') }}"
                />

                <x-input-error :messages="$errors->get('valor')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="data" value="{{ __('Data do Pagamento') }}" />

                <x-text-input
                    id="data"
                    name="data"
                    type="date"
                    require
                    value="{{ old('data') }}"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Data do pagamento') }}"
                />

                <x-input-error :messages="$errors->get('data')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="metodo" value="{{ __('Metodo do Pagamento') }}" />

                <x-text-input
                    id="metodo"
                    name="metodo"
                    value="{{ old('metodo') }}"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('E.X: dinheiro, MBway, MB, etc.') }}"
                />

                <x-input-error :messages="$errors->get('metodo')" class="mt-2" />
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