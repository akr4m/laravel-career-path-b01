<x-app-layout>
    <div class="mx-auto max-w-2xl p-6">
        <div>
            <div class="text-xs my-6 font-bold">
                Dashboard
            </div>

            <!-- <livewire:hello-world
                firstName="Akram"
                lastName="Khan" /> -->

            <!-- @livewire('counter') -->

            @livewire('test-event')

            <div class="space-y-4">
                <livewire:create-book />
                <livewire:book-index />
            </div>
        </div>
    </div>
</x-app-layout>
