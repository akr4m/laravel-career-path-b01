<x-app-layout>
    <div class="mx-auto max-w-2xl p-6">
        <h1 class="mb-6 text-2xl font-semibold">বই সম্পাদনা করুন</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="mb-1 block">শিরোনাম</label>
                <input type="text" name="title" value="{{ $book->title }}" required class="w-full rounded border px-3 py-2">
            </div>
            <div>
                <label class="mb-1 block">লেখক</label>
                <input type="text" name="author" value="{{ $book->author }}" required class="w-full rounded border px-3 py-2">
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">আপডেট করুন</button>
                <a href="{{ route('books.index') }}" class="text-indigo-600 hover:underline">বাতিল</a>
            </div>
        </form>
    </div>
</x-app-layout>
