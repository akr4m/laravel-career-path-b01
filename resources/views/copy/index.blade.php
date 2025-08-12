<x-app-layout>
    <div class="mx-auto max-w-4xl p-6">
        <div class="mb-4 flex items-center justify-between">
            <h1 class="text-2xl font-semibold">বইয়ের তালিকা</h1>
            <a href="{{ route('books.create') }}" class="rounded bg-indigo-600 px-3 py-2 text-white hover:bg-indigo-700">নতুন বই</a>
        </div>

        @if($books->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="border px-3 py-2 text-left">শিরোনাম</th>
                        <th class="border px-3 py-2 text-left">লেখক</th>
                        <th class="border px-3 py-2 text-left">একশন</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="border px-3 py-2">{{ $book->title }}</td>
                        <td class="border px-3 py-2">{{ $book->author }}</td>
                        <td class="border px-3 py-2">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('books.show', $book->id) }}" class="text-indigo-600 hover:underline">বিস্তারিত</a>
                                <a href="{{ route('books.edit', $book->id) }}" class="text-indigo-600 hover:underline">সম্পাদনা</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('মুছে ফেলতে চান?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">মুছে ফেলুন</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-gray-600">কোনো বই পাওয়া যায়নি।</p>
        @endif
    </div>
</x-app-layout>
