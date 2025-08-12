<x-app-layout>
    <div class="mx-auto max-w-2xl p-6">
        <h1 class="mb-6 text-2xl font-semibold">বইয়ের বিস্তারিত</h1>
        <div class="space-y-2">
            <p><span class="font-medium">শিরোনাম:</span> {{ $book->title }}</p>
            <p><span class="font-medium">লেখক:</span> {{ $book->author }}</p>
        </div>
        <div class="mt-6 flex items-center gap-3">
            <a href="{{ route('books.index') }}" class="text-indigo-600 hover:underline">তালিকায় ফিরে যান</a>
            <a href="{{ route('books.edit', $book->id) }}" class="text-indigo-600 hover:underline">সম্পাদনা করুন</a>
        </div>
    </div>
</x-app-layout>
