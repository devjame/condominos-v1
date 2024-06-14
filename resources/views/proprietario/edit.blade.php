<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Proprietários') }}
            </h2>
        </div>
    </x-slot>
    <section class="space-y-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <header class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Editar Proprietários') }}
            </h2>
        </header>
            <form method="post" action="{{ route('proprietario.update', ['id' => $proprietario['id'] ]) }}" class="max-w-lg">
                @csrf
                @method('patch')
                <div class="mt-6">
                    <x-input-label for="nome" value="{{ __('Nome') }}" class="sr-only" />

                    <x-text-input
                        id="nome"
                        name="nome"
                        value="{{ $proprietario['nome'] }}"
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
                        value="{{ $proprietario['email'] }}"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Email') }}"
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-6">
                    <x-input-label for="fracao" value="{{ __('Fração') }}" class="sr-only" />

                    <x-text-input
                        id="fracao"
                        name="fracao"
                        value="{{ $proprietario['fracao'] }}"
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
                        value="{{ $proprietario['permilagem'] }}"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Permilagem') }}"
                    />

                    <x-input-error :messages="$errors->get('permilagem')" class="mt-2" />
                </div>

                <div class="mt-6 flex ">
                    <x-secondary-link :href="route('proprietario.index')">
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