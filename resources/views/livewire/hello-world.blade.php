<div>
    <input type="text" wire:model.blur="name" placeholder="আপনার নাম লিখুন..." />

    <p>
        Hello {{ $name }}!
    </p>
</div>
