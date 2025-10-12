 <!-- Create a book -->
 <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
     <div class="p-6 text-gray-800">
         <form wire:submit="createBook" class="flex items-start space-x-3">
             <div class="grow">
                 <label for="title">Book Title</label>
                 <input type="text" wire:model.live="form.title" id="title" class="w-full border border-gray-300 rounded-lg" />
                 @error('form.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
             </div>
             <div class="grow">
                 <label for="author">Book Author</label>
                 <input type="text" wire:model.live="form.author" id="author" class="w-full border border-gray-300 rounded-lg" />
                 @error('form.author') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
             </div>
             <div class="inline-flex items-baseline mt-5">
                 <button type="submit" class="bg-blue-700 text-white py-2 px-4 rounded-lg font-medium disabled:opacity-50">
                     <span wire:loading>Creating...</span>
                     <span wire:loading.remove>Submit</span>
                 </button>
             </div>
         </form>
     </div>
 </div>
