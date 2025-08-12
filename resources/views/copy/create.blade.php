<x-app-layout>
    <div class="mx-auto max-w-2xl p-6">
        <h1 class="mb-6 text-2xl font-semibold">নতুন বই যোগ করুন</h1>
        <form action="{{ route('books.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="mb-1 block">শিরোনাম</label>
                <input type="text" name="title" required class="w-full rounded border px-3 py-2">
            </div>
            <div>
                <label class="mb-1 block">লেখক</label>
                <input type="text" name="author" required class="w-full rounded border px-3 py-2">
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">সংরক্ষণ করুন</button>
                <a href="{{ route('books.index') }}" class="text-indigo-600 hover:underline">তালিকায় ফিরে যান</a>
            </div>
        </form>
    </div>
</x-app-layout>
