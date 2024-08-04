
<x-layout>

    @include("_post-header")
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())

            <x-post-grid :posts="$posts"/>
{{--            <x-post-card/>--}}


        @else
            <p >There is no Posts</p>
        @endif
        {{$posts->links()}}
{{--        <div class="lg:grid lg:grid-cols-3">--}}
{{--            <x-post-card/>--}}
{{--            <x-post-card/>--}}
{{--            <x-post-card/>--}}

{{--        </div>--}}
    </main>

    {{--    @foreach($posts as $post)--}}
{{--        <article class="font-thin">--}}

{{--            <h1><a href="/post/{{$post->slug}}">{{$post->title}}</a> </h1>--}}
{{--            <p>By <a href="/author/{{$post->author->username}}">{{$post->author->name}}</a> in--}}
{{--                <a href="/category/{{$post->category->slug}}" >{{$post->category->name}}</a></p>--}}
{{--           <div>{{$post->excert}}</div>--}}

{{--        </article>--}}
{{--    @endforeach--}}

</x-layout>
