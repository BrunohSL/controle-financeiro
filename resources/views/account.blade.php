<x-layouts.app :title="__('Contas bancárias')">
    <div x-data="{ open: false }" class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1 class="text-3xl font-bold mb-4">Contas bancárias</h1>
        <div>
            <flux:button variant="danger" @click="open = true">
                <x-icon name="plus" class="me-2" />
                Nova conta
            </flux:button>
        </div>

        <!-- Modal -->
        <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black/60 z-50">
            <div class="bg-white dark:bg-neutral-800 p-6 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-xl font-bold mb-4">Nova Conta Bancária</h2>
                {{-- <form method="POST" action="{{ route('account.store') }}"> --}}
                <form method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block mb-1 font-medium">Nome da Conta</label>
                        <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="account_number" class="block mb-1 font-medium">Número da Conta</label>
                        <input type="text" name="account_number" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="branch_number" class="block mb-1 font-medium">Número da Agência</label>
                        <input type="text" name="branch_number" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="bank" class="block mb-1 font-medium">Banco</label>
                        <select name="bank" class="w-full border rounded px-3 py-2" required>
                            <option class="dark:bg-neutral-800" value="">Selecione o banco</option>
                            <option class="dark:bg-neutral-800" value="001">Banco do Brasil</option>
                            <option class="dark:bg-neutral-800" value="237">Bradesco</option>
                            <option class="dark:bg-neutral-800" value="104">Caixa Econômica Federal</option>
                            <option class="dark:bg-neutral-800" value="341">Itaú</option>
                            <option class="dark:bg-neutral-800" value="033">Santander</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="balance" class="block mb-1 font-medium">Saldo Inicial</label>
                        <input
                            type="number"
                            name="balance"
                            class="appearance-none
                                [&::-webkit-outer-spin-button]:appearance-none
                                [&::-webkit-inner-spin-button]:appearance-none
                                w-full
                                border
                                rounded
                                px-3
                                py-2"
                            required
                        >
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="open = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:account-table />
        </div>
    </div>
</x-layouts.app>
