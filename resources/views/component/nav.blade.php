<div class="smooth">
    <div class="header">
        <ul>
            <li><a href="/"><i class="bi bi-house-fill fs-5"></i></a></li>
            <li><a href="/add"><i class="bi bi-plus-circle-dotted"></i></a></li>
            @isset($album)
            <li><a href="/album/add/image/{{ $album->id }}"><i class="bi bi-upload"></i></a></li>
            @endisset
        </ul>
    </div>
</div>