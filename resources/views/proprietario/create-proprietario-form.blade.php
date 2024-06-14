<x-modal name="create-proprietario" :show="$errors->userDeletion->isNotEmpty()" focusable>
<section class="space-y-6">
    <header class="px-6 pt-6">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Adicionar Proprietário') }}
        </h2>
    </header>
        <form method="post" action="{{ route('proprietario.store') }}" class="p-6">
            @csrf
            <div class="mt-6">
                    <x-input-label for="nome" value="{{ __('Nome') }}" class="sr-only" />

                    <x-text-input
                        id="nome"
                        name="nome"
                        value="{{ old('nome') }}"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Nome') }}"
                    />

                    <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                </div>
                <div class="mt-6">
                    <x-input-label for="email" value="{{ __('Email') }}" class="sr-only" />

                    <x-text-input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Email') }}"
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-6">
                    <x-input-label for="phone" value="{{ __('Telémovel') }}" class="sr-only" />

                    <x-text-input
                        id="phone"
                        name="phone"
                        type="tel"
                        value="{{ old('phone') }}"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Telémovel') }}"
                    />

                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <div class="mt-6">
                    <x-input-label for="fracao" value="{{ __('Fração') }}" class="sr-only" />

                    <x-text-input
                        id="fracao"
                        name="fracao"
                        value="{{ old('fracao') }}"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Fração') }}"
                    />

                    <x-input-error :messages="$errors->get('fracao')" class="mt-2" />
                </div>
                <div class="mt-6">
                    <x-input-label for="permilagem" value="{{ __('Permilagem') }}" class="sr-only" />

                    <x-text-input
                        id="permilagem"
                        name="permilagem"
                        type="number"
                        value="{{ old('permilagem') }}"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Permilagem') }}"
                    />

                    <x-input-error :messages="$errors->get('permilagem')" class="mt-2" />
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