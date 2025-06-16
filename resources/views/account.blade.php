<x-layouts.app :title="__('Contas bancárias')">
    <div
        x-data="{
            openCreate: false,
            openEdit: false,
            accountId: null,
            {{-- name: '',
            bank_id: null,
            number: '',
            branch: '',
            opening_balance: 0, --}}
            showToast: false,
            message: ''
        }"
        x-on:edit-account.window="
            openEdit = true,
            accountId = $event.detail.accountId
            {{-- name = $event.detail.name,
            bank_id = $event.detail.bank_id,
            number = $event.detail.number,
            branch = $event.detail.branch,
            opening_balance = $event.detail.opening_balance --}}
        "
        x-on:account-created.window="
            openCreate = false,
            showToast = true,
            message = 'Conta bancária criada com sucesso!',
            setTimeout(() => showToast = false, 3000)
        "
        x-on:account-edited.window="
            openEdit = false
            showToast = true,
            message = 'Conta bancária editada com sucesso!',
            setTimeout(() => showToast = false, 3000)
        "
        class="
            flex
            h-full
            w-full
            flex-1
            flex-col
            gap-4
            rounded-xl
        "
    >
        {{-- Account created message --}}
        <div
            x-show="showToast"
            x-transition
            x-cloak
            class="fixed bottom-6 right-6 bg-green-600 text-white px-4 py-2 rounded shadow-lg z-50"
        >
            <span x-text="message"></span>
        </div>

        <h1 class="text-3xl font-bold mb-4">Contas bancárias</h1>
        <div>
            <flux:button variant="primary" @click="openCreate = true">
                <x-icon name="plus" class="me-2" />
                Nova conta
            </flux:button>
        </div>

        {{-- Create Account Modal --}}
        <livewire:accounts.create />

        {{-- Edit Account Modal --}}
        <livewire:accounts.edit
            {{-- :accountId="accountId"
            :name="name"
            :bankId="bank_id"
            :number="number"
            :branch="branch"
            :openingBalance="opening_balance" --}}
        />

        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:account-table />
        </div>
    </div>
</x-layouts.app>
