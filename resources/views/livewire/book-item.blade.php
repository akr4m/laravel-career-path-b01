<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-800 space-y-4">
        @if($editing)
        <livewire:update-book :book="$book" :key="$book->id" />
        @else
        <div>
            <h2 class="text-lg font-medium">{{ $book->id }}. {{ $book->title }}</h2>
            <div>by {{ $book->author }}</div>
        </div>
        @endif
        <ul class="flex items-center space-x-2">
            <li>
                <button wire:click="$toggle('editing')" type="button" class="bg-blue-500 text-white px-2 py-1">@if(!$editing) Edit @else Cancel @endif</button>
            </li>
            <li>
                <button wire:click="$parent.deleteBook({{ $book->id }})" wire:confirm="Are you sure you want to delete this book?" type="button" class="bg-red-500 text-white px-2 py-1">Delete</button>
            </li>
        </ul>
    </div>
</div>
