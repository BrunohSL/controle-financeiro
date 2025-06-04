<x-layouts.app :title="__('Contas bancárias')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1 class="text-3xl font-bold mb-4">Contas bancárias</h1>
        <div>
            <flux:button variant="danger">
                {{-- <a href="{{ route('account.create') }}" class="flex items-center gap-2 rtl:gap-2"> --}}
                    <x-icon name="plus" class="me-2" />
                    Nova conta
                {{-- </a> --}}
            </flux:button>
        <div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:account-table />
        </div>
    </div>
</x-layouts.app>
