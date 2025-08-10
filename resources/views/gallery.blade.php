<x-app-layout>
    <div class="mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <header class="bg-white shadow-md">
            <div class="container mx-auto px-6 py-4">
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="file" />

                    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed" id="submit_btn">Upload</button>
                </form>
            </div>
        </header>


        <!-- Main Content: Image Gallery -->
        <main class="container mx-auto px-6 py-8">
            <!-- Responsive Grid Layout Container. This is pure Tailwind. -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($images as $image)
                <!-- Gallery Item 1: This structure can be repeated in a loop -->
                <div class="group relative rounded-lg bg-gray-200 shadow-lg cursor-pointer">
                    <img src="{{asset($image->path)}}"
                        alt="A beautiful mountain landscape"
                        class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110">
                    <!-- Overlay with background -->
                    <div class="absolute inset-0 flex flex-col items-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="mt-auto text-center">
                            <h3 class="text-lg font-bold text-white tracking-wide">{{ $image->name }}</h3>
                            <div class="mt-4 flex justify-center gap-x-3">
                                <!-- Download Button -->
                                <a href="https://placehold.co/600x450/3498db/ffffff?text=Mountain+View" download="misty-mountains.jpg" class="p-2 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 transition-colors" aria-label="Download image">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 15V3" />
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <path d="m7 10 5 5 5-5" />
                                    </svg>
                                </a>
                                <!-- Delete Button -->
                                <a href="{{route('gallery.destroy', $image)}}" class="p-2 rounded-full bg-red-500 bg-opacity-70 hover:bg-opacity-90 transition-colors" aria-label="Delete image">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</x-app-layout>
