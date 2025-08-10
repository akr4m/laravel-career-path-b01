<x-app-layout>
    <div class="mx-auto max-w-xl py-12 px-4 sm:px-6 lg:px-8">
        <header class="mb-8">
            <h1 class="text-2xl font-semibold tracking-tight text-gray-900">Upload a file</h1>
            <p class="mt-1 text-sm text-gray-500">Images (JPG / PNG) or PDF • Max 2MB</p>
        </header>

        @if(session('uploaded_path'))
            @php $path = session('uploaded_path'); @endphp
            <div class="mb-6 rounded-md border border-green-200 bg-green-50 p-4">
                <div class="flex items-start gap-3">
                    <div class="mt-0.5 text-green-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-green-800">Upload successful</p>
                        <p class="mt-0.5 text-xs text-green-700">Original name: <span class="font-semibold">{{ session('uploaded_name') }}</span></p>
                        <div class="mt-3">
                            @if(Str::startsWith(Str::lower($path), 'uploads/') && preg_match('/\.(jpe?g|png)$/i', $path))
                                <img src="{{ asset('storage/' . $path) }}" alt="Uploaded preview" class="max-h-48 rounded border border-green-200/60 bg-white p-1 object-contain shadow-sm">
                            @else
                                <a href="{{ asset('storage/' . $path) }}" class="inline-flex items-center text-xs font-medium text-green-700 hover:text-green-800 underline">View file</a>
                            @endif
                        </div>
                    </div>
                    <form method="POST" action="{{ url()->current() }}" class="ml-auto">
                        @csrf
                        <button type="submit" class="text-xs text-green-600 hover:text-green-700" title="Dismiss">×</button>
                    </form>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-md border border-red-200 bg-red-50 p-4">
                <p class="text-sm font-medium text-red-800 mb-2">Please fix the following:</p>
                <ul class="list-disc list-inside text-xs text-red-600 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
            @csrf
            <div class="space-y-5">
                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700">File</label>
                    <p class="mt-1 text-xs text-gray-400" id="file_help">JPG, PNG or PDF • Max 2MB</p>
                    <div class="mt-3">
                        <div class="relative">
                            <input id="file" name="file" type="file" accept="image/jpeg,image/png,application/pdf" required aria-describedby="file_help" class="peer block w-full cursor-pointer rounded-md border border-gray-300 bg-gray-50 px-4 py-9 text-sm text-gray-600 file:hidden focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:border-indigo-500" />
                            <div class="pointer-events-none absolute inset-0 flex flex-col items-center justify-center text-center text-gray-500 peer-[&:not(:placeholder-shown)]:hidden">
                                <svg class="mx-auto mb-2 h-8 w-8 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 7.5 12 3m0 0L7.5 7.5M12 3v13.5"/></svg>
                                <span class="text-sm font-semibold text-gray-700">Click to browse</span>
                                <span class="mt-0.5 text-xs text-gray-400">or drag & drop</span>
                            </div>
                        </div>
                        <div id="file_name" class="mt-2 hidden rounded bg-gray-50 px-3 py-2 text-xs text-gray-600 ring-1 ring-gray-200"></div>
                        @error('file')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="reset" id="reset_btn" class="inline-flex items-center rounded-md px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">Reset</button>
                    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed" id="submit_btn" disabled>Upload</button>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            (function() {
                const input = document.getElementById('file');
                const nameBox = document.getElementById('file_name');
                const submitBtn = document.getElementById('submit_btn');
                const resetBtn = document.getElementById('reset_btn');
                if(!input) return;
                input.addEventListener('change', () => {
                    if (input.files && input.files[0]) {
                        const f = input.files[0];
                        nameBox.textContent = `${f.name} • ${(f.size/1024).toFixed(1)} KB`;
                        nameBox.classList.remove('hidden');
                        submitBtn.disabled = false;
                    } else {
                        nameBox.classList.add('hidden');
                        submitBtn.disabled = true;
                    }
                });
                resetBtn?.addEventListener('click', () => {
                    nameBox.classList.add('hidden');
                    nameBox.textContent = '';
                    submitBtn.disabled = true;
                });
            })();
        </script>
    @endpush
</x-app-layout>
