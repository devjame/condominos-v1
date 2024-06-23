<x-modal name="confirm-payment-deletion" focusable>
        <form method="post" action="{{ route('conta.delete', 
            [
                'proprietario' => $proprietario['id'],
                'id' => $proprietario['pagamentos']['pagamentos.id'] 
            ]) 
            }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Tens a certeza que queres apagar essa pagamento?') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Apagar Pagamento') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>