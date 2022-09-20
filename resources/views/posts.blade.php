<x-layout>
        @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->id }}">
                {{ $post->title }}
                </a>
            </h1>
               {!! $post->body !!} 
            </div>
        </article>
        @endforeach 
    </body>
        </x-layout>