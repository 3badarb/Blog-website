<x-layout>


    <body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{asset("storage/".$post->thumbnail)}}" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold"><a href="/?author={{$post->author->username}}">{{$post->author->name}}</a> </h5>

                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-category-button :post="$post"/>

                        </div>
                    </div>

                    <h1 class="text-3xl">
                        {{$post->title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose pt-4">
                        <p>{{$post->body}}</p>
                    </div>
                </div>
                <section class="col-span-8 col-start-5 mt-5">
                    @auth()
                    <form method="post" action="/post/{{$post->slug}}/comment" class="border mb-4 border-gray-300 p-2 rounded-xl">
                        @csrf
                        <header class="flex items-center">
                            <h2 class="ml-4 ">Want to leave something to say</h2>

                        </header>
                        <div class="mt-6">
                            <textarea name="body" class="w-full px-4 text-sm focus: outline-none focus:ring" rows="5"
                                      placeholder="Write here"
                                     required></textarea>
                        </div>
                        @error('body')
                            <p class="text-red-600 text-xs">You tried to add blah!!</p>
                        @enderror
                        <div class="flex justify-end mt-2 pt-2 border-t border-gray-200">
                            <button type="submit" class="bg-blue-500 text-white uppercase text-sm
                            px-3 py-1 rounded-2xl hover:bg-blue-600">Post</button>
                        </div>

                    </form>
                    @endauth
                @foreach($post->comments->sortByDesc('created_at') as $comment)
                 <x-post-comment :comment="$comment" />
                @endforeach
                </section>
            </article>
        </main>

    </section>
    </body>


    {{--    <article>--}}

{{--        <h1>{{$post->title}}</h1>--}}

{{--        p>By <a href="/author/{{$post->author->username}}">{{$post->author->name}}</a> in--}}
{{--        <a href="/category/{{$post->category->slug}}" >{{$post->category->name}}</a></p>--}}
{{--       <div ><p>{{$post->body}}</p></div>--}}

{{--    </article>--}}

{{--    <a href="/" class="gege">Go back</a>--}}

</x-layout>
