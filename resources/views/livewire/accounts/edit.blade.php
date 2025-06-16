<div x-show="openEdit" class="fixed inset-0 flex items-center justify-center bg-black/60 z-50">
    <div class="bg-white dark:bg-neutral-800 p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Editar Conta Bancária <span x-text="accountId"></span></h2>
        <form wire:submit.prevent="save" class="space-y-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">Nome da Conta</label>
                <input type="text" id="name" wire:model="name" maxlength="50" class="w-full border rounded px-3 py-2" required>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="bank" class="block">Banco:</label>
                <select id="bank" wire:model="selectedBank" class="w-full border rounded p-2">
                    <option class="dark:bg-neutral-800" value="">Selecione um banco</option>
                    @foreach($banks as $bank)
                        <option class="dark:bg-neutral-800" value="{{ $bank->id }}">{{ $bank->name }}</option>
                    @endforeach
                </select>
                @error('selectedBank') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="accountNumber" class="block mb-1 font-medium">Número da Conta</label>
                <input type="text" id="accountNumber" wire:model="accountNumber" maxlength="20" class="w-full border rounded px-3 py-2" required>
                @error('accountNumber') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="branchNumber" class="block mb-1 font-medium">Número da Agência</label>
                <input type="text" id="branchNumber" wire:model="branchNumber" maxlength="10" class="w-full border rounded px-3 py-2" required>
                @error('branchNumber') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="balance" class="block mb-1 font-medium">Saldo Inicial</label>
                <input
                    type="number"
                    wire:model="balance"
                    id="balance"
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
                @error('balance') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" @click="openEdit = false" class="px-4 py-2 text-black bg-gray-300 rounded">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Salvar</button>
            </div>
        </form>
    </div>
</div>
