<x-app-layout>
    <div class="mx-auto max-w-2xl p-6 w-full">
        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-xl font-semibold">Dashboard</h1>
                    <p class="mt-1 text-sm text-gray-600">You’re signed in as <span class="font-medium text-gray-900">{{ auth()->user()->name ?? 'User' }}</span>.</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-gray-900 px-3 py-1.5 text-sm font-medium text-white shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">
                        Log out
                    </button>
                </form>
            </div>

            <div class="mt-6 grid gap-4 sm:grid-cols-2">
                <a href="{{ url('/profile') }}" class="block rounded-lg border border-gray-200 p-4 hover:bg-gray-50">
                    <p class="text-sm font-medium text-gray-900">Profile</p>
                    <p class="mt-1 text-sm text-gray-600">View and update your information</p>
                </a>
                <div class="rounded-lg border border-gray-200 p-4">
                    <p class="text-sm font-medium text-gray-900">Quick tip</p>
                    <p class="mt-1 text-sm text-gray-600">Use this page to demonstrate auth flows.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
