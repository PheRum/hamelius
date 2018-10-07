<ol class="dd-list">
    @foreach ($categories as $cat)
        <li class="dd-item dd3-item" data-id="{{ $cat->id }}">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">{{ $cat->title }}</div>
            @if (count($cat->children))
                @include('categories.children', ['categories' => $cat->children])
            @endif
        </li>
    @endforeach
</ol>
