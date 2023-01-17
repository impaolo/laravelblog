<x-layout>

    <section class="px-6 py-8">
        <div class="mx-w-lg mx-auto mt-10 max-w-xl bg-gray-80 border border-gray-200 p-6 rounded-xl">
        <h1>Update Post</h1>
       
     
        <form method="POST" action="/admin/posts/{{$post->id }}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-500 text-sm font-bold mb-2" for="title">
                  Title
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" 
                id="title" type="text" placeholder="title" name="title" value="{{ old('title',$post->title) }}" required>

                @error("title")
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-500 text-sm font-bold mb-2" for="slug">
                  slug
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" 
                id="slug" type="text" placeholder="slug" name="slug" value="{{ old('slug',$post->slug) }}" required>

                @error("slug")
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label class="block text-gray-500 text-sm font-bold mb-2" for="thumbnail">
                  Thumbnail
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" 
                id="thumbnail" type="file" placeholder="thumbnail" name="thumbnail" value="{{ old('thumbnail',$post->thumbnail) }}">

                @error("thumbnail")
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-500 text-sm font-bold mb-2" for="excerpt">
                    Excerpt</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                id="excerpt" rows="4" name="excerpt" placeholder="excerpt..." required>{{ old('excerpt',$post->excerpt) }}</textarea>

                @error("excerpt")
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-500 text-sm font-bold mb-2" for="body">
                    Body</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                id="body" rows="4" name="body" placeholder="body..." required>{{ old('body',$post->body) }}</textarea>

                @error("body")
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4" >

              <label class="block text-gray-500 text-sm font-bold mb-2" for="category_id">
                Category
              </label>
              <select name="category_id" id="category_id">
                @php
                    $categories = App\Models\Category::all();
                @endphp

                @foreach ($categories as $category )
                <option 
                value="{{ $category ->id }}" 
                    {{ old("category=id",$post->category_id) == $category ->id ? 'selected' : '' }}
                    >{{ ucwords($category ->name) }}</option>
                    
                @endforeach
               
              </select>
              
              @error("category_id")
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

              <div class="mt-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                type="submit">
                  Update Post
            </button>
            
            </div>
            

            

        </form>
        </div>
    </section>
</x-layout>