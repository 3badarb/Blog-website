<x-layout>
    <section class="px-40 py-8">
        <h4 class="font-bold border-b-2 pb-5">All Posts</h4>
        <ul role="list" class="divide-y divide-gray-100">
            @foreach($posts as $post)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <a class="text-sm font-semibold leading-6 text-gray-900" href="/post/{{$post->slug}}">{{$post->title}}</a>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$post->author->email}}</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <div class="flex items-center">
                            <div class="flex items-center space-x-2">
                                <a href="/admin/{{$post->id}}/edit" class="inline-flex items-center
                                rounded-md bg-green-50 px-3 py-1 text-xs font-medium text-green-700
                                ring-1 ring-inset ring-green-600/20 h-7">Edit</a>

                                <form method="post" action="/admin/delete/{{$post->id}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="inline-flex items-center rounded-md border
                                     border-red-600 bg-red-50 px-3 py-1 text-xs font-medium text-red-700 hover:bg-red-100
                                      focus:ring-2 focus:ring-red-500 focus:ring-offset-2 h-7">
                                        Remove
                                    </button>
                                </form>
                            </div>
                            <p class="ml-3 text-xs leading-5 text-gray-500"><time datetime="2023-01-23T13:23Z">{{$post->created_at}}</time></p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</x-layout>
