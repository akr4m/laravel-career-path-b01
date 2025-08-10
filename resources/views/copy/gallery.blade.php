<x-app-layout>
    <div class="mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <header class="bg-white shadow-md">
            <div class="container mx-auto px-6 py-4">
                <h1 class="text-3xl font-bold text-gray-900">My Awesome Gallery</h1>
                <p class="mt-1 text-gray-600">A collection of beautiful moments and landscapes.</p>
            </div>
        </header>

        <!-- Main Content: Image Gallery -->
        <main class="container mx-auto px-6 py-8">
            <!-- Responsive Grid Layout Container. This is pure Tailwind. -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <!-- Gallery Item 1: This structure can be repeated in a loop -->
                <div class="group relative aspect-[4/3] overflow-hidden rounded-lg bg-gray-200 shadow-lg cursor-pointer">
                    <img src="https://placehold.co/600x450/3498db/ffffff?text=Mountain+View"
                        alt="A beautiful mountain landscape"
                        class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110">
                    <!-- Content that appears on hover -->
                    <div class="absolute inset-0 flex flex-col items-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="mt-auto text-center">
                            <h3 class="text-lg font-bold text-white tracking-wide">Misty Mountains</h3>
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
                                <button type="button" class="p-2 rounded-full bg-red-500 bg-opacity-70 hover:bg-opacity-90 transition-colors" aria-label="Delete image">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 2: Identical structure -->
                <div class="group relative aspect-[4/3] overflow-hidden rounded-lg bg-gray-200 shadow-lg cursor-pointer">
                    <img src="https://placehold.co/600x450/e74c3c/ffffff?text=Ocean+Sunset"
                        alt="A vibrant sunset over the ocean"
                        class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/ffffff?text=Image+Not+Found';">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300"></div>
                    <div class="absolute inset-0 flex flex-col items-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="mt-auto text-center">
                            <h3 class="text-lg font-bold text-white tracking-wide">Ocean Sunset</h3>
                            <div class="mt-4 flex justify-center gap-x-3">
                                <a href="https://placehold.co/600x450/e74c3c/ffffff?text=Ocean+Sunset" download="ocean-sunset.jpg" class="p-2 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 transition-colors" aria-label="Download image">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 15V3" />
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <path d="m7 10 5 5 5-5" />
                                    </svg>
                                </a>
                                <button type="button" class="p-2 rounded-full bg-red-500 bg-opacity-70 hover:bg-opacity-90 transition-colors" aria-label="Delete image">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 3: Identical structure -->
                <div class="group relative aspect-[4/3] overflow-hidden rounded-lg bg-gray-200 shadow-lg cursor-pointer">
                    <img src="https://placehold.co/600x450/2ecc71/ffffff?text=Forest+Path"
                        alt="A path through a lush green forest"
                        class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/ffffff?text=Image+Not+Found';">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300"></div>
                    <div class="absolute inset-0 flex flex-col items-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="mt-auto text-center">
                            <h3 class="text-lg font-bold text-white tracking-wide">Forest Trail</h3>
                            <div class="mt-4 flex justify-center gap-x-3">
                                <a href="https://placehold.co/600x450/2ecc71/ffffff?text=Forest+Path" download="forest-trail.jpg" class="p-2 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 transition-colors" aria-label="Download image">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 15V3" />
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <path d="m7 10 5 5 5-5" />
                                    </svg>
                                </a>
                                <button type="button" class="p-2 rounded-full bg-red-500 bg-opacity-70 hover:bg-opacity-90 transition-colors" aria-label="Delete image">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 4: Identical structure -->
                <div class="group relative aspect-[4/3] overflow-hidden rounded-lg bg-gray-200 shadow-lg cursor-pointer">
                    <img src="https://placehold.co/600x450/f1c40f/ffffff?text=Desert+Dunes"
                        alt="Golden sand dunes in the desert"
                        class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/ffffff?text=Image+Not+Found';">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300"></div>
                    <div class="absolute inset-0 flex flex-col items-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="mt-auto text-center">
                            <h3 class="text-lg font-bold text-white tracking-wide">Desert Dunes</h3>
                            <div class="mt-4 flex justify-center gap-x-3">
                                <a href="https://placehold.co/600x450/f1c40f/ffffff?text=Desert+Dunes" download="desert-dunes.jpg" class="p-2 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 transition-colors" aria-label="Download image">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 15V3" />
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <path d="m7 10 5 5 5-5" />
                                    </svg>
                                </a>
                                <button type="button" class="p-2 rounded-full bg-red-500 bg-opacity-70 hover:bg-opacity-90 transition-colors" aria-label="Delete image">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 5: Identical structure -->
                <div class="group relative aspect-[4/3] overflow-hidden rounded-lg bg-gray-200 shadow-lg cursor-pointer">
                    <img src="https://placehold.co/600x450/9b59b6/ffffff?text=Cityscape"
                        alt="A bustling cityscape at night"
                        class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/ffffff?text=Image+Not+Found';">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300"></div>
                    <div class="absolute inset-0 flex flex-col items-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="mt-auto text-center">
                            <h3 class="text-lg font-bold text-white tracking-wide">Night Cityscape</h3>
                            <div class="mt-4 flex justify-center gap-x-3">
                                <a href="https://placehold.co/600x450/9b59b6/ffffff?text=Cityscape" download="cityscape.jpg" class="p-2 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 transition-colors" aria-label="Download image">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 15V3" />
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <path d="m7 10 5 5 5-5" />
                                    </svg>
                                </a>
                                <button type="button" class="p-2 rounded-full bg-red-500 bg-opacity-70 hover:bg-opacity-90 transition-colors" aria-label="Delete image">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 6: Identical structure -->
                <div class="group relative aspect-[4/3] overflow-hidden rounded-lg bg-gray-200 shadow-lg cursor-pointer">
                    <img src="https://placehold.co/600x450/1abc9c/ffffff?text=Lake+Pier"
                        alt="A wooden pier on a calm lake"
                        class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/ffffff?text=Image+Not+Found';">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300"></div>
                    <div class="absolute inset-0 flex flex-col items-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="mt-auto text-center">
                            <h3 class="text-lg font-bold text-white tracking-wide">Lakeside Pier</h3>
                            <div class="mt-4 flex justify-center gap-x-3">
                                <a href="https://placehold.co/600x450/1abc9c/ffffff?text=Lake+Pier" download="lake-pier.jpg" class="p-2 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 transition-colors" aria-label="Download image">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 15V3" />
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <path d="m7 10 5 5 5-5" />
                                    </svg>
                                </a>
                                <button type="button" class="p-2 rounded-full bg-red-500 bg-opacity-70 hover:bg-opacity-90 transition-colors" aria-label="Delete image">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 7: Identical structure -->
                <div class="group relative aspect-[4/3] overflow-hidden rounded-lg bg-gray-200 shadow-lg cursor-pointer">
                    <img src="https://placehold.co/600x450/e67e22/ffffff?text=Autumn+Leaves"
                        alt="Colorful autumn leaves on the ground"
                        class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/ffffff?text=Image+Not+Found';">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300"></div>
                    <div class="absolute inset-0 flex flex-col items-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="mt-auto text-center">
                            <h3 class="text-lg font-bold text-white tracking-wide">Autumn Colors</h3>
                            <div class="mt-4 flex justify-center gap-x-3">
                                <a href="https://placehold.co/600x450/e67e22/ffffff?text=Autumn+Leaves" download="autumn-leaves.jpg" class="p-2 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 transition-colors" aria-label="Download image">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 15V3" />
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <path d="m7 10 5 5 5-5" />
                                    </svg>
                                </a>
                                <button type="button" class="p-2 rounded-full bg-red-500 bg-opacity-70 hover:bg-opacity-90 transition-colors" aria-label="Delete image">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 8: Identical structure -->
                <div class="group relative aspect-[4/3] overflow-hidden rounded-lg bg-gray-200 shadow-lg cursor-pointer">
                    <img src="https://placehold.co/600x450/34495e/ffffff?text=Snowy+Peak"
                        alt="A snow-capped mountain peak"
                        class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/ffffff?text=Image+Not+Found';">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300"></div>
                    <div class="absolute inset-0 flex flex-col items-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="mt-auto text-center">
                            <h3 class="text-lg font-bold text-white tracking-wide">Snowy Peak</h3>
                            <div class="mt-4 flex justify-center gap-x-3">
                                <a href="https://placehold.co/600x450/34495e/ffffff?text=Snowy+Peak" download="snowy-peak.jpg" class="p-2 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 transition-colors" aria-label="Download image">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 15V3" />
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <path d="m7 10 5 5 5-5" />
                                    </svg>
                                </a>
                                <button type="button" class="p-2 rounded-full bg-red-500 bg-opacity-70 hover:bg-opacity-90 transition-colors" aria-label="Delete image">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</x-app-layout>
