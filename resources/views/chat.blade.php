<x-app-layout>
    <div class="mx-auto max-w-2xl p-6">
        <div>
            List of chats
        </div>
       <form method="POST" action="{{ route('chat.send') }}">
        @csrf
        <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
            <textarea name="message" id="message" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
        </div>
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Send Message</button>
        </div>

       </form>
    </div>
</x-app-layout>
