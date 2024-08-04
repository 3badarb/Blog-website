


    <article class=" flex bg-gray-100 border border-gray-200 p-6 mt-2 rounded-xl space-x-4">
        <div class="flex-shrink-0">
{{--            <img src="https://i.pravatar.cc/60" alt="" class="rounded-3xl">--}}
        </div>
        <div>
            <header>
                <h3 class="font-bold">{{$comment->author->name}}</h3>
                <p class="text-xs">Posted <time>{{$comment->created_at->diffForHumans()}}</time></p>
            </header>
            <p class="mt-2">{{$comment->body}}</p>
        </div>

    </article>


