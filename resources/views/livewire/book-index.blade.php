<div class="space-y-4">
    <!-- Search query -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-800">
            <label for="query">Search</label>
            <input type="text" id="query" class="w-full border border-gray-300 rounded-lg" />
        </div>
    </div>

    <!-- List of books -->
    <div class="space-y-4">
        @foreach ($books as $book)
        <livewire:book-item :book="$book" wire:key="{{ $book->id }}" />
        @endforeach
    </div>
</div>
