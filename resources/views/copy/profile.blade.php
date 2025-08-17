<x-app-layout>
    <div class="mx-auto max-w-2xl p-6 w-full">
        <div class="mx-auto max-w-xl">
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-xl font-semibold">Your profile</h1>
                    <p class="mt-1 text-sm text-gray-600">Manage your personal information</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-gray-900 px-3 py-1.5 text-sm font-medium text-white shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">
                        Log out
                    </button>
                </form>
            </div>

            @if (session('status'))
                <div class="mt-4 rounded-lg border border-green-200 bg-green-50 p-3 text-sm text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-700">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') ?? '#' }}" class="mt-6 space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name ?? '') }}" required
                           class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500" />
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email ?? '') }}" required
                           class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500" />
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit"
                            class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save changes
                    </button>
                    <a href="{{ url()->previous() }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
