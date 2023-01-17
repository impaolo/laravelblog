<x-layout>
    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
      @if ($posts->count())

      <x-post-featured-card :post="$posts[0]"/>
             {{-- alternative way --}}
            {{-- :post="$posts->toArray()[0]" --}}
         

        <div class="lg:grid lg:grid-cols-6">
            @foreach ($posts->skip(1) as $post )

            <x-post-card :post="$post" class="{{ $loop ->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>

            @endforeach
        </div>

        @else
        <h1>No posts at the moment</h1>
          
      @endif      
        
    </main>
   
</x-layout>





{{-- @extends("layout")
 @section("content")

 @foreach ($posts as $post)
        <div class="post">
            <h1>
                <a href="/posts/{{ $post ->slug }}">

                    {{$post -> title}}
                </a>
            </h1>
            By<a href="/author/{{ $post ->author ->username}}">  {{ $post ->author ->name }}</a> in
            <a href="/categories/{{ $post ->category ->slug}}"> {{ $post ->category ->name}}</a>
            <p>
                {{$post -> excerpt }}
            </p>
              
        </div>
     
 @endforeach 
 @endsection --}}