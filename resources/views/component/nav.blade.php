<div class="smooth">
    <div class="header">
        <ul>
            <li><a href="/"><i class="bi bi-house-fill fs-5"></i></a></li>
            <li><a href="/add"><i class="bi bi-plus-circle-dotted"></i></a></li>
            @isset($album)
            @if(auth()->user()->id == $album->user_id || auth()->user()->is_admin == 1)
            <li><a href="/album/add/image/{{ $album->id }}"><i class="bi bi-upload"></i></a></li>
            @endif
            @endisset
            <li><a href="/mygallery"><i class="bi bi-tropical-storm"></i></a></li>
            @isset(auth()->user()->id)
                @if(auth()->user()->is_admin == 1)
                <li><a href="/admin"><i class="bi bi-person-badge"></i></a></li>
                @endif
            @endisset
        </ul>
    </div>
</div>