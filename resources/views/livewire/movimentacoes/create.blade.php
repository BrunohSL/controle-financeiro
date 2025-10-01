<div x-show="openNovaMovimentacao" class="fixed inset-0 flex items-center justify-center bg-black/60 z-50">
    <div class="bg-white dark:bg-neutral-800 p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Nova Conta Bancária</h2>
        <form wire:submit.prevent="save" class="space-y-4">
        </form>
    </div>
</div>
