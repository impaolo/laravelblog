<x-layout>

    <section class="px-6 py-8">
        <div class="mx-w-lg mx-auto mt-10 max-w-md bg-gray-80 border border-gray-200 p-6 rounded-xl">
          <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="/register">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-500 text-sm font-bold mb-2" for="name">
                      name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" 
                    id="name" type="text" placeholder="name" name="name" value="{{ old("name") }}">

                    @error("name")
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>


                <div class="mb-4">
                    <label class="block text-gray-500 text-sm font-bold mb-2" for="username">
                      Username
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" 
                    id="username" type="text" placeholder="Username" name="username" value="{{ old("username") }}">

                    @error("username")
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                      email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="email" type="email" placeholder="email" name="email" value="{{ old("email") }}" >

                    @error("email")
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="mb-4">
                    <label class="block text-gray-500 text-sm font-bold mb-2" for="password">
                      Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                    id="password" type="password" placeholder="password" name="password">
                    
                    @error("password")
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                    type="submit">
                      Register
                    </button>
                
                  </div>

            </form>
        </div>
    </section>
</x-layout>