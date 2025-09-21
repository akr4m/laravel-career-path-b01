<div class="text-center gap-4">
    <h1 class="text-gray-700 text-xl font-semibold">
        {{ $count }}
    </h1>
    <div class="flex gap-4 items-center justify-center">
        <button wire:click="decrement" type="button">-</button>
        <button wire:click="increment" type="button">+</button>
    </div>
</div>
