<x-layouts.app :title="__('Contas bancárias')">
    <div
        x-data="{
            open: false,
            showToast: false,
            message: ''
        }"
        x-on:account-created.window="
            open = false,
            showToast = true,
            message = 'Conta bancária criada com sucesso!',
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
            <flux:button variant="primary" @click="open = true">
                <x-icon name="plus" class="me-2" />
                Nova conta
            </flux:button>
        </div>

        {{-- Create Account Modal --}}
        <livewire:accounts.create />

        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:account-table />
        </div>
    </div>
</x-layouts.app>
