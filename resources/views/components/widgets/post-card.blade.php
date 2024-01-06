@props(['post'])

<a href="#">
    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"">

    <div>
        <div>
            {{ $post->author->title }}
        </div>

        <div>
            {{ $post->title }}
        </div>

        <div>
            {{ $post->created_at->diffForHumans() }}
        </div>
    </div>
</a>
